<?php
// app/Http/Controllers/ScanController.php
namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth; // ✅ TAMBAH INI

class ScanController extends Controller
{
    public function index()
    {
        $events = Event::where('is_active', true)->get();
        return view('scan.index', compact('events'));
    }

     public function verify(Request $request)
    {
        $request->validate([
            'qr_code' => 'required|string|max:20'
        ]);

        $scannedCode = trim($request->qr_code);

        Log::info('🔍 SCAN ATTEMPT', [
            'qr_code' => $scannedCode,
            'scanner_ip' => $request->ip(),
            'timestamp' => now()->timezone('Asia/Jakarta')->format('Y-m-d H:i:s')
        ]);

        // ✅ GET ADMIN/SCANNER YANG SEDANG LOGIN
        $scanner = Auth::guard('admin')->user();
        $scannerName = $scanner ? $scanner->name : 'System';

        // ✅ CARI REGISTRATION
        $registration = Registration::with('event')
            ->where('barcode_number', $scannedCode)
            ->orWhere('qr_code', $scannedCode)
            ->first();

        if (!$registration) {
            Log::warning('❌ SCAN FAILED - Code not found', ['qr_code' => $scannedCode]);
            return response()->json([
                'success' => false,
                'message' => '❌ Kode tiket tidak ditemukan: ' . $scannedCode
            ], 404);
        }

        // Cek event masih aktif
        if (!$registration->event || !$registration->event->is_active) {
            return response()->json([
                'success' => false,
                'message' => '❌ Event sudah berakhir atau tidak aktif.'
            ]);
        }

        // Cek duplicate check-in
        if ($registration->is_checked_in) {
            // ✅ FORMAT WAKTU JAKARTA
            $checkinTime = $registration->checked_in_at 
                ? $registration->checked_in_at->timezone('Asia/Jakarta')->format('d/m/Y H:i:s')
                : 'Unknown';
            
            $checkedInBy = $registration->checked_in_by ?? 'System';

            Log::info('⚠ DUPLICATE SCAN', [
                'qr_code' => $scannedCode,
                'previous_checkin' => $checkinTime
            ]);

            return response()->json([
                'success' => true,
                'message' => "ℹ Peserta sudah check-in pada: {$checkinTime} oleh: {$checkedInBy}",
                'is_duplicate' => true,
                'data' => [
                    'kode' => $registration->qr_code,
                    'nama' => $registration->name,
                    'email' => $registration->email,
                    'telepon' => $registration->phone,
                    'position' => $registration->position,
                    'event' => $registration->event->name,
                    'waktu_checkin' => $registration->checked_in_at->timezone('Asia/Jakarta')->format('H:i:s'),
                    'checked_in_at' => $registration->checked_in_at->toISOString(),
                    'checked_in_by' => $registration->checked_in_by,
                    'checkin_method' => $registration->checkin_method
                ]
            ]);
        }

        // Proses check-in
        try {
            // ✅ Tentukan metode check-in
            $isBarcode = preg_match('/^\d{13}$/', $scannedCode);
            $checkinMethod = $isBarcode ? 'qr_scanner' : 'manual_input';
            $checkedInBy = $scannerName . ' (' . ($isBarcode ? 'QR Scanner' : 'Manual Input') . ')';

            // ✅ GUNAKAN WAKTU JAKARTA
            $jakartaTime = Carbon::now('Asia/Jakarta');

            $registration->update([
                'is_checked_in' => true,
                'checked_in_at' => $jakartaTime,
                'checked_in_by' => $checkedInBy,
                'checkin_method' => $checkinMethod
            ]);

            Log::info('✅ CHECK-IN SUCCESS', [
                'registration_id' => $registration->id,
                'name' => $registration->name,
                'event' => $registration->event->name,
                'barcode_number' => $registration->barcode_number,
                'qr_code' => $registration->qr_code,
                'checked_by' => $checkedInBy,
                'checkin_time' => $jakartaTime->format('Y-m-d H:i:s')
            ]);

            return response()->json([
                'success' => true,
                'message' => '✅ Check-in berhasil!',
                'registration' => $registration,
                'data' => [
                    'kode' => $registration->qr_code,
                    'barcode' => $registration->barcode_number,
                    'nama' => $registration->name,
                    'email' => $registration->email,
                    'telepon' => $registration->phone,
                    'position' => $registration->position,
                    'event' => $registration->event->name,
                    'waktu_checkin' => $jakartaTime->format('H:i:s'),
                    'checked_in_by' => $checkedInBy,
                    'ticket_type' => $registration->ticket_type,
                    'checkin_method' => $checkinMethod
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('❌ CHECK-IN ERROR', [
                'qr_code' => $scannedCode,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => '❌ Terjadi error saat check-in. Silakan coba lagi.'
            ], 500);
        }
    }

    public function apiVerify(Request $request)
    {
        $qrCodeData = $request->get('data') ?? $request->get('qr_code') ?? $request->qr_code;

        if (!$qrCodeData) {
            return response()->json([
                'status' => 'error',
                'message' => 'No QR Code data received'
            ], 400);
        }

        $request->merge(['qr_code' => $qrCodeData]);
        return $this->verify($request);
    }

    public function manualCheckin(Request $request)
    {
        $request->validate(['qr_code' => 'required|string|max:20']);

        $manualCode = trim(strtoupper($request->qr_code));

        // ✅ VALIDASI FORMAT ICA HANYA UNTUK MANUAL INPUT
        if (!preg_match('/^ICA-[A-Z0-9]{3}-[A-Z0-9]{4,}$/i', $manualCode)) {
            return response()->json([
                'success' => false,
                'message' => '❌ Format QR Code tidak valid: "' . $manualCode . '". Format yang diharapkan: ICA-XXX-XXXX'
            ], 400);
        }

        // ✅ GET ADMIN YANG SEDANG LOGIN
        $scanner = Auth::guard('admin')->user();
        $scannerName = $scanner ? $scanner->name : 'System';

        // ✅ Tentukan metode check-in (MANUAL untuk method ini)
        $checkinMethod = 'manual';
        $checkedInBy = $scannerName . ' (Manual Input)';

        $registration = Registration::with('event')
            ->where('qr_code', $manualCode)
            ->first();

        if (!$registration) {
            return response()->json([
                'success' => false,
                'message' => '❌ Kode tiket tidak ditemukan: ' . $manualCode
            ], 404);
        }

        if ($registration->is_checked_in) {
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

        // Update check-in
        $registration->update([
            'is_checked_in' => true,
            'checked_in_at' => now(),
            'checked_in_by' => $checkedInBy,
            'checkin_method' => $checkinMethod,
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
    }

    public function batchCheckin(Request $request)
    {
        $request->validate([
            'qr_codes' => 'required|array',
            'qr_codes.*' => 'string|max:20'
        ]);

        // ✅ GET ADMIN YANG SEDANG LOGIN
        $scanner = Auth::guard('admin')->user();
        $scannerName = $scanner ? $scanner->name : 'System';

        $results = [];
        $successCount = 0;
        $errorCount = 0;

        foreach ($request->qr_codes as $qrCode) {
            $searchCode = trim($qrCode);

            // ✅ CARI DUAL CODE: 13 digit ATAU ICA format
            $registration = Registration::with('event')
                ->where('barcode_number', $searchCode)
                ->orWhere('qr_code', $searchCode)
                ->first();

            if (!$registration) {
                $results[] = [
                    'qr_code' => $searchCode,
                    'success' => false,
                    'message' => 'Tiket tidak ditemukan'
                ];
                $errorCount++;
                continue;
            }

            if ($registration->is_checked_in) {
                $results[] = [
                    'qr_code' => $searchCode,
                    'success' => true,
                    'message' => 'Sudah check-in',
                    'registration' => [
                        'name' => $registration->name,
                        'barcode_number' => $registration->barcode_number,
                        'checked_in_at' => $registration->checked_in_at?->format('d/m/Y H:i'),
                        'checked_in_by' => $registration->checked_in_by
                    ]
                ];
                $successCount++;
                continue;
            }

            $checkedInBy = $scannerName . ' (Bulk Check-in)';

            $registration->update([
                'is_checked_in' => true,
                'checked_in_at' => now(),
                'checked_in_by' => $checkedInBy,
                'checkin_method' => 'bulk'
            ]);

            $results[] = [
                'qr_code' => $searchCode,
                'success' => true,
                'message' => 'Check-in berhasil',
                'registration' => [
                    'name' => $registration->name,
                    'qr_code' => $registration->qr_code,
                    'barcode_number' => $registration->barcode_number,
                    'checked_in_by' => $checkedInBy
                ]
            ];
            $successCount++;
        }

        return response()->json([
            'success' => true,
            'message' => 'Proses bulk check-in selesai',
            'summary' => [
                'total' => count($request->qr_codes),
                'success' => $successCount,
                'error' => $errorCount
            ],
            'results' => $results
        ]);
    }

    // ... method-method lainnya (dashboard, search, getParticipantDetails, dll) tetap sama ...

    public function scanBarcode(Request $request)
    {
        $request->validate([
            'barcode' => 'required|string|size:13'
        ]);

        $barcode = trim($request->barcode);

        // Validasi format EAN-13 (harus 13 digit numeric)
        if (!preg_match('/^\d{13}$/', $barcode)) {
            return response()->json([
                'success' => false,
                'message' => '❌ Format barcode tidak valid. Harus 13 digit angka.'
            ], 400);
        }

        $request->merge(['qr_code' => $barcode]);
        return $this->verify($request);
    }

    // ✅ Statistics untuk dashboard
    public function getStatistics()
    {
        $today = now()->format('Y-m-d');
        $currentEvent = Event::where('is_active', true)->first();

        $stats = [
            'total_registrations' => Registration::count(),
            'total_checked_in' => Registration::where('is_checked_in', true)->count(),
            'today_checked_in' => Registration::whereDate('checked_in_at', $today)->count(),
            'pending_checkin' => Registration::where('is_checked_in', false)->count(),
            'checkin_rate' => Registration::count() > 0 ?
                round((Registration::where('is_checked_in', true)->count() / Registration::count()) * 100, 2) : 0,
        ];

        // Check-in trends (last 7 days)
        $checkinTrends = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $count = Registration::whereDate('checked_in_at', $date)->count();
            $checkinTrends[$date] = $count;
        }

        return response()->json([
            'success' => true,
            'stats' => $stats,
            'checkin_trends' => $checkinTrends,
            'current_event' => $currentEvent ? $currentEvent->name : 'No active event'
        ]);
    }
}