<?php

namespace Database\Seeders;

use App\Models\Sponsor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class SponsorSeeder extends Seeder
{
    public function run()
    {
        $sponsors = [
            // Platinum Sponsors
            [
                'name' => 'Royal Canin',
                'tier' => 'platinum',
                'logo' => 'sponsors/royal-canin.png',
            ],
            [
                'name' => 'Whiskas',
                'tier' => 'platinum',
                'logo' => 'sponsors/whiskas.png',
            ],

            // Gold Sponsors
            [
                'name' => 'Purina Pro Plan',
                'tier' => 'gold',
                'logo' => 'sponsors/purina.png',
            ],
            [
                'name' => 'Hill\'s Science Diet',
                'tier' => 'gold',
                'logo' => 'sponsors/hills.png',
            ],
            [
                'name' => 'IAMS',
                'tier' => 'gold',
                'logo' => 'sponsors/iams.png',
            ],

            // Silver Sponsors
            [
                'name' => 'Friskies',
                'tier' => 'silver',
                'logo' => 'sponsors/friskies.png',
            ],
            [
                'name' => 'Sheba',
                'tier' => 'silver',
                'logo' => 'sponsors/sheba.png',
            ],
            [
                'name' => 'Fancy Feast',
                'tier' => 'silver',
                'logo' => 'sponsors/fancy-feast.png',
            ],

            // Bronze Sponsors
            [
                'name' => 'Temptations',
                'tier' => 'bronze',
                'logo' => 'sponsors/temptations.png',
            ],
            [
                'name' => 'Greenies',
                'tier' => 'bronze',
                'logo' => 'sponsors/greenies.png',
            ],
            [
                'name' => 'Meow Mix',
                'tier' => 'bronze',
                'logo' => 'sponsors/meow-mix.png',
            ],
        ];

        foreach ($sponsors as $sponsor) {
            Sponsor::create($sponsor);
        }
    }
}