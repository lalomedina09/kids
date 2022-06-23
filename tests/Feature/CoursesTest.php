<?php

namespace Tests\Feature;

use App\Models\Course;
use Tests\BrowserKitTest;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CoursesTest extends BrowserKitTest
{
    use RefreshDatabase;

    /** @test */
    public function can_see_proper_characters_for_course_non_featured_wysiwyg_body()
    {
        factory(Course::class)->states('published')->times(3)->create([
            'body' => 'japon&eacute;s',
        ]);

        $this->visit('/talleres')
             ->see('japonés')
             ->dontSee('japon&eacute;s');
    }
}
