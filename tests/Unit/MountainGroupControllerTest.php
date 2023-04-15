<?php

namespace Tests\Unit\Http\Controllers;

use App\Models\MountainGroup;
use App\Models\MountainRange;
use App\Models\Section;
use App\Models\TerrainPoint;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MountainGroupControllerTest extends TestCase
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
        $mountainGroups = MountainGroup::factory(3)->create();

        $response = $this->get('/api/mountain-groups');

        $response->assertStatus(200);
        $response->assertJson($mountainGroups->toArray());
    }

    /**
     * Test section store endpoint.
     *
     * @return void
     */
    public function testStore()
    {
        $name = $this->faker->name;

        $response = $this->postJson('/api/mountain-groups', [
            'name' => $name,
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'name' => $name,
        ]);
        $this->assertDatabaseHas('mountain_groups', [
            'name' => $name,
        ]);
    }

    /**
     * Test section show endpoint.
     *
     * @return void
     */
    public function testShow()
    {
        $mountainGroup = MountainGroup::factory()->create();

        $response = $this->get("/api/mountain-groups/{$mountainGroup->id}");

        $response->assertStatus(200)
            ->assertJson($mountainGroup->toArray());
    }

    /**
     * Test section update endpoint.
     *
     * @return void
     */
    public function testUpdate()
    {
        $mountainGroup = MountainGroup::factory()->create();

        $name = $this->faker->name;

        $response = $this->putJson("/api/mountain-groups/{$mountainGroup->id}", [
            'name' => $name,
        ]);

        $response->assertStatus(200)->assertJson([
            'name' => $name,
        ]);
    }

    /**
     * Test section destroy endpoint.
     *
     * @return void
     */
    public function testDestroy()
    {
        $mountainGroup = MountainGroup::factory()->create();

        $response = $this->delete("/api/mountain-groups/{$mountainGroup->id}");

        $response->assertStatus(200);
        $response->assertJson(['message' => 'Mountain group deleted']);
    }
}


