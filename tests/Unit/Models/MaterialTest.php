<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\{ Course, Material };
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MaterialTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_fillable_fields()
    {
        $material = new Material;

        $this->assertEquals([
            'name',
            'type',
            'course_id',
        ], $material->getFillable());
    }

    /** @test */
    public function it_has_presenter_collaborator()
    {
        $presenter = (new Material)->present();

        $this->assertInstanceOf(\App\Models\Presenters\MaterialPresenter::class, $presenter);
    }

    /** @test */
    public function it_belongs_to_course()
    {
        $material = factory(Material::class)->create();

        $relation = $material->course();

        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertInstanceOf(Course::class, $relation->getRelated());
    }
}
