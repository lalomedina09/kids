<?php

namespace Tests\Unit\Http\Controllers\Dashboard;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DashboardControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function index_shows_the_dashboard_page()
    {
        $response = $this->actingAsAdmin()->get('/dashboard');

        $response->assertSuccessful();
    }
}
