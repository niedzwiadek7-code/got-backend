<?php

namespace Tests\Unit\Http\Controllers;

use App\Models\MountainRange;
use App\Models\Section;
use App\Models\TerrainPoint;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SectionControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * Test section index endpoint.
     *
     * @return void
     */
    public function testIndex()
    {
        $sections = Section::factory(3)->create();

        $response = $this->get('/api/sections');

        $response->assertStatus(200);
        $response->assertJson($sections->toArray());
    }

    /**
     * Test section store endpoint.
     *
     * @return void
     */
    public function testStore()
    {
        $name = $this->faker->name;
        $description = $this->faker->sentence;

        MountainRange::factory(3)->create();
        TerrainPoint::factory(3)->create();

        $mountainRange = MountainRange::query()->inRandomOrder()->first();
        $terrain_point_a = TerrainPoint::query()->inRandomOrder()->first();
        $terrain_point_b = TerrainPoint::query()->inRandomOrder()->first();

        $badge_points_a_to_b = $this->faker->numberBetween(1, 3);
        $badge_points_b_to_a = $this->faker->numberBetween(1, 3);

        $response = $this->postJson('/api/sections', [
            'name' => $name,
            'description' => $description,
            'mountain_range' => $mountainRange->id,
            'terrain_point_a' => $terrain_point_a->id,
            'terrain_point_b' => $terrain_point_b->id,
            'badge_points_a_to_b' => $badge_points_a_to_b,
            'badge_points_b_to_a' => $badge_points_b_to_a,
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'name' => $name,
            'description' => $description,
            'mountain_range' => $mountainRange->id,
            'terrain_point_a' => $terrain_point_a->id,
            'terrain_point_b' => $terrain_point_b->id,
            'badge_points_a_to_b' => $badge_points_a_to_b,
            'badge_points_b_to_a' => $badge_points_b_to_a,
        ]);
        $this->assertDatabaseHas('sections', [
            'name' => $name,
            'description' => $description,
            'mountain_range' => $mountainRange->id,
            'terrain_point_a' => $terrain_point_a->id,
            'terrain_point_b' => $terrain_point_b->id,
            'badge_points_a_to_b' => $badge_points_a_to_b,
            'badge_points_b_to_a' => $badge_points_b_to_a,
        ]);
    }

    /**
     * Test section show endpoint.
     *
     * @return void
     */
    public function testShow()
    {
        $section = Section::factory()->create();

        $response = $this->get("/api/sections/{$section->id}");

        $response->assertStatus(200)
            ->assertJson($section->toArray());
    }

    /**
     * Test section update endpoint.
     *
     * @return void
     */
    public function testUpdate()
    {
        $section = Section::factory()->create();

        $name = $this->faker->name;
        $description = $this->faker->sentence;

        MountainRange::factory(3)->create();
        TerrainPoint::factory(3)->create();

        $mountainRange = MountainRange::query()->inRandomOrder()->first();
        $terrain_point_a = TerrainPoint::query()->inRandomOrder()->first();
        $terrain_point_b = TerrainPoint::query()->inRandomOrder()->first();

        $badge_points_a_to_b = $this->faker->numberBetween(1, 3);
        $badge_points_b_to_a = $this->faker->numberBetween(1, 3);

        $response = $this->putJson("/api/sections/{$section->id}", [
            'name' => $name,
            'description' => $description,
            'mountain_range' => $mountainRange->id,
            'terrain_point_a' => $terrain_point_a->id,
            'terrain_point_b' => $terrain_point_b->id,
            'badge_points_a_to_b' => $badge_points_a_to_b,
            'badge_points_b_to_a' => $badge_points_b_to_a,
        ]);

        $response->assertStatus(200)->assertJson([
            'name' => $name,
            'description' => $description,
            'mountain_range' => $mountainRange->id,
            'terrain_point_a' => $terrain_point_a->id,
            'terrain_point_b' => $terrain_point_b->id,
            'badge_points_a_to_b' => $badge_points_a_to_b,
            'badge_points_b_to_a' => $badge_points_b_to_a,
        ]);
    }

    /**
     * Test section destroy endpoint.
     *
     * @return void
     */
    public function testDestroy()
    {
        $section = Section::factory()->create();

        $response = $this->delete("/api/sections/{$section->id}");

        $response->assertStatus(200);
        $response->assertJson(['message' => 'Section deleted']);
    }
}


