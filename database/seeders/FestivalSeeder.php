<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Festival;

class FestivalSeeder extends Seeder
{
    public function run()
    {
        Festival::create([
            'naam' => 'Test Festival',
            'locatie' => 'Test Location',
            'genre' => 'Rock', // Voeg het genre veld toe
            'datum' => '2023-01-01',
            'beschrijving' => 'Test Description',
        ]);
    }
}