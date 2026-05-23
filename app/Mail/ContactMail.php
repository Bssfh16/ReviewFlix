<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contactData;

    public function __construct($data)
    {
        $this->contactData = $data;
    }

    public function envelope()
    {
        return new \Illuminate\Mail\Mailables\Envelope(
            subject: 'New Contact Message: ' . ($this->contactData['subject'] ?? 'No Subject'),
        );
    }

    public function content()
    {
        return new \Illuminate\Mail\Mailables\Content(
            view: 'mails.contact',
            with: ['contact' => $this->contactData],
        );
    }
}