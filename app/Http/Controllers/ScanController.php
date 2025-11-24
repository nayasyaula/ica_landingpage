<?php
// app/Http/Controllers/ScanController.php
namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

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
        $source = $request->get('source', 'scanner'); // scanner, manual, camera

        Log::info('🔍 SCAN ATTEMPT', [
            'qr_code' => $scannedCode,
            'source' => $source,
            'scanner_ip' => $request->ip(),
            'timestamp' => now()->timezone('Asia/Jakarta')->format('Y-m-d H:i:s')
        ]);

        // CARI REGISTRATION - HANYA BERDASARKAN QR_CODE
        $registration = Registration::with('event')
            ->where('qr_code', $scannedCode)
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
            $checkinTime = $registration->checked_in_at 
                ? $registration->checked_in_at->timezone('Asia/Jakarta')->format('d/m/Y H:i:s')
                : 'Unknown';

            Log::info('⚠ DUPLICATE SCAN', [
                'qr_code' => $scannedCode,
                'previous_checkin' => $checkinTime
            ]);

            return response()->json([
                'success' => true,
                'message' => "ℹ Peserta sudah check-in pada: {$checkinTime}",
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
                    'checked_in_by' => $registration->checked_in_by ?? 'System',
                ]
            ]);
        }

        // Proses check-in
        try {
            // GUNAKAN WAKTU JAKARTA
            $jakartaTime = Carbon::now('Asia/Jakarta');
            
            // Dapatkan admin yang sedang login
            $admin = Auth::guard('admin')->user();
            $checkedInBy = $admin ? $admin->name . ' (' . $source . ')' : 'System (' . $source . ')';

            // UPDATE SESUAI FILLABLE MODEL
            $updateData = [
                'is_checked_in' => true,
                'checked_in_at' => $jakartaTime
            ];

            // Hanya tambah checked_in_by jika field ada di model
            if (in_array('checked_in_by', $registration->getFillable())) {
                $updateData['checked_in_by'] = $checkedInBy;
            }

            $registration->update($updateData);

            Log::info('✅ CHECK-IN SUCCESS', [
                'registration_id' => $registration->id,
                'name' => $registration->name,
                'event' => $registration->event->name,
                'qr_code' => $registration->qr_code,
                'source' => $source,
                'checked_in_by' => $checkedInBy,
                'checkin_time' => $jakartaTime->format('Y-m-d H:i:s')
            ]);

            return response()->json([
                'success' => true,
                'message' => '✅ Check-in berhasil!',
                'is_duplicate' => false,
                'data' => [
                    'kode' => $registration->qr_code,
                    'nama' => $registration->name,
                    'email' => $registration->email,
                    'telepon' => $registration->phone,
                    'position' => $registration->position,
                    'event' => $registration->event->name,
                    'waktu_checkin' => $jakartaTime->format('H:i:s'),
                    'checked_in_by' => $checkedInBy,
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

        // ✅ VALIDASI FORMAT ICA - GUNAKAN PATTERN YANG SAMA DENGAN SCANNER
        if (!preg_match('/^ICA-[A-Z0-9]{3}-[A-Z0-9]{4}$/i', $manualCode)) {
            return response()->json([
                'success' => false,
                'message' => '❌ Format QR Code tidak valid: "' . $manualCode . '". Format yang diharapkan: ICA-XXX-XXXX'
            ], 400);
        }

        Log::info('🔍 MANUAL CHECK-IN ATTEMPT', [
            'qr_code' => $manualCode,
            'scanner_ip' => $request->ip(),
            'timestamp' => now()->timezone('Asia/Jakarta')->format('Y-m-d H:i:s')
        ]);

        $request->merge([
            'qr_code' => $manualCode,
            'source' => 'manual'
        ]);

        return $this->verify($request);
    }

    public function batchCheckin(Request $request)
    {
        $request->validate([
            'qr_codes' => 'required|array',
            'qr_codes.*' => 'string|max:20'
        ]);

        $results = [];
        $successCount = 0;
        $errorCount = 0;

        foreach ($request->qr_codes as $qrCode) {
            $searchCode = trim($qrCode);

            // Buat request dummy untuk setiap QR code
            $dummyRequest = new Request([
                'qr_code' => $searchCode,
                'source' => 'bulk'
            ]);

            try {
                $response = $this->verify($dummyRequest);
                $responseData = json_decode($response->getContent(), true);
                
                $results[] = [
                    'qr_code' => $searchCode,
                    'success' => $responseData['success'],
                    'message' => $responseData['message'],
                    'is_duplicate' => $responseData['is_duplicate'] ?? false,
                    'data' => $responseData['data'] ?? null
                ];

                if ($responseData['success']) {
                    $successCount++;
                } else {
                    $errorCount++;
                }
            } catch (\Exception $e) {
                $results[] = [
                    'qr_code' => $searchCode,
                    'success' => false,
                    'message' => 'Error processing: ' . $e->getMessage()
                ];
                $errorCount++;
            }
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

        $request->merge([
            'qr_code' => $barcode,
            'source' => 'barcode'
        ]);
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