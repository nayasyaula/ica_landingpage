<?php
// app/Http/Controllers/Admin/DashboardController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use App\Models\Event;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $registrations = Registration::with('event')->latest()->get();
        $totalRegistrations = Registration::count();
        $events = Event::all();

        return view('admin.dashboard', compact('registrations', 'totalRegistrations', 'events'));
    }

    // app/Http/Controllers/Admin/DashboardController.php
    public function scanQR()
    {
        return view('admin.scan-qr');
    }

    public function verifyQR(Request $request)
    {
        $qrCode = $request->input('qr_code');

        $registration = Registration::where('qr_code', $qrCode)
            ->with('event')
            ->first();

        if ($registration) {
            return response()->json([
                'success' => true,
                'registration' => $registration,
                'message' => 'QR Code valid!'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'QR Code tidak valid atau tidak ditemukan.'
        ]);
    }
    public function viewRegistration($id)
    {
        $registration = Registration::with('event')->findOrFail($id);
        $qrImage = QrCode::size(200)->generate($registration->qr_code);

        return view('admin.registration-detail', compact('registration', 'qrImage'));
    }
}
