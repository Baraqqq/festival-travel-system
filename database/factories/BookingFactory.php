<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\User;
use App\Models\Festival;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    protected $model = Booking::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'festival_id' => Festival::factory(),
            'boekingsdatum' => $this->faker->date,
            'status' => $this->faker->randomElement(['confirmed', 'cancelled']),
        ];
    }
}