<?php

namespace Tests\Unit\Http\Controllers;

use Tests\TestCase;
use App\Models\Podcast;
use Illuminate\Http\Response;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PodcastControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function index_displays_the_video_to_guests()
    {
        $video = factory(Podcast::class)->states('published')->create();

        $response = $this->get('/podcast');

        $response->assertStatus(Response::HTTP_OK);
    }
}
