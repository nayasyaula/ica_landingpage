<?php
// app/Http/Controllers/ScanController.php
namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class ScanController extends Controller
{
    public function index()
    {
        return view('scan.index');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'qr_code' => 'required|string'
        ]);

        $registration = Registration::where('qr_code', $request->qr_code)->first();

        if (!$registration) {
            return response()->json([
                'success' => false,
                'message' => 'QR Code tidak valid!'
            ]);
        }

        if ($registration->is_checked_in) {
            return response()->json([
                'success' => false,
                'message' => 'Peserta sudah check-in pada: ' . $registration->checked_in_at->format('d/m/Y H:i')
            ]);
        }

        // Check-in peserta
        $registration->update([
            'is_checked_in' => true,
            'checked_in_at' => now()
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Check-in berhasil!',
            'data' => [
                'name' => $registration->name,
                'email' => $registration->email,
                'event' => $registration->event->name
            ]
        ]);
    }
}