<?php

namespace Database\Factories;

use App\Models\Festival;
use Illuminate\Database\Eloquent\Factories\Factory;

class FestivalFactory extends Factory
{
    protected $model = Festival::class;

    public function definition()
    {
        return [
            'naam' => $this->faker->word,
            'locatie' => $this->faker->city,
            'datum' => $this->faker->date,
            'beschrijving' => $this->faker->paragraph,
        ];
    }
}