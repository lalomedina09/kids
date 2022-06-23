<?php

namespace Tests\Feature\Dashboard;

use App\Models\Category;
use Tests\BrowserKitTest;
use Illuminate\Support\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoriesTest extends BrowserKitTest
{
    use RefreshDatabase;

    /** @test */
    public function admins_can_browse_to_the_categories_index()
    {
        $category = factory(Category::class)->create();

        $this->actingAsAdmin()
             ->visit('/dashboard')
             ->click('Categorías')
             ->seePageIs('/dashboard/categories')
             ->see($category->title);
    }

    /** @test */
    public function admins_can_browse_to_the_categories_edit_page()
    {
        $category = factory(Category::class)->create();

        $this->actingAsAdmin()
             ->visit('/dashboard/categories')
             ->see($category->name)
             ->click($category->name)
             ->seePageIs("/dashboard/categories/{$category->id}/edit")
             ->see($category->name)
             ->see('Actualizar');
    }

    /** @test */
    public function admins_can_fill_and_submit_the_create_category_form()
    {
        $this->withoutExceptionHandling();
        $this->actingAsAdmin()
             ->visit('/dashboard/categories/create')
             ->type('Test name', 'name')
             ->press('Crear')
             ->see('se creo correctamente')
             ->seeInDatabase('categories', [
                 'name' => 'Test name'
             ]);
    }

    /** @test */
    public function admins_can_fill_and_submit_the_edit_category_form()
    {
        $category = factory(Category::class)->create(['name' => 'The Original Name']);

        $this->actingAsAdmin()
             ->visit("/dashboard/categories/{$category->id}/edit")
             ->see('The Original Name')
             ->type('Updated Name', 'name')
             ->press('Actualizar')
             ->see('Se guardaron los cambios correctamente')
             ->seeInDatabase('categories', [
                 'name' => 'Updated Name',
                 'slug'  => 'updated-name',
             ]);
    }

    /** @test */
    public function admins_can_move_category_to_the_trash()
    {
        $category = factory(Category::class)->create(['name' => 'Test name']);

        $this->actingAsAdmin()
             ->visit('/dashboard/categories')
             ->see($category->name)
             ->press('Remover')
             ->see('La categoría se envío a la papelera')
             ->dontSee($category->name);
    }

    /** @test */
    public function admins_browse_to_the_trashed_category_archive()
    {
        $category = factory(Category::class)->create();

        $category->delete();

        $this->actingAsAdmin()
             ->visit('/dashboard/categories/trashed')
             ->see($category->name);
    }

    /** @test */
    public function admins_restore_a_trashed_category()
    {
        $category = factory(Category::class)->create(['name' => 'long name', 'deleted_at' => Carbon::now()]);

        $this->actingAsAdmin()
             ->visit('/dashboard/categories/trashed')
             ->see($category->name)
             ->press('Restablecer')
             ->see('Se restableció la categoría')
             ->dontSee($category->name)
             ->visit('/dashboard/categories')
             ->see($category->name);
    }
}
