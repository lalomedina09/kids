<?php

namespace Tests\Feature;

use App\Models\Video;
use Tests\BrowserKitTest;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VideosTest extends BrowserKitTest
{
    use RefreshDatabase;

    /** @test */
    public function guests_can_browse_to_the_video_index()
    {
        $videos = factory(Video::class)->states('published')->create();

        $this->visit('/videos')
             ->assertResponseOk();

        $videos->each(function ($videos) {
            $this->seeText($videos->present()->title);
        });
    }

    /** @test */
    public function guests_can_not_see_unpublished_video_on_index()
    {
        $videos = factory(Video::class)->states('unpublished')->create();

        $this->visit('/videos')
             ->assertResponseOk();

        $videos->each(function ($videos) {
            $this->dontSeeText($videos->present()->title);
        });
    }

    /** @test */
    public function guests_can_browse_to_video_category_archive()
    {
        $video = factory(Video::class)->states('published')->create();

        $this->visit("/videos/{$video->category->slug}")
             ->see($video->category->name)
             ->see($video->title);
    }

    /** @test */
    public function guests_can_browse_to_video_archive()
    {
        $video = factory(Video::class)->states('published')->create();

        $this->visit("/videos/{$video->category->slug}/{$video->slug}")
             ->see($video->title);
    }
}
