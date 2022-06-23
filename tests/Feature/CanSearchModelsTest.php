<?php

namespace Tests\Feature;

use Tests\BrowserKitTest;
use Illuminate\Support\Carbon;
use App\Models\{Article, Podcast, Video};
use Illuminate\Foundation\Testing\RefreshDatabase;

class SearchesTest extends BrowserKitTest
{
    use RefreshDatabase;

    /** @test */
    public function guests_can_search_various_models()
    {
        $article = factory(Article::class)->create(['title' => 'damng long title']);

        $this->visit('/busqueda?s=damn')
             ->dontSee($article->title);

        Article::truncate();

        $video = factory(Video::class)->states('published')->create(['title' => 'damng long title']);

        $this->visit('/busqueda?s=damn')
             ->see($video->title);

        Video::truncate();

        $podcast = factory(Podcast::class)->states('published')->create(['title' => 'damng long title']);

        $this->visit('/busqueda?s=damn')
             ->see($podcast->title);
    }

    /** @test */
    public function search_info_gets_stored()
    {
        Carbon::setTestNow(Carbon::now());

        $article = factory(Article::class)->create(['title' => 'search test title']);

        $this->visit('/busqueda?s=je+suis+perdu');

        $this->seeInDatabase('searches', [
            'title' => 'je suis perdu',
            'ip' => '127.0.0.1',
            'created_at' => Carbon::getTestNow()
         ]);
    }
}
