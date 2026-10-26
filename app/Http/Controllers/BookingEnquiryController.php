<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingEnquiryRequest;
use App\Jobs\SendBookingEnquiryEmail;
use App\Models\BookingEnquiry;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Throwable;

class BookingEnquiryController extends Controller
{
    public function store(StoreBookingEnquiryRequest $request): RedirectResponse|JsonResponse
    {
        if ($request->filled('website')) {
            return $this->successResponse($request);
        }

        $enquiry = BookingEnquiry::create([
            ...$request->safe()->except('website'),
            'ip' => $request->ip(),
            'user_agent' => mb_substr((string) $request->userAgent(), 0, 2000),
            'status' => 'new',
            'email_status' => 'pending',
        ]);

        try {
            SendBookingEnquiryEmail::dispatch($enquiry->id)->afterCommit();
        } catch (Throwable $exception) {
            $enquiry->forceFill([
                'email_status' => 'failed',
                'email_error' => mb_substr($exception->getMessage() ?: 'The email notification could not be queued.', 0, 4000),
            ])->save();
            report($exception);
        }

        return $this->successResponse($request);
    }

    private function successResponse(StoreBookingEnquiryRequest $request): RedirectResponse|JsonResponse
    {
        $message = 'Thanks, we will call you shortly.';

        return $request->expectsJson()
            ? response()->json(['message' => $message], 201)
            : redirect(url('/').'#booking')->with('booking_success', $message);
    }
}
