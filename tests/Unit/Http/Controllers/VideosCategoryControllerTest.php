<?php

namespace Tests\Unit\Http\Controllers;

use Tests\TestCase;
use Illuminate\Http\Response;
use App\Models\{ Podcast, Video };
use Illuminate\Foundation\Testing\RefreshDatabase;

class VideosCategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function index_displays_the_video_to_guests()
    {
        $video = factory(Video::class)->states('published')->create();

        $response = $this->get("/videos/{$video->category->slug}");

        $response->assertStatus(Response::HTTP_OK);
    }

    /** @test */
    public function index_displays_the_podcast_to_guests()
    {
        $video = factory(Podcast::class)->states('published')->create();

        $response = $this->get("/podcast/{$video->category->slug}");

        $response->assertStatus(Response::HTTP_OK);
    }
}
