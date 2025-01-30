<?php

namespace Database\Factories;

use App\Models\Bus;
use App\Models\Festival;
use Illuminate\Database\Eloquent\Factories\Factory;

class BusFactory extends Factory
{
    protected $model = Bus::class;

    public function definition()
    {
        return [
            'festival_id' => Festival::factory(),
            'capaciteit' => $this->faker->numberBetween(20, 50),
            'status' => $this->faker->randomElement(['available', 'unavailable']),
        ];
    }
}