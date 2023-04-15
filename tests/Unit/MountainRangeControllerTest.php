<?php

namespace Tests\Unit\Http\Controllers;

use App\Models\MountainGroup;
use App\Models\MountainRange;
use App\Models\Section;
use App\Models\TerrainPoint;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MountainRangeControllerTest extends TestCase
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
        $mountainRanges = MountainRange::factory(3)->create();

        $response = $this->get('/api/mountain-ranges');

        $response->assertStatus(200);
        $response->assertJson($mountainRanges->toArray());
    }

    /**
     * Test section store endpoint.
     *
     * @return void
     */
    public function testStore()
    {
        $name = $this->faker->name;
        $mountainGroup = MountainGroup::factory()->create();

        $response = $this->postJson('/api/mountain-ranges', [
            'name' => $name,
            'mountain_group' => $mountainGroup->id,
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'name' => $name,
            'mountain_group' => $mountainGroup->id,
        ]);
        $this->assertDatabaseHas('mountain_ranges', [
            'name' => $name,
            'mountain_group' => $mountainGroup->id,
        ]);
    }

    /**
     * Test section show endpoint.
     *
     * @return void
     */
    public function testShow()
    {
        $mountainRange = MountainRange::factory()->create();

        $response = $this->get("/api/mountain-ranges/{$mountainRange->id}");

        $response->assertStatus(200)
            ->assertJson($mountainRange->toArray());
    }

    /**
     * Test section update endpoint.
     *
     * @return void
     */
    public function testUpdate()
    {
        $mountainRange = MountainRange::factory()->create();

        $name = $this->faker->name;
        $mountainGroup = MountainGroup::factory()->create();

        $response = $this->putJson("/api/mountain-ranges/{$mountainRange->id}", [
            'name' => $name,
            'mountain_group' => $mountainGroup->id,
        ]);

        $response->assertStatus(200)->assertJson([
            'id' => $mountainRange->id,
            'name' => $name,
            'mountain_group' => $mountainGroup->id,
        ]);
    }

    /**
     * Test section destroy endpoint.
     *
     * @return void
     */
    public function testDestroy()
    {
        $mountainRange = MountainRange::factory()->create();

        $response = $this->delete("/api/mountain-ranges/{$mountainRange->id}");

        $response->assertStatus(200);
        $response->assertJson(['message' => 'Mountain range deleted']);
    }
}


