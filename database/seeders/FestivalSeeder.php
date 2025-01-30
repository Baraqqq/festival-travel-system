<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Festival;

class FestivalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Festival::create([
            'naam' => '777 Festival',
            'genre' => 'Afro-pop',
            'datum' => '2025-05-14',
            'locatie' => 'Locatie 1',
            'beschrijving' => 'Geen actie'
        ]);

        Festival::create([
            'naam' => 'LayLune Festival',
            'genre' => 'Hiphop',
            'datum' => '2025-10-12',
            'locatie' => 'Locatie 2',
            'beschrijving' => 'VIP korting'
        ]);

        Festival::create([
            'naam' => 'Mosaic Festival',
            'genre' => 'Hiphop',
            'datum' => '2025-06-10',
            'locatie' => 'Locatie 3',
            'beschrijving' => 'Geen actie'
        ]);
    }
}