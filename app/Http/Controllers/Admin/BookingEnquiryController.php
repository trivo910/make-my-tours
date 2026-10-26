<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingEnquiryFilterRequest;
use App\Jobs\SendBookingEnquiryEmail;
use App\Models\BookingEnquiry;
use App\Support\BookingEnquirySearch;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Throwable;
use Illuminate\View\View;

class BookingEnquiryController extends Controller
{
    public function index(BookingEnquiryFilterRequest $request, BookingEnquirySearch $search): View
    {
        return view('admin.booking-enquiries.index', [
            'enquiries' => $search->query($request->validated())->latest()->paginate(15)->withQueryString(),
            'filters' => $request->validated(),
            'totalCount' => BookingEnquiry::count(),
            'newCount' => BookingEnquiry::where('status', 'new')->count(),
            'failedCount' => BookingEnquiry::where('email_status', 'failed')->count(),
            'locations' => config('booking.locations'),
        ]);
    }

    public function show(BookingEnquiry $bookingEnquiry): View
    {
        return view('admin.booking-enquiries.show', [
            'enquiry' => $bookingEnquiry,
            'statuses' => ['new', 'contacted', 'confirmed', 'cancelled'],
        ]);
    }

    public function updateStatus(Request $request, BookingEnquiry $bookingEnquiry): RedirectResponse
    {
        $data = $request->validate([
            'status' => ['required', Rule::in(['new', 'contacted', 'confirmed', 'cancelled'])],
        ]);

        $bookingEnquiry->update($data);

        return back()->with('status', 'Booking enquiry status updated.');
    }

    public function resend(BookingEnquiry $bookingEnquiry): RedirectResponse
    {
        $bookingEnquiry->update(['email_status' => 'pending', 'email_error' => null]);

        try {
            SendBookingEnquiryEmail::dispatch($bookingEnquiry->id)->afterCommit();
        } catch (Throwable $exception) {
            $bookingEnquiry->forceFill([
                'email_status' => 'failed',
                'email_error' => mb_substr($exception->getMessage() ?: 'The notification could not be queued.', 0, 4000),
            ])->save();
            report($exception);
        }

        return back()->with('status', config('queue.default') === 'sync'
            ? 'Notification resend was attempted. Check the delivery status below.'
            : 'Notification resend has been queued.');
    }

    public function destroy(BookingEnquiry $bookingEnquiry): RedirectResponse
    {
        $bookingEnquiry->delete();

        return redirect()->route('admin.booking-enquiries.index')->with('status', 'Booking enquiry deleted.');
    }

    public function bulkDestroy(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'booking_enquiry_ids' => ['required', 'array', 'min:1'],
            'booking_enquiry_ids.*' => ['integer', 'distinct', 'exists:booking_enquiries,id'],
        ]);
        $deleted = BookingEnquiry::whereIn('id', $data['booking_enquiry_ids'])->delete();

        return back()->with('status', $deleted.' booking enquiries deleted.');
    }

    public function export(BookingEnquiryFilterRequest $request, BookingEnquirySearch $search): StreamedResponse
    {
        $query = $search->query($request->validated())->latest();

        return response()->streamDownload(function () use ($query) {
            $output = fopen('php://output', 'w');
            fputcsv($output, ['ID', 'Name', 'Phone', 'Email', 'From', 'To', 'Travel date', 'Time', 'Seats', 'Vehicle', 'Status', 'Email status', 'Created at']);

            foreach ($query->cursor() as $enquiry) {
                $values = [
                    $enquiry->id,
                    $enquiry->name,
                    $enquiry->phone,
                    $enquiry->email,
                    $enquiry->from_location,
                    $enquiry->to_location,
                    $enquiry->travel_date->toDateString(),
                    $enquiry->time_slot,
                    $enquiry->seats,
                    $enquiry->vehicle_type,
                    $enquiry->status,
                    $enquiry->email_status,
                    $enquiry->created_at->toIso8601String(),
                ];

                fputcsv($output, array_map($this->csvSafe(...), $values));
            }

            fclose($output);
        }, 'booking-enquiries-'.now()->format('Y-m-d').'.csv', ['Content-Type' => 'text/csv; charset=UTF-8']);
    }

    private function csvSafe(mixed $value): string
    {
        $value = (string) ($value ?? '');

        return preg_match('/^[\s]*[=+@-]/', $value) ? "'".$value : $value;
    }
}
