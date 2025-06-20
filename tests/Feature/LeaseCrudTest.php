<?php

namespace Tests\Feature;

use App\Models\Lease;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LeaseCrudTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_lease()
    {
        $lease = Lease::factory()->create();

        $this->assertDatabaseHas('leases', [
            'id' => $lease->id,
        ]);
    }

    /** @test */
    public function it_can_update_a_lease()
    {
        $lease = Lease::factory()->create();
        $lease->update(['status' => 'active']);

        $this->assertDatabaseHas('leases', [
            'id' => $lease->id,
            'status' => 'active',
        ]);
    }

    /** @test */
    public function it_can_delete_a_lease()
    {
        $lease = Lease::factory()->create();
        $lease->delete();

        $this->assertDatabaseMissing('leases', [
            'id' => $lease->id,
        ]);
    }
}
