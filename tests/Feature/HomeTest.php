<?php

namespace Tests\Feature;

use App\Models\Article;
use Tests\BrowserKitTest;
use Illuminate\Support\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeTest extends BrowserKitTest
{
    use RefreshDatabase;

    /** @test */
    public function can_see_proper_characters_for_article_wysiwyg_body()
    {
        $article = factory(Article::class)->states('published')->create([
            'body' => 'japon&eacute;s',
        ]);

        $this->visit('/')
             ->see('japonés')
             ->dontSee('japon&eacute;s');
    }
}
