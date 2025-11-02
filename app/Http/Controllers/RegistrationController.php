<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Mail\TicketConfirmationMail;
use Illuminate\Support\Facades\Mail;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Storage;

class RegistrationController extends Controller
{
    public function create(Event $event)
    {
        return view('registrations.create', compact('event'));
    }

    public function store(Request $request, Event $event)
    {
        // VALIDASI dengan unique email
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('registrations')->where(function ($query) use ($event) {
                    return $query->where('event_id', $event->id);
                })
            ],
            'phone' => 'required|string|max:20',
        ]);

        $qrCodeString = 'ICA-' . strtoupper(Str::random(3)) . '-' . rand(1000, 9999);

        $registration = Registration::create([
            'event_id' => $event->id,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'qr_code' => $qrCodeString,
        ]);

        try {
            $qrCodePng = QrCode::format('png')
                ->size(300)
                ->backgroundColor(255, 255, 255)
                ->color(0, 0, 0)
                ->margin(1)
                ->generate($qrCodeString);

            // Simpan QR code sebagai file
            $qrFilename = 'qrcode-' . $qrCodeString . '.png';
            $qrPath = storage_path('app/public/' . $qrFilename);

            // Save QR code to file
            file_put_contents($qrPath, $qrCodePng);

            Log::info('🌀 QR Code PNG generated: ' . $qrPath);

            // ✅ KIRIM EMAIL DENGAN ATTACHMENT
            Mail::to($registration->email)->send(new TicketConfirmationMail($registration, $qrPath, $qrFilename));

            Log::info('✅ EMAIL WITH QR ATTACHMENT SENT');
        } catch (\Exception $e) {
            Log::error('❌ EMAIL FAILED: ' . $e->getMessage());

            // Fallback: kirim email dengan QR code external
            $this->sendEmailWithExternalQR($registration);
        }

        return redirect()->route('registrations.success', $registration);
    }

    // ✅ FALLBACK DENGAN QR CODE EXTERNAL
    private function sendEmailWithExternalQR($registration)
{
    try {
        $qrData = urlencode($registration->qr_code);
        $qrImageUrl = "https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=" . $qrData . "&format=png";

        Log::info('🌀 Fallback: Using external QR API');

        // Gunakan view yang sama tapi dengan parameter QR external
        $emailContent = view('emails.ticket-confirmation', [
            'registration' => $registration,
            'event' => $registration->event,
            'qrImageUrl' => $qrImageUrl, // Kirim URL QR external
            'isFallback' => true // Flag untuk fallback
        ])->render();

        Mail::send([], [], function ($message) use ($registration, $emailContent) {
            $message->to($registration->email)
                ->subject('Konfirmasi Pendaftaran - Indonesian Cat Association 2025')
                ->html($emailContent);
        });

        Log::info('✅ FALLBACK EMAIL WITH EXTERNAL QR SENT');
    } catch (\Exception $e) {
        Log::error('❌ FALLBACK EMAIL FAILED: ' . $e->getMessage());
    }
}
    public function success(Registration $registration)
    {
        // TAMPILKAN QR CODE DI PAGE
        $qrImage = QrCode::size(200)->generate($registration->qr_code);

        return view('registrations.success', compact('registration', 'qrImage'));
    }


    public function downloadQRCode(Registration $registration)
    {
        // Generate sebagai SVG tapi convert ke PNG via JavaScript
        $qrImage = QrCode::size(300)->generate($registration->qr_code);

        return view('registrations.download', compact('registration', 'qrImage'));
    }

    public function showQRCode($qrCode)
    {
        // Cari registration berdasarkan QR code
        $registration = Registration::where('qr_code', $qrCode)->firstOrFail();

        // Generate QR Code
        $qrImage = QrCode::size(300)->generate($registration->qr_code);

        return view('qrcode.show', compact('registration', 'qrImage'));
    }
    public function verifyTicket(Request $request)
    {
        $registration = \App\Models\Registration::where('qr_code', $request->qr_code)->first();

        if (!$registration) {
            return redirect()->back()->with('error', 'Kode QR tidak ditemukan.');
        }

        if ($registration->is_checked_in) {
            return redirect()->route('admin.dashboard')
                ->with('info', 'Peserta ini sudah check-in sebelumnya.');
        }

        $registration->update([
            'is_checked_in' => true,
            'checked_in_at' => now(),
        ]);

        return redirect()->route('admin.dashboard')
            ->with('success', 'Peserta berhasil check-in!');
    }

    public function checkIn(Request $request)
    {
        $registration = Registration::with('event')->where('qr_code', $request->qr_code)->first();

        if (!$registration) {
            return response()->json([
                'success' => false,
                'message' => 'QR Code tidak ditemukan.'
            ]);
        }

        // Cek apakah sudah check-in
        if ($registration->is_checked_in) {
            return response()->json([
                'success' => true,
                'message' => 'Peserta sudah check-in sebelumnya pada: ' . $registration->checked_in_at->format('d/m/Y H:i'),
                'registration' => $registration
            ]);
        }

        // Lakukan check-in
        $registration->update([
            'is_checked_in' => true,
            'checked_in_at' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Check-in berhasil!',
            'registration' => $registration
        ]);
    }
}
