<?php

namespace App\Mail;

use App\Models\Registration;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $registration;
    public $qrPath;
    public $qrFilename;

    public function __construct(Registration $registration, $qrPath = null, $qrFilename = null)
    {
        $this->registration = $registration;
        $this->qrPath = $qrPath;
        $this->qrFilename = $qrFilename;
    }

    public function build()
    {
        $email = $this->subject('Konfirmasi Pendaftaran - Indonesian Cat Association 2025')
            ->view('emails.ticket-confirmation')
            ->with([
                'registration' => $this->registration,
                'event' => $this->registration->event,
            ]);

        // Attach QR code jika ada
        if ($this->qrPath && file_exists($this->qrPath)) {
            $email->attach($this->qrPath, [
                'as' => $this->qrFilename,
                'mime' => 'image/png',
            ]);
        }

        return $email;
    }
}