<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Registration;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;

class TicketConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $registration;
    public $qrPath;
    public $qrFilename;

    public function __construct(Registration $registration, $qrPath, $qrFilename)
    {
        $this->registration = $registration;
        $this->qrPath = $qrPath;
        $this->qrFilename = $qrFilename;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Indonesian Cat Association',
            from: new Address('indonesiancatassociation2@gmail.com', 'Indonesian Cat Association'),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.ticket-confirmation',
        );
    }

    public function attachments(): array
    {
        return [
            Attachment::fromPath($this->qrPath)
                    ->as($this->qrFilename)
                    ->withMime('image/png'),
        ];
    }
}