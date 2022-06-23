<?php

namespace Tests\Unit\Http\Controllers;

use Tests\TestCase;
use App\Models\Podcast;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiPodcastControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function index_displays_the_podcasts_to_guests()
    {
        $this->withoutExceptionHandling();
        factory(Podcast::class)->states('published')->create();

        $this->getJson("api/podcast?page=1")->assertSuccessful();
    }

    /** @test */
    public function category_displays_the_podcast_to_guests()
    {
        $podcast = factory(Podcast::class)->states('published')->create();

        $this->getJson("api/podcast/".$podcast->category->slug."?page=1")->assertSuccessful();
    }
}
