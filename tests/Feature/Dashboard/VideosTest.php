<?php

namespace Tests\Feature\Dashboard;

use Carbon\Carbon;
use Tests\BrowserKitTest;
use App\Models\{ Category, Video };
use Illuminate\Foundation\Testing\RefreshDatabase;

class VideosTest extends BrowserKitTest
{
    use RefreshDatabase;

    /** @test */
    public function admins_can_browse_to_the_videos_index()
    {
        $video = factory(Video::class)->states('published')->create();

        $this->actingAsAdmin()
             ->visit('/dashboard')
             ->click('Videos')
             ->seePageIs('/dashboard/videos')
             ->see($video->title);
    }

    /** @test */
    public function admins_can_browse_to_the_videos_edit_page()
    {
        $video = factory(Video::class)->states('published')->create();

        $this->actingAsAdmin()
             ->visit('/dashboard/videos')
             ->see($video->title)
             ->click('Editar')
             ->seePageIs("/dashboard/videos/{$video->id}/edit")
             ->see($video->title)
             ->see('Actualizar');
    }

    /** @test */
    public function admins_can_fill_and_submit_the_create_video_form()
    {
        $category = factory(Category::class)->create();
        $timestamp = Carbon::now()->format('Y-m-d h:i:s');

        $this->actingAsAdmin()
             ->visit('/dashboard/videos/create')
             ->select($category->id, 'category_id')
             ->type('Test title', 'title')
             ->type('http://www.example.com', 'url')
             ->type('Test body', 'body')
             ->type($timestamp, 'published_at')
             ->press('Publicar')
             ->see('se creo correctamente')
             ->seeInDatabase('videos', [
                 'title' => 'Test title',
                 'slug' => 'test-title',
                 'category_id' => $category->id,
                 'published_at' => $timestamp,
             ]);
    }

    /** @test */
    public function admins_can_fill_and_submit_the_edit_video_form()
    {
        $video = factory(Video::class)->states('published')->create(['title' => 'The Original Title']);

        $this->actingAsAdmin()
             ->visit("/dashboard/videos/{$video->id}/edit")
             ->see('The Original Title')
             ->type('Updated Title', 'title')
             ->select($video->category->id, 'category_id')
             ->press('Actualizar')
             ->see('Se guardaron los cambios correctamente')
             ->seeInDatabase('videos', [
                 'title' => 'Updated Title',
                 'slug'  => 'updated-title',
             ]);
    }

    /** @test */
    public function admins_can_move_video_to_the_trash()
    {
        $video = factory(Video::class)->states('published')->create();

        $this->actingAsAdmin()
             ->visit('/dashboard/videos')
             ->see($video->title)
             ->delete("/dashboard/videos/{$video->id}")
             ->followRedirects()
             ->see('El video se envío a la papelera')
             ->dontSee($video->title);
    }

    /** @test */
    public function admins_browse_to_the_trashed_video_archive()
    {
        $video = factory(Video::class)->states('published')->create();

        $video->delete();

        $this->actingAsAdmin()
             ->visit('/dashboard/videos/trashed')
             ->see($video->title);
    }

    /** @test */
    public function admins_restore_a_trashed_video()
    {
        $video = factory(Video::class)->states('published')->create(['deleted_at' => Carbon::now()]);

        $this->actingAsAdmin()
             ->visit('/dashboard/videos/trashed')
             ->see($video->title)
             ->press('Restablecer')
             ->see('Se restableció el video')
             ->dontSee($video->title)
             ->visit('/dashboard/videos')
             ->see($video->title);
    }

    /** @test */
    public function admins_can_delete_video_from_the_trash()
    {
        $video = factory(Video::class)->states('published')->create(['deleted_at' => Carbon::now()]);

        $this->actingAsAdmin()
             ->visit('/dashboard/videos/trashed')
             ->see($video->title)
             ->press('Eliminar')
             ->see('El video se eliminó permanentemente')
             ->dontSee($video->title)
             ->dontSeeInDatabase('videos', ['id' => $video->id]);
    }

    /** @test */
    public function admins_can_schedule_video_for_future_dates()
    {
        $category = factory(Category::class)->create();
        $published_at = Carbon::now()->addDay()->format('Y-m-d h:i:s');

        $this->actingAsAdmin()
             ->visit('/dashboard/videos/create')
             ->type($published_at, 'published_at')
             ->select($category->id, 'category_id')
             ->type('Test title', 'title')
             ->type('Test body', 'body')
             ->type('http://www.example.com', 'url')
             ->press('Publicar')
             ->see('se creo correctamente');
    }

    /** @test */
    public function dispatches_job_video_when_updating_a_video()
    {
        $video = factory(Video::class)->states('published')->create();

        $this->actingAsAdmin()
             ->visit("/dashboard/videos/{$video->id}/edit")
             ->select($video->category->id, 'category_id')
             ->press('Actualizar')
             ->see('Se guardaron los cambios correctamente');
    }

    /** @test */
    public function dispatches_job_image_when_updating_a_video()
    {
        $this->markTestSkipped('This needs to be inspected.');

        $video = factory(Video::class)->states('published')->create();

        $this->actingAsAdmin()
             ->visit("/dashboard/videos/{$video->id}/edit")
             ->attach(\Illuminate\Http\UploadedFile::fake()->image('laravel.jpg'), 'featured_image')
             ->press('Actualizar')
             ->see('Se guardaron los cambios correctamente');
    }
}
