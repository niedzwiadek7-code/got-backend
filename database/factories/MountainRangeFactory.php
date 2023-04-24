<?php

namespace Database\Factories;

use App\Models\MountainGroup;
use App\Models\MountainRange;
use Illuminate\Database\Eloquent\Factories\Factory;

class MountainRangeFactory extends Factory
{
    protected $model = MountainRange::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'mountain_group_id' => $this->faker->numberBetween(1, 7),
        ];
    }
}
