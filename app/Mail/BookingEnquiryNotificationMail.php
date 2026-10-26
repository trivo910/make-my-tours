<?php

namespace App\Mail;

use App\Models\BookingEnquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingEnquiryNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public BookingEnquiry $enquiry) {}

    public function build(): self
    {
        $message = $this->subject(sprintf(
            'New booking enquiry: %s to %s on %s (%s, %d %s)',
            $this->enquiry->from_location,
            $this->enquiry->to_location,
            $this->enquiry->travel_date->format('j M'),
            $this->enquiry->time_slot,
            $this->enquiry->seats,
            $this->enquiry->seats === 1 ? 'seat' : 'seats',
        ))->view('emails.booking-enquiry-notification');

        if ($this->enquiry->email) {
            $message->replyTo($this->enquiry->email, $this->enquiry->name);
        }

        return $message;
    }
}
