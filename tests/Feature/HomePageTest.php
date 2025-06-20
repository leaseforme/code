<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    /** @test */
    public function homepage_loads_successfully()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
