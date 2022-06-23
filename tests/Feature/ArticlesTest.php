<?php

namespace Tests\Feature;

use App\Models\Article;
use Tests\BrowserKitTest;
use Illuminate\Support\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArticlesTest extends BrowserKitTest
{
    use RefreshDatabase;

    /** @test */
    public function can_only_see_published_articles()
    {
        $article = factory(Article::class)->create(['published_at' => null]);

        $this->visit('/articulos')
             ->dontSee($article->present()->title);
    }

    /** @test */
    public function guests_can_browse_to_the_articles_index()
    {
        $articles = factory(Article::class)->states('published')->create();

        $this->visit('/articulos')
             ->seeText('Artículos')
             ->assertResponseOk();

        $articles->each(function ($article) {
            $this->seeText($article->present()->title);
        });
    }

    /** @test */
    public function guests_can_browse_to_the_articles_show()
    {
        $article = factory(Article::class)->states('published')->create();

        $this->visit("/articulos/{$article->slug}")
             ->assertResponseOk()
             ->see($article->present()->title);
    }

    /** @test */
    public function can_see_proper_characters_for_article_wysiwyg_body()
    {
        $article = factory(Article::class)->states('published')->create([
            'body' => 'japon&eacute;s',
        ]);

        $this->visit('/articulos')
             ->see('japonés')
             ->dontSee('japon&eacute;s');
    }

    /** @test */
    public function cannot_see_published_at_time()
    {
        $article = factory(Article::class)->create(['published_at' => Carbon::now()->startOfDay()->addMinute()]);

        $this->visit('/articulos')
             ->dontSee('12:01 am');
    }
}
