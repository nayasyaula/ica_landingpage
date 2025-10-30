<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Mail\EventRegistrationMail;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller
{
    public function create(Event $event)
    {
        if ($event->available_slots <= 0) {
            return redirect()->route('events.index')
                ->with('error', 'Event sudah penuh!');
        }

        return view('registrations.create', compact('event'));
    }

    public function store(Request $request, Event $event)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
        ]);

        // Check available slots
        if ($event->available_slots <= 0) {
            return back()->with('error', 'Event sudah penuh!');
        }

        // Check duplicate email for same event
        $existingRegistration = Registration::where('event_id', $event->id)
            ->where('email', $request->email)
            ->first();

        if ($existingRegistration) {
            return back()->with('error', 'Email ini sudah terdaftar untuk event ini!');
        }

        // Generate unique QR code
        $qrCode = Str::uuid()->toString();

        $registration = Registration::create([
            'event_id' => $event->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'qr_code' => $qrCode,
        ]);

        // Kirim email
        try {
            Mail::to($registration->email)->send(new EventRegistrationMail($registration));
        } catch (\Exception $e) {
            // Log error but don't show to user
            \Log::error('Email sending failed: ' . $e->getMessage());
        }

        return redirect()->route('registrations.success', $registration);
    }

    public function success(Registration $registration)
    {
        // Generate QR code image untuk tampilan web
        $qrImage = QrCode::size(200)->generate(route('registrations.show', $registration));
        
        return view('registrations.success', compact('registration', 'qrImage'));
    }

    public function show(Registration $registration)
    {
        return view('registrations.show', compact('registration'));
    }
}