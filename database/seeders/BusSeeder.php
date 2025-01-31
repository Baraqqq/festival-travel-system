<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bus;
use App\Models\Festival;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $festival1 = Festival::where('naam', '777 Festival')->first();
        $festival2 = Festival::where('naam', 'LayLune Festival')->first();
        $festival3 = Festival::where('naam', 'Mosaic Festival')->first();

        Bus::create([
            'festival_id' => $festival1->id,
            'capaciteit' => 150,
            'status' => 'beschikbaar',
            'breng_tijd' => '2025-05-14 10:00:00',
            'ophaal_tijd' => '2025-05-14 23:00:00',
            'ophaal_punt' => 'Centraal Station Amstedam'
        ]);

        Bus::create([
            'festival_id' => $festival2->id,
            'capaciteit' => 160,
            'status' => 'beschikbaar',
            'breng_tijd' => '2025-10-12 09:00:00',
            'ophaal_tijd' => '2025-10-12 22:00:00',
            'ophaal_punt' => 'Station Almere Stad'
        ]);

        Bus::create([
            'festival_id' => $festival3->id,
            'capaciteit' => 155,
            'status' => 'beschikbaar',
            'breng_tijd' => '2025-06-10 11:00:00',
            'ophaal_tijd' => '2025-06-10 21:00:00',
            'ophaal_punt' => 'Amsterdam ArenA'
        ]);
    }
}