<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LandingPageController extends Controller
{
    public function index()
{
    // Simple query - no slot calculations
    $events = Event::where('event_date', '>', now())
                ->orderBy('event_date', 'asc')
                ->get();

    return view('landing.index', compact('events'));
}

    public function contact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|min:10'
        ]);
        
        return back()->with('success', 'Thank you for your message! We\'ll get back to you soon.');
    }
}