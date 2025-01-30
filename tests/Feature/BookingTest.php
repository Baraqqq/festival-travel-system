<?php

namespace Tests\Feature;

use App\Models\Booking;
use App\Models\Festival;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookingTest extends TestCase
{
    use RefreshDatabase;

    public function test_booking_can_be_created()
    {
        $user = User::factory()->create();
        $festival = Festival::factory()->create();

        $this->actingAs($user)
            ->post('/bookings', [
                'user_id' => $user->id,
                'festival_id' => $festival->id,
                'boekingsdatum' => '2023-01-01',
                'status' => 'confirmed',
            ])
            ->assertRedirect('/bookings');

        $this->assertDatabaseHas('bookings', ['user_id' => $user->id, 'festival_id' => $festival->id]);
    }

    public function test_booking_can_be_cancelled()
    {
        $user = User::factory()->create();
        $booking = Booking::factory()->create(['user_id' => $user->id]);

        $this->actingAs($user)
            ->delete("/bookings/{$booking->id}")
            ->assertRedirect('/bookings');

        $this->assertDatabaseMissing('bookings', ['id' => $booking->id]);
    }
}