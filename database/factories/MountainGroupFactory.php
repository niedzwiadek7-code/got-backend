<?php

namespace Database\Factories;

use App\Models\MountainGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

class MountainGroupFactory extends Factory
{
    protected $model = MountainGroup::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
        ];
    }
}

