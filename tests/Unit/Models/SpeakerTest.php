<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\{ Course, Speaker };
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class SpeakerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_fillable_fields()
    {
        $speaker = new Speaker;

        $this->assertEquals([
            'name',
            'profession',
            'employ',
            'bio',
        ], $speaker->getFillable());
    }

    /** @test */
    public function it_has_date_attributes()
    {
        $speaker = new Speaker;

        $this->assertArraySubset(['deleted_at'], $speaker->getDates());
    }

    /** @test */
    public function it_translates_dates()
    {
        $speaker = new Speaker;

        $this->assertContains(\App\Models\Traits\TranslatesDates::class, class_uses($speaker));
    }

    /** @test */
    public function it_has_media_trait()
    {
        $speaker = new Speaker;

        $this->assertContains(\Spatie\MediaLibrary\HasMedia\HasMediaTrait::class, class_uses($speaker));
    }

    /** @test */
    public function it_is_soft_deletable()
    {
        $speaker = new Speaker;

        $this->assertContains(\Illuminate\Database\Eloquent\SoftDeletes::class, class_uses($speaker));
        $this->assertContains('deleted_at', $speaker->getDates());
    }

    /** @test */
    public function it_is_sluggable()
    {
        $speaker = new Speaker;

        $this->assertArrayHasKey(\App\Models\Traits\Sluggable::class, class_uses($speaker));
        $this->assertEquals('name', $speaker->generateSlugsFrom());
        $this->assertEquals('slug', $speaker->saveSlugsTo());
    }

    /** @test */
    public function it_has_presenter_collaborator()
    {
        $presenter = (new Speaker)->present();

        $this->assertInstanceOf(\App\Models\Presenters\SpeakerPresenter::class, $presenter);
    }

    /** @test */
    public function it_belongs_to_many_courses()
    {
        $speaker = factory(Speaker::class)->create();

        $relation = $speaker->courses();

        $this->assertInstanceOf(BelongsToMany::class, $relation);
        $this->assertInstanceOf(Course::class, $relation->getRelated());
    }
}
