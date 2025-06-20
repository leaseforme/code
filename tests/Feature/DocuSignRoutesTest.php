<?php

namespace Tests\Feature;

use App\Models\Lease;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DocuSignRoutesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function authenticated_user_can_hit_sign_route()
    {
        $user  = User::factory()->create();
        $lease = Lease::factory()->create();

        $response = $this->actingAs($user)->post(route('leases.sign', $lease));

        $response->assertRedirect();
    }
}
