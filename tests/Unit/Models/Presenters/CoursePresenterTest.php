<?php

namespace Tests\Unit\Models\Presenters;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\{ Course, Category };

class CoursePresenterTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_presents_the_event_date()
    {
        $course = (new Course)->setAttribute('start_event', '2017-01-01 00:00:00');

        $this->assertEquals('Enero 1, 2017', $course->present()->event_date);
    }

    /** @test */
    public function it_presents_readable_event_date()
    {
        $course = (new Course)->setAttribute('start_event', '2017-01-01 00:00:00');

        $this->assertEquals('Domingo, 1 de enero, 2017', $course->present()->readable_event_date);
    }

    /** @test */
    public function it_presents_the_end_datetime()
    {
        $course = (new Course)->setAttribute('end_event', '2017-01-01 00:00:00');

        $this->assertEquals('Domingo, 1 de enero, 2017', $course->present()->end_date);
    }

    /** @test */
    public function it_presents_the_published_at()
    {
        $course = (new Course)->setAttribute('published_at', '2017-01-01 00:00:00');

        $this->assertEquals('Domingo, 1 de enero, 2017', $course->present()->published_at);
    }

    /** @test */
    public function it_presents_the_category()
    {
        $category = factory(Category::class)->create(['name' => 'Ahorro']);
        $course = factory(Course::class)->create(['category_id' => $category->id]);

        $this->assertEquals($category->name, $course->present()->category);
    }

    /** @test */
    public function it_presents_the_article_url()
    {
        $course = factory(Course::class)->create();

        $this->assertEquals(
            $course->present()->url,
            route('courses.show', [
                'category' => $course->category,
                'slug' => $course->slug
            ])
        );
    }
}
