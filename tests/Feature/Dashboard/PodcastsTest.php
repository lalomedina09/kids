<?php

namespace Tests\Feature\Dashboard;

use Carbon\Carbon;
use Tests\BrowserKitTest;
use App\Models\{ Category, Podcast };
use Illuminate\Foundation\Testing\RefreshDatabase;

class PodcastsTest extends BrowserKitTest
{
    use RefreshDatabase;

    /** @test */
    public function admins_can_browse_to_the_podcasts_index()
    {
        $podcast = factory(Podcast::class)->states('published')->create();

        $this->actingAsAdmin()
             ->visit('/dashboard')
             ->click('Podcasts')
             ->seePageIs('/dashboard/podcasts')
             ->see($podcast->title);
    }

    /** @test */
    public function admins_can_browse_to_the_podcasts_edit_page()
    {
        $podcast = factory(Podcast::class)->states('published')->create();

        $this->actingAsAdmin()
             ->visit('/dashboard/podcasts')
             ->see($podcast->title)
             ->click('Editar')
             ->seePageIs("/dashboard/podcasts/{$podcast->id}/edit")
             ->see($podcast->title)
             ->see('Actualizar');
    }

    /** @test */
    public function admins_can_fill_and_submit_the_create_podcast_form()
    {
        $category = factory(Category::class)->create();
        $timestamp = Carbon::now()->format('Y-m-d h:i:s');

        $this->actingAsAdmin()
             ->visit('/dashboard/podcasts/create')
             ->select($category->id, 'category_id')
             ->type('Test title', 'title')
             ->type('Test body', 'body')
             ->type($timestamp, 'published_at')
             ->press('Publicar')
             ->see('se creo correctamente')
             ->seeInDatabase('podcasts', [
                 'title' => 'Test title',
                 'slug' => 'test-title',
                 'category_id' => $category->id,
                 'published_at' => $timestamp,
             ]);
    }

    /** @test */
    public function admins_can_fill_and_submit_the_edit_podcast_form()
    {
        $podcast = factory(Podcast::class)->states('published')->create(['title' => 'The Original Title']);

        $this->actingAsAdmin()
             ->visit("/dashboard/podcasts/{$podcast->id}/edit")
             ->see('The Original Title')
             ->type('Updated Title', 'title')
             ->select($podcast->id, 'category_id')
             ->press('Actualizar')
             ->see('Se guardaron los cambios correctamente')
             ->seeInDatabase('podcasts', [
                 'title' => 'Updated Title',
                 'slug'  => 'updated-title',
             ]);
    }

    /** @test */
    public function admins_can_move_podcast_to_the_trash()
    {
        $podcast = factory(Podcast::class)->states('published')->create();

        $this->actingAsAdmin()
             ->visit('/dashboard/podcasts')
             ->see($podcast->title)
             ->delete("/dashboard/podcasts/{$podcast->id}")
             ->followRedirects()
             ->see('El podcast se envío a la papelera')
             ->dontSee($podcast->title);
    }

    /** @test */
    public function admins_browse_to_the_trashed_podcast_archive()
    {
        $podcast = factory(Podcast::class)->states('published')->create();

        $podcast->delete();

        $this->actingAsAdmin()
             ->visit('/dashboard/podcasts/trashed')
             ->see($podcast->title);
    }

    /** @test */
    public function admins_restore_a_trashed_podcast()
    {
        $podcast = factory(Podcast::class)->states('published')->create(['deleted_at' => Carbon::now()]);

        $this->actingAsAdmin()
             ->visit('/dashboard/podcasts/trashed')
             ->see($podcast->title)
             ->press('Restablecer')
             ->see('Se restableció el podcast')
             ->dontSee($podcast->title)
             ->visit('/dashboard/podcasts')
             ->see($podcast->title);
    }

    /** @test */
    public function admins_can_delete_podcast_from_the_trash()
    {
        $podcast = factory(Podcast::class)->states('published')->create(['deleted_at' => Carbon::now()]);

        $this->actingAsAdmin()
             ->visit('/dashboard/podcasts/trashed')
             ->see($podcast->title)
             ->press('Eliminar')
             ->see('El podcast se eliminó permanentemente')
             ->dontSee($podcast->title)
             ->dontSeeInDatabase('podcasts', ['id' => $podcast->id]);
    }

    /** @test */
    public function admins_can_schedule_podcast_for_future_dates()
    {
        $category = factory(Category::class)->create();
        $published_at = Carbon::now()->addDay()->format('Y-m-d h:i:s');

        $this->actingAsAdmin()
             ->visit('/dashboard/podcasts/create')
             ->type($published_at, 'published_at')
             ->select($category->id, 'category_id')
             ->type('Test title', 'title')
             ->type('Test body', 'body')
             ->press('Publicar')
             ->see('se creo correctamente');
    }

    /** @test */
    public function dispatches_job_image_when_updating_a_podcast()
    {
        $this->markTestSkipped('This needs to be inspected.');

        $podcast = factory(Podcast::class)->states('published')->create();

        $this->actingAsAdmin()
             ->visit("/dashboard/podcasts/{$podcast->id}/edit")
             ->attach(\Illuminate\Http\UploadedFile::fake()->image('laravel.jpg'), 'featured_image')
             ->press('Actualizar')
             ->see('Se guardaron los cambios correctamente');
    }

    /** @test */
    public function dispatches_job_audio_when_updating_a_podcast()
    {
        $this->markTestSkipped('This needs to be inspected.');

        $podcast = factory(Podcast::class)->states('published')->create();

        $this->actingAsAdmin()
             ->visit("/dashboard/podcasts/{$podcast->id}/edit")
             ->attach(\Illuminate\Http\UploadedFile::fake()->create('laravel.mp3', 10)->extencion='mp3', 'audio_file')
             ->press('Actualizar')
             ->see('Se guardaron los cambios correctamente');
    }
}
