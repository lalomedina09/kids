<?php

namespace Tests\Feature\Dashboard;

use Tests\BrowserKitTest;
use Illuminate\Support\Carbon;
use App\Models\{ Category, Cover };
use Illuminate\Foundation\Testing\RefreshDatabase;

class CoversTest extends BrowserKitTest
{
    use RefreshDatabase;

    /** @test */
    public function admins_can_browse_to_the_covers_index()
    {
        $cover = factory(Cover::class)->create();

        $this->actingAsAdmin()
             ->visit('/dashboard')
             ->click('Cubierta Home')
             ->seePageIs('/dashboard/covers')
             ->see($cover->title);
    }

    /** @test */
    public function can_see_if_cover_is_hidden_or_displayed()
    {
        $noPositionCover = factory(Cover::class)->create(['title' => 'OMG IMA TITLE']);
        $shownCover = factory(Cover::class)->states('shown')->create();

        $this->actingAsAdmin()
             ->visit('/dashboard/covers')
             ->see('Mostradas: ')
             ->see('No mostradas: ')
             ->see($noPositionCover->title)
             ->see($shownCover->title);
    }


    /** @test */
    public function admins_can_browse_to_the_covers_edit_page()
    {
        $cover = factory(Cover::class)->create();

        $response = $this->actingAsAdmin()
             ->visit('/dashboard/covers')
             ->click($cover->title)
             ->seePageIs("/dashboard/covers/{$cover->id}/edit")
             ->see($cover->title)
             ->see('Actualizar');
    }

    /** @test */
    public function admins_can_fill_and_submit_the_create_cover_form()
    {
        $category = factory(Category::class)->create();

        $this->actingAsAdmin()
             ->visit('/dashboard/covers/create')
             ->see('Ninguna')
             ->type('Test title', 'title')
             ->select($category->id, 'category_id')
             ->select(0, 'position')
             ->press('Crear')
             ->see('se creo correctamente')
             ->seeInDatabase('covers', [
                'title' => 'Test title',
                'position' => 0
             ]);
    }

    /** @test */
    public function admins_can_fill_and_submit_the_edit_cover_form()
    {
        $positionOne = factory(Cover::class)->create(['title' => 'position one', 'position' => 1]);
        $cover = factory(Cover::class)->create(['title' => 'The Original title', 'position' => null]);

        $this->actingAsAdmin()
             ->visit("/dashboard/covers/{$cover->id}/edit")
             ->see('The Original title')
             ->type('Updated title', 'title')
             ->select(1, 'position')
             ->press('Actualizar')
             ->see('Se guardaron los cambios correctamente')
             ->seeInDatabase('covers', [
                 'title' => 'Updated title',
                 'position'  => 1
             ])
             ->seeInDatabase('covers', [
                'title' => 'position one',
                'position' => null
             ]);
    }

    /** @test */
    public function admins_can_fill_and_submit_the_edit_cover_form_setting_position_to_null()
    {
        $cover = factory(Cover::class)->create(['position' => 1]);

        $this->actingAsAdmin()
             ->visit("/dashboard/covers/{$cover->id}/edit")
             ->see($cover->title)
             ->select(0, 'position')
             ->press('Actualizar')
             ->see('Se guardaron los cambios correctamente')
             ->seeInDatabase('covers', [
                 'title' => $cover->title,
                 'position'  => 0
             ]);
    }

    /** @test */
    public function admins_can_move_cover_to_the_trash()
    {
        $cover = factory(Cover::class)->create(['title' => 'Some elaborate title']); //otherwise factory makes titles like "ea"s

        $this->actingAsAdmin()
             ->visit('/dashboard/covers')
             ->see($cover->title)
             ->press('Remover')
             ->see('La cubierta se envío a la papelera')
             ->dontSee($cover->title);
    }

    /** @test */
    public function admins_can_browse_the_trashed_cover_archive()
    {
        $cover = factory(Cover::class)->create();

        $cover->delete();

        $this->actingAsAdmin()
             ->visit('/dashboard/covers/trashed')
             ->see($cover->title);
    }

    /** @test */
    public function admins_can_restore_a_trashed_cover()
    {
        $cover = factory(Cover::class)->create(['title' => 'Some elaborate title', 'deleted_at' => Carbon::now()]);

        $this->actingAsAdmin()
             ->visit('/dashboard/covers/trashed')
             ->see($cover->title)
             ->press('Restablecer')
             ->see('Se restableció la cubierta')
             ->dontSee($cover->title)
             ->visit('/dashboard/covers')
             ->see($cover->title);
    }

    /** @test */
    public function admins_can_delete_cover_from_trash()
    {
        $cover = factory(Cover::class)->create(['title' => 'Some elaborate title']);
        $cover->delete();

        $this->actingAsAdmin()
             ->visit('/dashboard/covers/trashed')
             ->see($cover->title)
             ->press('Eliminar')
             ->see('La cubierta se eliminó permanentemente')
             ->dontSee($cover->title)
             ->dontSeeInDatabase('covers', ['id' => $cover->id]);
    }
}
