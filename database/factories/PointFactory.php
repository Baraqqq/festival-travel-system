<?php

namespace Database\Factories;

use App\Models\Point;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PointFactory extends Factory
{
    protected $model = Point::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'punten' => $this->faker->numberBetween(10, 100),
            'verdiend_op' => $this->faker->date,
            'ingewisseld_op' => $this->faker->optional()->date,
        ];
    }
}