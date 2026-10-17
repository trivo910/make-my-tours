<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactSubmissionFilterRequest;
use App\Jobs\SendContactEmails;
use App\Models\ContactSubmission;
use App\Support\ContactSubmissionSearch;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\View\View;
use Throwable;

class ContactSubmissionController extends Controller
{
    public function index(ContactSubmissionFilterRequest $request, ContactSubmissionSearch $search): View
    {
        return view('admin.contacts.index', [
            'submissions' => $search->query($request->validated())->latest()->paginate(15)->withQueryString(),
            'filters' => $request->validated(),
            'totalCount' => ContactSubmission::count(),
            'unreadCount' => ContactSubmission::unread()->count(),
            'failedCount' => ContactSubmission::where('email_status', 'failed')->count(),
        ]);
    }

    public function show(ContactSubmission $submission): View
    {
        if (! $submission->is_read) $submission->update(['is_read' => true]);
        return view('admin.contacts.show', compact('submission'));
    }

    public function toggleRead(ContactSubmission $submission): RedirectResponse
    {
        $submission->update(['is_read' => ! $submission->is_read]);
        return back()->with('status', $submission->is_read ? 'Submission marked as read.' : 'Submission marked as unread.');
    }

    public function destroy(ContactSubmission $submission): RedirectResponse
    {
        $submission->delete();
        return redirect()->route('admin.contacts.index')->with('status', 'Contact submission deleted.');
    }

    public function bulkDestroy(Request $request): RedirectResponse
    {
        $data = $request->validate(['submission_ids' => ['required', 'array', 'min:1'], 'submission_ids.*' => ['integer', 'exists:contact_submissions,id']]);
        $deleted = ContactSubmission::whereIn('id', $data['submission_ids'])->delete();
        return back()->with('status', $deleted.' submissions deleted.');
    }

    public function resend(ContactSubmission $submission): RedirectResponse
    {
        $submission->update(['email_status' => 'pending', 'email_error' => null]);
        try {
            SendContactEmails::dispatch($submission->id)->afterCommit();
        } catch (Throwable $exception) {
            $submission->forceFill(['email_status' => 'failed', 'email_error' => mb_substr($exception->getMessage() ?: 'The notification could not be queued.', 0, 4000)])->save();
            report($exception);
        }
        return back()->with('status', config('queue.default') === 'sync'
            ? 'Notification resend was attempted. Check the delivery status below.'
            : 'Notification resend has been queued.');
    }

    public function export(ContactSubmissionFilterRequest $request, ContactSubmissionSearch $search): StreamedResponse
    {
        $query = $search->query($request->validated())->latest();
        return response()->streamDownload(function () use ($query) {
            $output = fopen('php://output', 'w');
            fputcsv($output, ['ID', 'Name', 'Email', 'Phone', 'Address', 'Message', 'Date', 'Read status', 'Email status', 'Email error']);
            foreach ($query->cursor() as $submission) {
                $values = [
                    $submission->id, $submission->name, $submission->email, $submission->phone,
                    $submission->address, $submission->message, $submission->created_at->toIso8601String(),
                    $submission->is_read ? 'Read' : 'Unread', $submission->email_status, $submission->email_error,
                ];
                fputcsv($output, array_map($this->csvSafe(...), $values));
            }
            fclose($output);
        }, 'contact-submissions-'.now()->format('Y-m-d').'.csv', ['Content-Type' => 'text/csv; charset=UTF-8']);
    }

    private function csvSafe(mixed $value): string
    {
        $value = (string) ($value ?? '');
        return preg_match('/^[\s]*[=+@-]/', $value) ? "'".$value : $value;
    }
}
