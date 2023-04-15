<?php

namespace Database\Factories;

use App\Models\MountainRange;
use App\Models\Section;
use App\Models\TerrainPoint;
use Illuminate\Database\Eloquent\Factories\Factory;

class SectionFactory extends Factory
{
    protected $model = Section::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence(10),
            'mountain_range' => MountainRange::factory()->create(),
            'badge_points_a_to_b' => $this->faker->numberBetween(1, 10),
            'badge_points_b_to_a' => $this->faker->numberBetween(1, 10),
            'terrain_point_a' => TerrainPoint::factory()->create(),
            'terrain_point_b' => TerrainPoint::factory()->create(),
        ];
    }
}

