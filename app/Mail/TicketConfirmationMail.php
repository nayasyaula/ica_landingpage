<?php

namespace App\Mail;

use App\Models\Registration;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Milon\Barcode\DNS2D;
use Symfony\Component\Mime\Part\DataPart;

class TicketConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $registration;
    public $qrCodePath;

    public function __construct(Registration $registration)
    {
        $this->registration = $registration;
        $this->qrCodePath = $this->generateQRCode();
    }

    private function generateQRCode()
    {
        try {
            $qrData = json_encode([
                'kode' => $this->registration->qr_code,
                'nama' => $this->registration->name,
                'email' => $this->registration->email,
                'telepon' => $this->registration->phone,
                'position' => $this->registration->position, // ✅ TAMBAH POSITION DI QR CODE
                'event' => $this->registration->event->name ?? 'Indonesian Cat Association 2025',
                'tanggal' => '28-30 November 2025',
                'lokasi' => $this->registration->event->location ?? 'Jakarta Convention Center'
            ]);

            $qr = new DNS2D();

            // QR default ukuran 6x6, kita bisa generate lebih kecil dan letakkan di canvas PNG dengan margin putih
            $qrPngBase64 = $qr->getBarcodePNG($qrData, 'QRCODE', 4, 4); // QR lebih kecil

            $qrBinary = base64_decode($qrPngBase64);

            // Buat file temp di memory agar tetap inline tanpa attachment baru
            $fileName = 'qr_' . uniqid() . '.png';
            $filePath = storage_path('app/public/qrcodes/' . $fileName);
            
            // Pastikan directory exists
            if (!file_exists(dirname($filePath))) {
                mkdir(dirname($filePath), 0755, true);
            }
            
            file_put_contents($filePath, $qrBinary);

            return $filePath;

        } catch (\Exception $e) {
            Log::error('QR generation failed: ' . $e->getMessage());
            return null;
        }
    }

    public function build()
    {
        $filePath = $this->qrCodePath;

        return $this->subject('Konfirmasi Pendaftaran - ICA 2025')
            ->view('emails.ticket-confirmation')
            ->with([
                'registration' => $this->registration,
                'position' => $this->registration->position // ✅ TAMBAH POSITION UNTUK EMAIL VIEW
            ])
            ->withSymfonyMessage(function ($message) use ($filePath) {
                if ($filePath && file_exists($filePath)) {
                    $message->addPart(
                        DataPart::fromPath($filePath)
                            ->asInline()
                            ->setName('qrcode.png')
                    );
                }
            });
    }
}