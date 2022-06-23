<?php

namespace Tests\Unit\Http\Controllers;

use Tests\TestCase;
use App\Models\Video;
use Illuminate\Http\Response;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VideosControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function index_displays_the_video_to_guests()
    {
        $video = factory(video::class)->states('published')->create();

        $response = $this->get('/videos');

        $response->assertStatus(Response::HTTP_OK);
    }
}
