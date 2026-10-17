<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;

class SmtpTestMail extends Mailable
{
    use Queueable;

    public function build(): self
    {
        return $this->subject('Make My Tours · SMTP test')->view('emails.smtp-test');
    }
}
