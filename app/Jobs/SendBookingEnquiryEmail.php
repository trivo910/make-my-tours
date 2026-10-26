<?php

namespace App\Jobs;

use App\Models\BookingEnquiry;
use App\Support\BookingEnquiryEmailService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Throwable;

class SendBookingEnquiryEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 1;
    public int $timeout = 45;

    public function __construct(public int $enquiryId) {}

    public function handle(BookingEnquiryEmailService $service): void
    {
        $enquiry = BookingEnquiry::find($this->enquiryId);
        if ($enquiry) {
            $service->send($enquiry);
        }
    }

    public function failed(?Throwable $exception): void
    {
        BookingEnquiry::whereKey($this->enquiryId)->update([
            'email_status' => 'failed',
            'email_error' => mb_substr($exception?->getMessage() ?: 'The notification job failed before it could send.', 0, 4000),
        ]);
    }
}
