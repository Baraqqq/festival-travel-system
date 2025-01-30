<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Point;

class PointSeeder extends Seeder
{
    public function run()
    {
        Point::factory()->count(20)->create();
    }
}