<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Traits\Sluggable;
use App\Models\{ Article, Category };
use App\Models\Presenters\CategoryPresenter;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoryTest extends TestCase
{
    /** @test */
    public function it_has_fillable_fields()
    {
        $category = new Category;

        $this->assertEquals(['name'], $category->getFillable());
    }

    /** @test */
    public function it_has_timestamps()
    {
        $category = new Category;

        $this->assertFalse($category->usesTimestamps());
    }

    /** @test */
    public function it_is_soft_deletable()
    {
        $category = new Category;

        $this->assertContains(SoftDeletes::class, class_uses($category));
        $this->assertContains('deleted_at', $category->getDates());
    }

    /** @test */
    public function it_is_sluggable()
    {
        $category = new Category;

        $this->assertArrayHasKey(Sluggable::class, class_uses($category));
        $this->assertEquals('name', $category->generateSlugsFrom());
        $this->assertEquals('slug', $category->saveSlugsTo());
    }

    /** @test */
    public function it_has_presenter_collaborator()
    {
        $presenter = (new Category)->present();

        $this->assertInstanceOf(CategoryPresenter::class, $presenter);
    }

    /** @test */
    public function it_has_articles()
    {
        $relation = (new Category)->articles();

        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertInstanceOf(Article::class, $relation->getRelated());
    }

    /** @test */
    public function it_overrides_the_route_key()
    {
        $article = (new Category)->setAttribute('slug', 'Lorem Ipsum');

        $this->assertEquals('Lorem Ipsum', $article->getRouteKey());
    }
}
