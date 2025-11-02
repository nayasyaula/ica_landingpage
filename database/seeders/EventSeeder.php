<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class EventSeeder extends Seeder
{
    public function run()
    {
        // CEK DULU APA SUDAH ADA EVENT
        $existingEvent = Event::first();
        
        if (!$existingEvent) {
            // BUAT EVENT BARU JIKA BELUM ADA
            Event::create([
                'name' => 'Indonesian Cat Association',
                'description' => 'Melalui acara ini, kami ingin mengedukasi masyarakat tentang cara merawat kucing dengan baik, 
                serta mempertemukan komunitas pecinta kucing, pelaku industri, dan masyarakat umum dalam satu kegiatan yang inspiratif dan bermanfaat.',
                'event_date' => Carbon::create(2025, 11, 28),
                'location' => 'HARRIS Hotel & Residence Riverview Kuta Bali',
            ]);
        } else {
            // UPDATE EVENT YANG SUDAH ADA
            $existingEvent->update([
                'name' => 'Indonesian Cat Association',
                'description' => 'Melalui acara ini, kami ingin mengedukasi masyarakat tentang cara merawat kucing dengan baik, 
                serta mempertemukan komunitas pecinta kucing, pelaku industri, dan masyarakat umum dalam satu kegiatan yang inspiratif dan bermanfaat.',
                'event_date' => Carbon::create(2025, 11, 28),
                'location' => 'HARRIS Hotel & Residence Riverview Kuta Bali',
            ]);
        }
    }
}