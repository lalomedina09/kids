<?php

namespace Tests\Unit\Http\Controllers\Dashboard;

use Tests\TestCase;
use App\Models\Quote;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuoteControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function quote_controller_validates_that_the_title_field_is_present()
    {
        $response = $this->actingAsAdmin()->post('/dashboard/quotes', [
            'title' => null,
        ]);

        $response->assertSessionHasErrors([
            'title' => trans('validation.required', ['attribute' => 'título']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_title_has_string_type()
    {
        $response = $this->actingAsAdmin()->post('/dashboard/quotes', [
            'title' => false,
        ]);

        $response->assertSessionHasErrors([
            'title' => trans('validation.string', ['attribute' => 'título']),
        ]);
    }

    /** @test */
    public function it_validates_the_title_length()
    {
        $response = $this->actingAsAdmin()->post('/dashboard/quotes', [
            'title' => str_repeat('x', 256),
        ]);

        $response->assertSessionHasErrors([
            'title' => trans('validation.max.string', ['attribute' => 'título', 'max' => 255]),
        ]);

        $response = $this->actingAsAdmin()->post('/dashboard/quotes', [
            'title' => 'x',
        ]);
        $response->assertSessionHasErrors([
            'title' => trans('validation.min.string', ['attribute' => 'título', 'min' => 2]),
        ]);
    }

    /** @test */
    public function it_validates_that_the_body_is_required()
    {
        $response = $this->actingAsAdmin()->post('/dashboard/quotes', [
            'body' => null,
        ]);

        $response->assertSessionHasErrors([
            'body' => trans('validation.required', ['attribute' => 'contenido']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_body_is_string_type()
    {
        $response = $this->actingAsAdmin()->post('/dashboard/quotes', [
            'body' => false,
        ]);

        $response->assertSessionHasErrors([
            'body' => trans('validation.string', ['attribute' => 'contenido']),
        ]);
    }

    /** @test */
    public function it_returns_to_index_view_on_index_method()
    {
        $response = $this->actingAsAdmin()->get('/dashboard/quotes');

        $response->assertViewIs('dashboard.quotes.index');
    }

    /** @test */
    public function it_returns_to_create_view_on_create_method()
    {
        $response = $this->actingAsAdmin()->get('/dashboard/quotes/create');

        $response->assertViewIs('dashboard.quotes.create');
    }

    /** @test */
    public function it_returns_to_edit_view_on_edit_method()
    {
        $quote = factory(Quote::class)->create();
        $response = $this->actingAsAdmin()->get('/dashboard/quotes/'.$quote->id.'/edit');

        $response->assertViewIs('dashboard.quotes.edit');
    }

    /** @test */
    public function it_returns_to_index_route_on_destroy_method()
    {
        $quote = factory(Quote::class)->create();
        $response = $this->actingAsAdmin()->delete('/dashboard/quotes/'.$quote->id);

        $response->assertRedirect(route('dashboard.quotes.index'));
    }

    /** @test */
    public function it_returns_to_trashed_route_on_hard_destroy_method()
    {
        $quote = factory(Quote::class)->create();
        $response = $this->actingAsAdmin()->delete('/dashboard/quotes/'.$quote->id.'?force');

        $response->assertRedirect(route('dashboard.quotes.trashed'));
    }

    /** @test */
    public function it_returns_to_trashed_route_on_restore_method()
    {
        $quote = factory(Quote::class)->create();
        $response = $this->actingAsAdmin()->post('/dashboard/quotes/'.$quote->id);

        $response->assertRedirect(route('dashboard.quotes.trashed'));
    }

    /** @test */
    public function it_returns_to_trashed_view_on_trashed_method()
    {
        $response = $this->actingAsAdmin()->get('/dashboard/quotes/trashed');

        $response->assertViewIs('dashboard.quotes.trashed');
    }
}
