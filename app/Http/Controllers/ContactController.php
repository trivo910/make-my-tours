<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactSubmissionRequest;
use App\Jobs\SendContactEmails;
use App\Models\ContactSubmission;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Throwable;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function create(): View
    {
        return view('pages.contact');
    }

    public function store(StoreContactSubmissionRequest $request): RedirectResponse|JsonResponse
    {
        if ($request->filled('website')) {
            return $request->expectsJson()
                ? response()->json(['message' => 'Thanks for getting in touch. We will be in contact soon.'], 201)
                : redirect()->route('contact.create')->with('contact_success', true);
        }

        $submission = ContactSubmission::create([
            ...$request->safe()->except('website'),
            'ip_address' => $request->ip(),
            'user_agent' => mb_substr((string) $request->userAgent(), 0, 2000),
            'email_status' => 'pending',
        ]);

        try {
            SendContactEmails::dispatch($submission->id)->afterCommit();
        } catch (Throwable $exception) {
            $submission->forceFill([
                'email_status' => 'failed',
                'email_error' => mb_substr($exception->getMessage() ?: 'The email notification could not be queued.', 0, 4000),
            ])->save();
            report($exception);
        }

        $message = 'Thanks for getting in touch. Your message is safely with us, and our team will follow up soon.';
        return $request->expectsJson()
            ? response()->json(['message' => $message], 201)
            : redirect()->route('contact.create')->with('contact_success', $message);
    }
}
