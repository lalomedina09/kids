<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\{ Course, Itinerary };
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItineraryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_fillable_fields()
    {
        $itinerary = new Itinerary;

        $this->assertEquals([
            'name',
            'course_id',
            'start',
            'end',
        ], $itinerary->getFillable());
    }

    /** @test */
    public function it_has_date_attributes()
    {
        $itinerary = new Itinerary;

        $this->assertArraySubset(['start', 'end'], $itinerary->getDates());
    }

    /** @test */
    public function it_translates_dates()
    {
        $itinerary = new Itinerary;

        $this->assertContains(\App\Models\Traits\TranslatesDates::class, class_uses($itinerary));
    }

    /** @test */
    public function it_has_presenter_collaborator()
    {
        $presenter = (new Itinerary)->present();

        $this->assertInstanceOf(\App\Models\Presenters\ItineraryPresenter::class, $presenter);
    }

    /** @test */
    public function it_belongs_to_course()
    {
        $itinerary = factory(Itinerary::class)->create();

        $relation = $itinerary->course();

        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertInstanceOf(Course::class, $relation->getRelated());
    }
}
