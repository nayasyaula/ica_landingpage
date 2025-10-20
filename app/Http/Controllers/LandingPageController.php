<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LandingPageController extends Controller
{
    public function index()
    {
        return view('landing.index');
    }

    public function contact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|min:10'
        ]);

        // Here you can send email, save to database, etc.
        // Mail::to('your@email.com')->send(new ContactFormMail($validated));
        
        return back()->with('success', 'Thank you for your message! We\'ll get back to you soon.');
    }
}