<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Page;
use App\Models\Presenters\PagePresenter;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Traits\{ Sluggable, TranslatesDates };

class PageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_fillable_fields()
    {
        $page = new Page;

        $this->assertEquals([
            'title',
            'body',
        ], $page->getFillable());
    }

    /** @test */
    public function it_translates_dates()
    {
        $page = new Page;

        $this->assertContains(TranslatesDates::class, class_uses($page));
    }

    /** @test */
    public function it_is_sluggable()
    {
        $page = new Page;

        $this->assertArrayHasKey(Sluggable::class, class_uses($page));
        $this->assertEquals('title', $page->generateSlugsFrom());
        $this->assertEquals('page', $page->saveSlugsTo());
    }

    /** @test */
    public function it_has_presenter_collaborator()
    {
        $presenter = (new Page)->present();

        $this->assertInstanceOf(PagePresenter::class, $presenter);
    }
}
