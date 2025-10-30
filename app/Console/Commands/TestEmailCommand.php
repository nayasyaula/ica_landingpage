<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\EventRegistrationMail;
use App\Models\Registration;

class TestEmailCommand extends Command
{
    protected $signature = 'email:test {email}';
    protected $description = 'Test email configuration';

    public function handle()
    {
        $email = $this->argument('email');
        
        // Create dummy registration for testing
        $registration = new Registration([
            'name' => 'Test User',
            'email' => $email,
            'qr_code' => 'test-qr-code-123',
        ]);
        
        // Mock event relationship
        $registration->setRelation('event', new \App\Models\Event([
            'name' => 'Test Event',
            'event_date' => now()->addDays(7),
            'location' => 'Test Location'
        ]));

        try {
            Mail::to($email)->send(new EventRegistrationMail($registration));
            $this->info('Email sent successfully to: ' . $email);
        } catch (\Exception $e) {
            $this->error('Failed to send email: ' . $e->getMessage());
        }
    }
}