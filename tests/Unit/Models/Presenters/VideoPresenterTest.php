<?php

namespace Tests\Unit\Models\Presenters;

use Tests\TestCase;
use App\Models\{ Category, Video };
use Illuminate\Foundation\Testing\RefreshDatabase;

class VideoPresenterTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_presents_the_category()
    {
        $category = factory(Category::class)->create(['name' => 'Ahorro']);
        $video = factory(Video::class)->create(['category_id' => $category->id]);

        $this->assertEquals($category->name, $video->present()->category);
    }

    /** @test */
    public function it_presents_the_published_at()
    {
        $video = (new Video)->setAttribute('published_at', '2017-01-01 00:00:00');

        $this->assertEquals('Domingo, 1 de enero, 2017', $video->present()->published_at);
    }

    /** @test */
    public function it_presents_the_deleted_at()
    {
        $video = (new Video)->setAttribute('deleted_at', '2017-01-01 00:00:00');

        $this->assertEquals('Domingo, 1 de enero, 2017', $video->present()->deleted_at);
    }

    /** @test */
    public function it_presents_the_video_iframe()
    {
        $video = (new Video)->setAttribute('video_id', 'video-id');
        $iframeHtml = '<div class="youtube" data-embed="video-id"><div class="play-button"></div></div>';

        $this->assertEquals($iframeHtml, $video->present()->iframe);
    }
}
