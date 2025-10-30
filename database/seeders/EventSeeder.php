<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    Event::create([
        'name' => 'Tech Conference 2024',
        'description' => 'Konferensi teknologi terbesar tahun ini',
        'event_date' => now()->addDays(30),
        'location' => 'Jakarta Convention Center',
        'capacity' => 100,
        'is_active' => true
    ]);
}
}
