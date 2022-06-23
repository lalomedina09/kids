<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\{ Course, Contact, Speaker, Category, Material, Itinerary };
use Illuminate\Database\Eloquent\Relations\{  HasMany, BelongsTo, BelongsToMany, MorphMany };

class CourseTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_fillable_fields()
    {
        $course = new Course;

        $this->assertEquals([
            'title',
            'subtitle',
            'body',
            'excerpt',
            'category_id',
            'city',
            'venue',
            'address',
            'enrolment_url',
            'start_event',
            'end_event',
            'published_at',
        ], $course->getFillable());
    }

    /** @test */
    public function it_has_date_attributes()
    {
        $course = new Course;

        $this->assertArraySubset(['published_at', 'start_event', 'end_event', 'deleted_at'], $course->getDates());
    }

    /** @test */
    public function it_overrides_the_route_key()
    {
        $course = (new Course)->setAttribute('slug', 'Lorem Ipsum');

        $this->assertEquals('Lorem Ipsum', $course->getRouteKey());
    }

    /** @test */
    public function it_translates_dates()
    {
        $course = new Course;

        $this->assertContains(\App\Models\Traits\TranslatesDates::class, class_uses($course));
    }

    /** @test */
    public function it_has_media_trait()
    {
        $course = new Course;

        $this->assertContains(\Spatie\MediaLibrary\HasMedia\HasMediaTrait::class, class_uses($course));
    }

    /** @test */
    public function it_is_soft_deletable()
    {
        $course = new Course;

        $this->assertContains(\Illuminate\Database\Eloquent\SoftDeletes::class, class_uses($course));
        $this->assertContains('deleted_at', $course->getDates());
    }

    /** @test */
    public function it_is_sluggable()
    {
        $course = new Course;

        $this->assertArrayHasKey(\App\Models\Traits\Sluggable::class, class_uses($course));
        $this->assertEquals('title', $course->generateSlugsFrom());
        $this->assertEquals('slug', $course->saveSlugsTo());
    }

    /** @test */
    public function it_has_presenter_collaborator()
    {
        $presenter = (new Course)->present();

        $this->assertInstanceOf(\App\Models\Presenters\CoursePresenter::class, $presenter);
    }

    /** @test */
    public function it_knows_if_it_is_published()
    {
        $course = factory(Course::class)->create(['published_at' => null]);
        $this->assertFalse($course->isPublished());

        $course->update(['published_at' => $course->freshTimestamp()->addDays(1)]);
        $this->assertFalse($course->isPublished());

        $course->update(['published_at' => $course->freshTimestamp()]);
        $this->assertTrue($course->isPublished());
    }

    /** @test */
    public function it_scopes_the_published_courses()
    {
        $published = factory(Course::class)->states('published')->create();
        $unpublished = factory(Course::class)->states('unpublished')->create();

        $this->assertTrue(Course::published()->get()->contains($published));
        $this->assertFalse(Course::published()->get()->contains($unpublished));
    }

    /** @test */
    public function it_belongs_to_a_category()
    {
        $course = factory(Course::class)->create();

        $relation = $course->category();

        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertInstanceOf(Category::class, $relation->getRelated());
    }

    /** @test */
    public function it_belongs_to_many_speakers()
    {
        $course = factory(Course::class)->create();

        $relation = $course->speakers();

        $this->assertInstanceOf(BelongsToMany::class, $relation);
        $this->assertInstanceOf(Speaker::class, $relation->getRelated());
    }

    /** @test */
    public function it_belongs_to_many_itineraries()
    {
        $course = new Course;

        $relation = $course->itineraries();

        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertInstanceOf(Itinerary::class, $relation->getRelated());
    }

    /** @test */
    public function it_belongs_to_many_materials()
    {
        $course = new Course;

        $relation = $course->materials();

        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertInstanceOf(Material::class, $relation->getRelated());
    }

    /** @test */
    public function it_belongs_to_many_contacts()
    {
        $course = new Course;

        $relation = $course->contacts();

        $this->assertInstanceOf(MorphMany::class, $relation);
        $this->assertInstanceOf(Contact::class, $relation->getRelated());
    }
}
