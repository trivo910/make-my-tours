<?php

namespace App\Support;

use App\Mail\BookingEnquiryNotificationMail;
use App\Models\BookingEnquiry;
use App\Models\Setting;
use Illuminate\Support\Facades\Mail;
use Throwable;

class BookingEnquiryEmailService
{
    public function send(BookingEnquiry $enquiry): void
    {
        $settings = Setting::whereIn('key', ['company_notification_email', 'mail_cc', 'mail_bcc'])
            ->pluck('value', 'key');
        $recipient = $settings->get('company_notification_email');

        if (! $recipient) {
            $this->fail($enquiry, 'Company notification email is not configured.');
            return;
        }

        try {
            $mail = Mail::to($recipient);
            if ($settings->get('mail_cc')) {
                $mail->cc($settings->get('mail_cc'));
            }
            if ($settings->get('mail_bcc')) {
                $mail->bcc($settings->get('mail_bcc'));
            }
            $mail->send(new BookingEnquiryNotificationMail($enquiry));
            $enquiry->forceFill(['email_status' => 'sent', 'email_error' => null])->save();
        } catch (Throwable $exception) {
            $this->fail($enquiry, $exception->getMessage());
            report($exception);
        }
    }

    private function fail(BookingEnquiry $enquiry, string $error): void
    {
        $enquiry->forceFill([
            'email_status' => 'failed',
            'email_error' => mb_substr(trim($error) ?: 'The email server returned an unspecified error.', 0, 4000),
        ])->save();
    }
}
