<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\{ Cover, Category };
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CoverTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function cover_has_fillable_fields()
    {
        $cover = new Cover;

        $this->assertEquals([
            'title',
            'url',
            'color',
            'category_id',
            'position'
        ], $cover->getFillable());
    }

    /** @test */
    public function cover_has_column_fields()
    {
        $cover = factory(Cover::class)->create([
            'title' => 'test_title',
            'url' => 'http://example.com',
            'color' => '--secondary',
            'position' => 1
        ]);

        $this->assertEquals('--secondary', $cover->color);
        $this->assertEquals('test_title', $cover->title);
        $this->assertEquals('http://example.com', $cover->url);
        $this->assertEquals(1, $cover->position);
    }

    /** @test */
    public function it_has_media_trait()
    {
        $cover = new Cover;

        $this->assertContains(\Spatie\MediaLibrary\HasMedia\HasMediaTrait::class, class_uses($cover));
    }

    /** @test */
    public function it_is_soft_deletable()
    {
        $cover = new Cover;

        $this->assertContains(\Illuminate\Database\Eloquent\SoftDeletes::class, class_uses($cover));
        $this->assertContains('deleted_at', $cover->getDates());
    }

    /** @test */
    public function it_has_presenter_collaborator()
    {
        $presenter = (new Cover)->present();

        $this->assertInstanceOf(\App\Models\Presenters\CoverPresenter::class, $presenter);
    }

    /** @test */
    public function it_has_shown_and_hidden_scope()
    {
        $cover = factory(Cover::class)->states('shown')->create();
        $hidden = factory(Cover::class)->create();

        $this->assertCount(1, Cover::shown()->get());
        $this->assertEquals($cover->fresh(), Cover::shown()->first());

        $this->assertCount(1, Cover::hidden()->get());
        $this->assertEquals($hidden->fresh(), Cover::hidden()->first());
    }

    /** @test */
    public function it_has_a_category()
    {
        $cover = factory(Cover::class)->create();

        $relation = $cover->category();

        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertInstanceOf(Category::class, $relation->getRelated());
    }
}
