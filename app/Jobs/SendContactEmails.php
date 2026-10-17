<?php

namespace App\Jobs;

use App\Models\ContactSubmission;
use App\Support\ContactEmailService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Throwable;

class SendContactEmails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 1;
    public int $timeout = 45;

    public function __construct(public int $submissionId) {}

    public function handle(ContactEmailService $service): void
    {
        $submission = ContactSubmission::find($this->submissionId);
        if ($submission) $service->send($submission);
    }

    public function failed(?Throwable $exception): void
    {
        ContactSubmission::whereKey($this->submissionId)->update([
            'email_status' => 'failed',
            'email_error' => mb_substr($exception?->getMessage() ?: 'The notification job failed before it could send.', 0, 4000),
        ]);
    }
}
