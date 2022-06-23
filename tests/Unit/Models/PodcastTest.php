<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Podcast;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PodcastTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_fillable_fields()
    {
        $podcast = new Podcast;

        $this->assertEquals([
            'title',
            'path',
            'body',
            'url',
            'video_id',
            'published_at',
        ], $podcast->getFillable());
    }

    /** @test */
    public function it_has_date_attributes()
    {
        $podcast = new Podcast;

        $this->assertArraySubset(['published_at'], $podcast->getDates());
    }

    /** @test */
    public function it_is_soft_deletable()
    {
        $podcast = new Podcast;

        $this->assertContains(\Illuminate\Database\Eloquent\SoftDeletes::class, class_uses($podcast));
        $this->assertContains('deleted_at', $podcast->getDates());
    }

    /** @test */
    public function it_is_sluggable()
    {
        $podcast = new Podcast;

        $this->assertArrayHasKey(\App\Models\Traits\Sluggable::class, class_uses($podcast));
        $this->assertEquals('title', $podcast->generateSlugsFrom());
        $this->assertEquals('slug', $podcast->saveSlugsTo());
    }

    /** @test */
    public function it_has_media_trait()
    {
        $podcast = new Podcast;

        $this->assertContains(\Spatie\MediaLibrary\HasMedia\HasMediaTrait::class, class_uses($podcast));
    }

    /** @test */
    public function it_has_presenter_collaborator()
    {
        $presenter = (new Podcast)->present();

        $this->assertInstanceOf(\App\Models\Presenters\PodcastPresenter::class, $presenter);
    }

    /** @test */
    public function it_knows_if_it_is_published()
    {
        $podcast = factory(Podcast::class)->create(['published_at' => null]);
        $this->assertFalse($podcast->isPublished());

        $podcast->update(['published_at' => $podcast->freshTimestamp()->addDays(1)]);
        $this->assertFalse($podcast->isPublished());

        $podcast->update(['published_at' => $podcast->freshTimestamp()]);
        $this->assertTrue($podcast->isPublished());
    }

    /** @test */
    public function it_scopes_the_published_podcasts()
    {
        $published = factory(Podcast::class)->states('published')->create();
        $unpublished = factory(Podcast::class)->states('unpublished')->create();

        $this->assertTrue(Podcast::published()->get()->contains($published));
        $this->assertFalse(Podcast::published()->get()->contains($unpublished));
    }

    /** @test */
    public function it_belongs_to_a_category()
    {
        $podcast = factory(Podcast::class)->create();

        $relation = $podcast->category();

        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Relations\BelongsTo::class, $relation);
        $this->assertInstanceOf(\App\Models\Category::class, $relation->getRelated());
    }

    /** @test */
    public function it_is_excludable()
    {
        $traits = class_uses(Podcast::class);

        $this->assertArrayHasKey(\App\Models\Traits\Excludable::class, $traits);
    }

    /** @test */
    public function it_belongs_to_many_users()
    {
        $article = new Podcast;

        $relation = $article->users();

        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Relations\MorphToMany::class, $relation);
        $this->assertInstanceOf(\App\Models\User::class, $relation->getRelated());
        $this->assertEquals('userable_id', $relation->getForeignPivotKeyName());
        $this->assertEquals('userable_type', $relation->getMorphType());
    }
}
