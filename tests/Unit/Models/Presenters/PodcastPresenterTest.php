<?php

namespace Tests\Unit\Models\Presenters;

use Tests\TestCase;
use App\Models\{ Category, Podcast };
use Illuminate\Foundation\Testing\RefreshDatabase;

class PodcastPresenterTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_presents_the_category()
    {
        $category = factory(Category::class)->create(['name' => 'Ahorro']);
        $podcast = factory(Podcast::class)->create(['category_id' => $category->id]);

        $this->assertEquals($category->name, $podcast->present()->category);
    }

    /** @test */
    public function it_presents_the_published_at()
    {
        $podcast = (new Podcast)->setAttribute('published_at', '2017-01-01 00:00:00');

        $this->assertEquals('Domingo, 1 de enero, 2017', $podcast->present()->published_at);
    }

    /** @test */
    public function it_presents_the_deleted_at()
    {
        $podcast = (new Podcast)->setAttribute('deleted_at', '2017-01-01 00:00:00');

        $this->assertEquals('Domingo, 1 de enero, 2017', $podcast->present()->deleted_at);
    }

    /** @test */
    public function it_presents_the_video_audio_path()
    {
        $podcast = (new Podcast)->setAttribute('path', '/podcasts/audio.mp3');
        $audioHtml = '<audio class="w-100" controls preload="none"><source src="/podcasts/audio.mp3">Your browser does not support the audio element.</audio>';

        $this->assertEquals($audioHtml, $podcast->present()->audio);
    }
}
