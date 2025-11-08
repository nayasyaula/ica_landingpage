<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use App\Mail\TicketConfirmationMail;
use Milon\Barcode\DNS2D;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function create(Event $event)
    {
        return view('registrations.create', compact('event'));
    }

    public function store(Request $request, Event $event)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('registrations')->where(fn($query) => $query->where('event_id', $event->id))
            ],
            'phone' => 'required|string|max:20',
            'position' => 'required|string|max:255',
            'other_position' => 'nullable|string|max:255',
        ]);

        $finalPosition = $validated['position'];
        if ($validated['position'] === 'Other' && !empty($validated['other_position'])) {
            $finalPosition = $validated['other_position'];
        }

        $qrCode = 'ICA-' . Str::upper(Str::random(3)) . '-' . Str::upper(Str::random(4));

        $registration = Registration::create([
            'event_id' => $event->id,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'position' => $finalPosition,
            'qr_code' => $qrCode,
        ]);

        try {
            Mail::to($registration->email)
                ->send(new TicketConfirmationMail($registration));
        } catch (\Exception $e) {
            Log::error('Email gagal dikirim: ' . $e->getMessage());
        }

        return redirect()->route('registrations.success', $registration);
    }

    public function success(Registration $registration)
    {
        $registration->load('event');

        $qrData = json_encode([
            'kode' => $registration->qr_code,
            'nama' => $registration->name,
            'email' => $registration->email,
            'telepon' => $registration->phone,
            'position' => $registration->position,
            'event' => $registration->event->name ?? 'Indonesian Cat Association',
            'tanggal' => '28-30 November 2025',
            'lokasi' => $registration->event->location ?? 'Jakarta Convention Center'
        ]);

        $qrCode = new DNS2D();
        $qrCodePng = $qrCode->getBarcodePNG($qrData, 'QRCODE', 8, 8);

        $qrCodeHtml = '<img src="data:image/png;base64,' . $qrCodePng . '" alt="QR Code" style="width: 250px; height: 250px;">';

        $qrImage = new HtmlString('
        <div style="text-align:center;">
            <div style="background: white; padding: 15px; display: inline-block; border: 1px solid #ddd; border-radius: 8px;">
                ' . $qrCodeHtml . '
            </div>
        </div>');

        return view('registrations.success', compact('registration', 'qrImage'));
    }

    // ✅ PERBAIKAN: API Check-in dengan admin/scanner tracking
    public function checkIn(Request $request)
    {
        // Debug: log semua request data
        Log::info('Check-in Request Data:', $request->all());

        // Validasi yang lebih fleksibel
        $request->validate([
            'qr_data' => 'sometimes|string',
            'qr_code' => 'sometimes|string',
            'source' => 'sometimes|string'
        ]);

        try {
            $qrCode = null;
            $source = $request->source ?? 'unknown';

            Log::info('Processing check-in:', [
                'has_qr_data' => $request->has('qr_data'),
                'has_qr_code' => $request->has('qr_code'),
                'source' => $source
            ]);

            // ✅ GET ADMIN/SCANNER YANG SEDANG LOGIN
            $scanner = Auth::guard('admin')->user();
            $scannerName = $scanner ? $scanner->name : 'System';

            Log::info('Scanner info:', [
                'scanner_name' => $scannerName,
                'is_authenticated' => !is_null($scanner)
            ]);

            // Priority 1: Coba dari qr_data (JSON format)
            if ($request->has('qr_data') && !empty($request->qr_data)) {
                $qrData = json_decode($request->qr_data, true);
                Log::info('Decoded qr_data:', ['decoded_data' => $qrData]);

                if (json_last_error() === JSON_ERROR_NONE && is_array($qrData)) {
                    $qrCode = $qrData['kode'] ?? null;
                    Log::info('Extracted from qr_data:', ['kode' => $qrCode]);
                }
            }

            // Priority 2: Coba dari qr_code langsung
            if (!$qrCode && $request->has('qr_code') && !empty($request->qr_code)) {
                $qrCode = trim($request->qr_code);
                Log::info('Using qr_code directly:', ['qr_code' => $qrCode]);
            }

            Log::info('Final QR Code to process:', ['qr_code' => $qrCode]);

            if (!$qrCode) {
                Log::warning('QR Code is empty or invalid');
                return response()->json([
                    'success' => false,
                    'message' => 'Data QR tidak valid atau kosong'
                ], 400);
            }

            // Validasi format ICA
            if (!preg_match('/^ICA-[A-Z0-9]{3}-[A-Z0-9]{4,}$/i', $qrCode)) {
                Log::warning('Invalid QR Code format:', ['qr_code' => $qrCode]);
                return response()->json([
                    'success' => false,
                    'message' => 'Format kode tiket tidak valid. Format yang benar: ICA-XXX-XXXX'
                ], 400);
            }

            // Cari registration
            $registration = Registration::with('event')
                ->where('qr_code', $qrCode)
                ->first();

            if (!$registration) {
                Log::warning('Registration not found:', ['qr_code' => $qrCode]);
                return response()->json([
                    'success' => false,
                    'message' => 'Tiket tidak ditemukan: ' . $qrCode
                ], 404);
            }

            Log::info('Registration found:', [
                'id' => $registration->id,
                'name' => $registration->name,
                'position' => $registration->position,
                'is_checked_in' => $registration->is_checked_in
            ]);

            // Handle sudah check-in
            if ($registration->is_checked_in) {
                Log::info('Duplicate check-in detected:', [
                    'qr_code' => $qrCode,
                    'checked_in_at' => $registration->checked_in_at,
                    'checked_in_by' => $registration->checked_in_by
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Peserta sudah check-in pada: ' . $registration->checked_in_at->format('d/m/Y H:i') . ' oleh: ' . $registration->checked_in_by,
                    'is_duplicate' => true,
                    'data' => [
                        'kode' => $registration->qr_code,
                        'nama' => $registration->name,
                        'email' => $registration->email,
                        'telepon' => $registration->phone,
                        'position' => $registration->position,
                        'event' => $registration->event->name,
                        'waktu_checkin' => $registration->checked_in_at->format('H:i:s'),
                        'checked_in_by' => $registration->checked_in_by
                    ]
                ]);
            }

            // Tentukan metode check-in
            $checkinMethod = ($source === 'manual') ? 'manual' : 'qr_scanner';
            $checkedInBy = $scannerName . ' (' . (($source === 'manual') ? 'Manual Input' : 'QR Scanner') . ')';

            Log::info('Performing check-in:', [
                'method' => $checkinMethod,
                'checked_by' => $checkedInBy
            ]);

            // Update check-in dengan scanner info
            $registration->update([
                'is_checked_in' => true,
                'checked_in_at' => now(),
                'checked_in_by' => $checkedInBy,
                'checkin_method' => $checkinMethod,
            ]);

            Log::info('Check-in successful:', [
                'qr_code' => $qrCode,
                'name' => $registration->name,
                'position' => $registration->position
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Check-in berhasil!',
                'data' => [
                    'kode' => $registration->qr_code,
                    'nama' => $registration->name,
                    'email' => $registration->email,
                    'telepon' => $registration->phone,
                    'position' => $registration->position,
                    'event' => $registration->event->name,
                    'waktu_checkin' => now()->format('H:i:s'),
                    'checked_in_by' => $checkedInBy
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Check-in error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan sistem: ' . $e->getMessage()
            ], 500);
        }
    }

    // Manual Check-in (alternatif route untuk form submission)
    public function verifyTicket(Request $request)
    {
        $request->validate(['qr_code' => 'required|string']);

        $qrCode = trim($request->qr_code);

        $registration = Registration::with('event')
            ->where('qr_code', $qrCode)
            ->first();

        if (!$registration) {
            return redirect()->back()->with('error', 'Kode tiket tidak ditemukan: ' . $qrCode);
        }

        if ($registration->is_checked_in) {
            return redirect()->route('admin.dashboard')
                ->with('info', $registration->name . ' (' . $registration->position . ') sudah check-in pada: ' . $registration->checked_in_at->format('d/m/Y H:i') . ' oleh: ' . $registration->checked_in_by);
        }

        // ✅ GET ADMIN YANG SEDANG LOGIN
        $scanner = Auth::guard('admin')->user();
        $scannerName = $scanner ? $scanner->name : 'System';

        // ✅ Tentukan metode check-in (MANUAL untuk method ini)
        $checkinMethod = 'manual';
        $checkedInBy = $scannerName . ' (Manual Input)';

        $registration->update([
            'is_checked_in' => true,
            'checked_in_at' => now(),
            'checked_in_by' => $checkedInBy,
            'checkin_method' => $checkinMethod,
        ]);

        return redirect()->route('admin.dashboard')
            ->with('success', 'Check-in berhasil untuk: ' . $registration->name . ' (' . $registration->position . ')');
    }

public function downloadQRCode(Registration $registration)
{
    $qrData = $registration->qr_code;
    
    $qrCode = new DNS2D();
    $qrCodePng = $qrCode->getBarcodePNG($qrData, 'QRCODE', 10, 10);
    
    // ✅ DECODE BASE64 JIKA PERLU
    if (base64_decode($qrCodePng, true)) {
        $qrCodeBinary = base64_decode($qrCodePng);
        return response($qrCodeBinary)
            ->header('Content-Type', 'image/png')
            ->header('Content-Disposition', 'attachment; filename="QRCode-' . $registration->qr_code . '.png"');
    } else {
        // Jika sudah binary, langsung return
        return response($qrCodePng)
            ->header('Content-Type', 'image/png')
            ->header('Content-Disposition', 'attachment; filename="QRCode-' . $registration->qr_code . '.png"');
    }
}

}