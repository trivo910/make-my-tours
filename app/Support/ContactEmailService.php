<?php

namespace App\Support;

use App\Mail\ContactNotificationMail;
use App\Mail\ContactReceiptMail;
use App\Models\ContactSubmission;
use App\Models\Setting;
use Illuminate\Support\Facades\Mail;
use Throwable;

class ContactEmailService
{
    public function send(ContactSubmission $submission): void
    {
        $settings = Setting::whereIn('key', ['company_notification_email', 'mail_cc', 'mail_bcc', 'contact_auto_reply_enabled'])
            ->pluck('value', 'key');
        $recipient = $settings->get('company_notification_email');

        if (! $recipient) {
            $this->fail($submission, 'Company notification email is not configured.');
            return;
        }

        try {
            $mail = Mail::to($recipient);
            if ($settings->get('mail_cc')) $mail->cc($settings->get('mail_cc'));
            if ($settings->get('mail_bcc')) $mail->bcc($settings->get('mail_bcc'));
            $mail->send(new ContactNotificationMail($submission));
            $submission->forceFill(['email_status' => 'sent', 'email_error' => null])->save();
        } catch (Throwable $exception) {
            $this->fail($submission, $exception->getMessage());
            report($exception);
            return;
        }

        if (filter_var($settings->get('contact_auto_reply_enabled', false), FILTER_VALIDATE_BOOLEAN)) {
            try {
                Mail::to($submission->email)->send(new ContactReceiptMail($submission));
            } catch (Throwable $exception) {
                $submission->forceFill(['email_error' => 'Company notification sent; visitor auto-reply failed: '.mb_substr($exception->getMessage(), 0, 3500)])->save();
                report($exception);
            }
        }
    }

    private function fail(ContactSubmission $submission, string $error): void
    {
        $submission->forceFill([
            'email_status' => 'failed',
            'email_error' => mb_substr(trim($error) ?: 'The email server returned an unspecified error.', 0, 4000),
        ])->save();
    }
}
