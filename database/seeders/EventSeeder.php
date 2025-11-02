<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class EventSeeder extends Seeder
{
    public function run()
    {
        // HAPUS SEMUA EVENT LAMA (gunakan delete() bukan truncate())
        Event::query()->delete();

        // BUAT HANYA 1 EVENT TANPA CAPACITY
        Event::create([
            'name' => 'Indonesian Cat Association',
            'description' => 'Indonesian Cat Association (ICA) adalah organisasi resmi yang mewadahi para pecinta, pemilik, 
    dan pengembang ras kucing di Indonesia. ICA berkomitmen untuk mengedukasi masyarakat, meningkatkan kesejahteraan 
    kucing, serta mempererat hubungan antar komunitas pecinta kucing melalui berbagai kegiatan, pelatihan, dan event nasional.',
            'event_date' => Carbon::create(2025, 11, 28),
            'end_date' => Carbon::create(2025, 11, 30), // Tambah end_date
            'location' => 'HARRIS Hotel & Residence Riverview Kuta Bali',
            // capacity dihapus - UNLIMITED PARTICIPANTS
        ]);
    }
}
