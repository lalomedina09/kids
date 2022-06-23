<?php

namespace Tests\Unit\Http\Controllers;

use Tests\TestCase;
use App\Models\Video;
use Illuminate\Http\Response;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiVideosControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function index_displays_the_video_to_guests()
    {
        factory(Video::class)->states('published')->create();

        $this->getJson("api/videos?page=1")->assertSuccessful();
    }

    /** @test */
    public function category_displays_the_video_to_guests()
    {
        $video = factory(Video::class)->states('published')->create();

        $this->getJson("api/videos/".$video->category->slug."?page=1")->assertSuccessful();
    }
}
