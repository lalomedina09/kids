<?php

namespace Tests\Feature;

use App\Models\Podcast;
use Tests\BrowserKitTest;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PodcastsTest extends BrowserKitTest
{
    use RefreshDatabase;

    /** @test */
    public function guests_can_browse_to_the_podcast_index()
    {
        $podcast = factory(Podcast::class)->states('published')->create();

        $this->visit('/podcast')
             ->assertResponseOk();

        $podcast->each(function ($podcast) {
            $this->seeText($podcast->present()->title);
        });
    }

    /** @test */
    public function guests_can_not_see_unpublished_podcast_on_index()
    {
        $podcast = factory(Podcast::class)->states('unpublished')->create();

        $this->visit('/podcast')
             ->assertResponseOk();

        $podcast->each(function ($podcast) {
            $this->dontSeeText($podcast->present()->title);
        });
    }

    /** @test */
    public function guests_can_browse_to_podcast_category_archive()
    {
        $podcast = factory(Podcast::class)->states('published')->create();

        $this->visit("/podcast/{$podcast->category->slug}")
             ->see($podcast->category->name)
             ->see($podcast->title);
    }

    /** @test */
    public function guests_can_browse_to_podcast_archive()
    {
        $podcast = factory(Podcast::class)->states('published')->create();

        $this->visit("/podcast/{$podcast->category->slug}/{$podcast->slug}")
             ->see($podcast->title);
    }
}
