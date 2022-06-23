<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VideoTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_fillable_fields()
    {
        $video = new Video;

        $this->assertEquals([
            'title',
            'url',
            'body',
            'video_id',
            'category_id',
            'published_at',
        ], $video->getFillable());
    }

    /** @test */
    public function it_has_date_attributes()
    {
        $video = new Video;

        $this->assertArraySubset(['published_at'], $video->getDates());
    }

    /** @test */
    public function it_is_soft_deletable()
    {
        $video = new Video;

        $this->assertContains(\Illuminate\Database\Eloquent\SoftDeletes::class, class_uses($video));
        $this->assertContains('deleted_at', $video->getDates());
    }

    /** @test */
    public function it_is_sluggable()
    {
        $video = new Video;

        $this->assertArrayHasKey(\App\Models\Traits\Sluggable::class, class_uses($video));
        $this->assertEquals('title', $video->generateSlugsFrom());
        $this->assertEquals('slug', $video->saveSlugsTo());
    }

    /** @test */
    public function it_has_media_trait()
    {
        $video = new Video;

        $this->assertContains(\Spatie\MediaLibrary\HasMedia\HasMediaTrait::class, class_uses($video));
    }

    /** @test */
    public function it_has_presenter_collaborator()
    {
        $presenter = (new Video)->present();

        $this->assertInstanceOf(\App\Models\Presenters\VideoPresenter::class, $presenter);
    }

    /** @test */
    public function it_knows_if_it_is_published()
    {
        $video = factory(Video::class)->create(['published_at' => null]);
        $this->assertFalse($video->isPublished());

        $video->update(['published_at' => $video->freshTimestamp()->addDays(1)]);
        $this->assertFalse($video->isPublished());

        $video->update(['published_at' => $video->freshTimestamp()]);
        $this->assertTrue($video->isPublished());
    }

    /** @test */
    public function it_scopes_the_published_articles()
    {
        $published = factory(Video::class)->states('published')->create();
        $unpublished = factory(Video::class)->states('unpublished')->create();

        $this->assertTrue(Video::published()->get()->contains($published));
        $this->assertFalse(Video::published()->get()->contains($unpublished));
    }

    /** @test */
    public function it_belongs_to_a_category()
    {
        $video = factory(Video::class)->create();

        $relation = $video->category();

        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Relations\BelongsTo::class, $relation);
        $this->assertInstanceOf(\App\Models\Category::class, $relation->getRelated());
    }

    /** @test */
    public function it_is_excludable()
    {
        $traits = class_uses(Video::class);

        $this->assertArrayHasKey(\App\Models\Traits\Excludable::class, $traits);
    }

    /** @test */
    public function it_belongs_to_many_users()
    {
        $article = new Video;

        $relation = $article->users();

        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Relations\MorphToMany::class, $relation);
        $this->assertInstanceOf(\App\Models\User::class, $relation->getRelated());
        $this->assertEquals('userable_id', $relation->getForeignPivotKeyName());
        $this->assertEquals('userable_type', $relation->getMorphType());
    }
}
