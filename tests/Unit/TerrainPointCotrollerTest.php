<?php

namespace Tests\Unit;

use App\Models\TerrainPoint;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TerrainPointCotrollerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function it_can_get_all_terrain_points()
    {
        $terrainPoints = TerrainPoint::factory()->count(3)->create();

        $response = $this->getJson('/api/terrain-points');

        $response->assertOk()
            ->assertJsonCount(3)
            ->assertJsonStructure([
                '*' => ['name', 'description', 'sea_level_height', 'latitude', 'longitude']
            ]);
    }

    /** @test */
    public function it_can_store_new_terrain_point()
    {
        $data = [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'sea_level_height' => $this->faker->randomNumber(3),
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
        ];

        $response = $this->postJson('/api/terrain-points', $data);

        $response->assertOk()
            ->assertJson($data);
    }

    /** @test */
    public function it_can_show_a_terrain_point()
    {
        $terrainPoint = TerrainPoint::factory()->create();

        $response = $this->getJson("/api/terrain-points/{$terrainPoint->id}");

        $response->assertStatus(200)
            ->assertJson($terrainPoint->toArray());
    }

    /** @test */
    public function it_can_update_a_terrain_point()
    {
        $terrainPoint = TerrainPoint::factory()->create();

        $data = [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'sea_level_height' => $this->faker->randomNumber(3),
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
        ];

        $response = $this->putJson("/api/terrain-points/{$terrainPoint->id}", $data);

        $response->assertOk()
            ->assertJson($data);
    }

    /** @test */
    public function it_can_delete_a_terrain_point()
    {
        $terrainPoint = TerrainPoint::factory()->create();

        $response = $this->deleteJson("/api/terrain-points/{$terrainPoint->id}");

        $response->assertOk()
            ->assertJson(['message' => 'Terrain point deleted']);

    }
}

