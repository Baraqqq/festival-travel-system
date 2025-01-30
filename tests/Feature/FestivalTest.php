<?php

namespace Tests\Feature;

use App\Models\Festival;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FestivalTest extends TestCase
{
    use RefreshDatabase;

    public function test_festival_can_be_created()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post('/festivals', [
                'naam' => 'Test Festival',
                'locatie' => 'Test Location',
                'datum' => '2023-01-01',
                'beschrijving' => 'Test Description',
            ])
            ->assertRedirect('/festivals');

        $this->assertDatabaseHas('festivals', ['naam' => 'Test Festival']);
    }

    public function test_festival_can_be_updated()
    {
        $user = User::factory()->create();
        $festival = Festival::factory()->create();

        $this->actingAs($user)
            ->put("/festivals/{$festival->id}", [
                'naam' => 'Updated Festival',
                'locatie' => 'Updated Location',
                'datum' => '2023-01-01',
                'beschrijving' => 'Updated Description',
            ])
            ->assertRedirect('/festivals');

        $this->assertDatabaseHas('festivals', ['naam' => 'Updated Festival']);
    }

    public function test_festival_can_be_deleted()
    {
        $user = User::factory()->create();
        $festival = Festival::factory()->create();

        $this->actingAs($user)
            ->delete("/festivals/{$festival->id}")
            ->assertRedirect('/festivals');

        $this->assertDatabaseMissing('festivals', ['id' => $festival->id]);
    }
}