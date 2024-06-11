<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->data['subject'],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: $this->data['view'],
            with: ['token' => $this->data['token']] // Pass token to the view
        );
    }

    public function attachments(): array
    {
        return [];
    }
}

