<?php

namespace App\Mail;

use App\Models\ContactSubmission;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public ContactSubmission $submission) {}

    public function build(): self
    {
        return $this->subject('New website enquiry from '.$this->submission->name)
            ->replyTo($this->submission->email, $this->submission->name)
            ->view('emails.contact-notification');
    }
}
