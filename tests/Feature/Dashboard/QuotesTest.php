<?php

namespace Tests\Feature\Dashboard;

use Carbon\Carbon;
use App\Models\Quote;
use Tests\BrowserKitTest;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuotesTest extends BrowserKitTest
{
    use RefreshDatabase;

    /** @test */
    public function admins_can_browse_to_the_quotes_index()
    {
        $quote = factory(Quote::class)->states('published')->create();

        $this->actingAsAdmin()
             ->visit('/dashboard')
             ->click('Citas')
             ->seePageIs('/dashboard/quotes')
             ->see($quote->title);
    }

    /** @test */
    public function admins_can_browse_to_the_quotes_edit_page()
    {
        $quote = factory(Quote::class)->states('published')->create();

        $this->actingAsAdmin()
             ->visit('/dashboard/quotes')
             ->see($quote->title)
             ->click($quote->title)
             ->seePageIs("/dashboard/quotes/{$quote->id}/edit")
             ->see($quote->title)
             ->see('Actualizar');
    }

    /** @test */
    public function admins_can_fill_and_submit_the_create_quote_form()
    {
        $timestamp = Carbon::now()->format('Y-m-d h:i:s');

        $this->actingAsAdmin()
             ->visit('/dashboard/quotes/create')
             ->type('Test title', 'title')
             ->type('Test body', 'body')
             ->press('Publicar')
             ->see('se creo correctamente')
             ->seeInDatabase('quotes', [
                 'title' => 'Test title'
             ]);
    }

    /** @test */
    public function admins_can_fill_and_submit_the_edit_quote_form()
    {
        $quote = factory(Quote::class)->states('published')->create(['title' => 'The Original Title']);

        $this->actingAsAdmin()
             ->visit("/dashboard/quotes/{$quote->id}/edit")
             ->see('The Original Title')
             ->type('Updated Title', 'title')
             ->press('Actualizar')
             ->see('Se guardaron los cambios correctamente')
             ->seeInDatabase('quotes', [
                 'title' => 'Updated Title'
             ]);
    }

    /** @test */
    public function admins_can_move_quote_to_the_trash()
    {
        $quote = factory(Quote::class)->states('published')->create();

        $this->actingAsAdmin()
             ->visit('/dashboard/quotes')
             ->see($quote->title)
             ->press('Remover')
             ->see('La cita se envío a la papelera')
             ->dontSee($quote->title);
    }

    /** @test */
    public function admins_browse_to_the_trashed_quote_archive()
    {
        $quote = factory(Quote::class)->states('published')->create();

        $quote->delete();

        $this->actingAsAdmin()
             ->visit('/dashboard/quotes/trashed')
             ->see($quote->title);
    }

    /** @test */
    public function admins_restore_a_trashed_quote()
    {
        $quote = factory(Quote::class)->states('published')->create(['deleted_at' => Carbon::now()]);

        $this->actingAsAdmin()
             ->visit('/dashboard/quotes/trashed')
             ->see($quote->title)
             ->press('Restablecer')
             ->see('Se restableció la cita')
             ->dontSee($quote->title)
             ->visit('/dashboard/quotes')
             ->see($quote->title);
    }

    /** @test */
    public function admins_can_delete_quote_from_the_trash()
    {
        $quote = factory(Quote::class)->states('published')->create(['deleted_at' => Carbon::now()]);

        $this->actingAsAdmin()
             ->visit('/dashboard/quotes/trashed')
             ->see($quote->title)
             ->press('Eliminar')
             ->see('La cita se eliminó permanentemente')
             ->dontSee($quote->title)
             ->dontSeeInDatabase('quotes', ['id' => $quote->id]);
    }
}
