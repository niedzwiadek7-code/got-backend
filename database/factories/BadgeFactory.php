<?php

namespace Database\Factories;

use App\Models\Badge;
use Illuminate\Database\Eloquent\Factories\Factory;


class BadgeFactory extends Factory
{
    protected $model = Badge::class;
    

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'point_threshold' => $this->faker->numberBetween(1, 100),
            'updated_at' => now(),
            'created_at' => now(),
        ];
    }
}
