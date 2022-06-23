<?php

namespace Tests\Unit\Http\Controllers\Dashboard;

use Tests\TestCase;
use App\Models\Cover;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CoversControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function covers_controller_doesnt_validate_the_title_field()
    {
        $response = $this->actingAsAdmin()->post('/dashboard/covers', [
            'title' => null,
        ]);

        $response->assertSessionDoesntHaveErrors([
            'title' => trans('validation.required', ['attribute' => 'título']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_color_field_is_present()
    {
        $response = $this->actingAsAdmin()->post('/dashboard/covers', [
            'color' => null,
        ]);

        $response->assertSessionHasErrors([
            'color' => trans('validation.required', ['attribute' => 'color']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_category_field_is_present()
    {
        $response = $this->actingAsAdmin()->post('/dashboard/covers', [
            'category_id' => null,
        ]);

        $response->assertSessionHasErrors([
            'category_id' => trans('validation.required', ['attribute' => 'categoría']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_category_id_is_an_integer()
    {
        $response = $this->actingAsAdmin()->post('/dashboard/covers', [
            'category_id' => 1.1,
        ]);
        $response->assertSessionHasErrors([
            'category_id' => trans('validation.integer', ['attribute' => 'categoría']),
        ]);
    }
    /** @test */
    public function it_validates_that_the_category_id_exists()
    {
        $response = $this->actingAsAdmin()->post('/dashboard/covers', [
            'category_id' => 0,
        ]);
        $response->assertSessionHasErrors([
            'category_id' => trans('validation.exists', ['attribute' => 'categoría']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_featured_image_is_an_image()
    {
        $response = $this->actingAsAdmin()->post('/dashboard/covers', [
            'featured_image' => false,
        ]);
        $response->assertSessionHasErrors([
            'featured_image' => trans('validation.image', ['attribute' => 'imagen destacada']),
        ]);
    }

    /** @test */
    public function it_returns_to_index_view_on_index_method()
    {
        $response = $this->actingAsAdmin()->get('/dashboard/covers');

        $response->assertViewIs('dashboard.covers.index');
    }

    /** @test */
    public function it_returns_to_create_view_on_create_method()
    {
        $response = $this->actingAsAdmin()->get('/dashboard/covers/create');

        $response->assertViewIs('dashboard.covers.create');
    }

    /** @test */
    public function it_has_a_store_method()
    {
        $cover = factory(Cover::class)->create();

        $response = $this->actingAsAdmin()
            ->postJson("/dashboard/covers", ['title' => 'Updated Title', 'category_id' => 1, 'color' => '--secondary']);

        $this->assertDatabaseHas('covers', [
            'title' => 'Updated Title',
        ]);
    }

    /** @test */
    public function it_returns_to_edit_view_on_edit_method()
    {
        $cover = factory(Cover::class)->create();
        $response = $this->actingAsAdmin()->get('/dashboard/covers/'.$cover->id.'/edit');

        $response->assertViewIs('dashboard.covers.edit');
    }


    /** @test */
    public function it_has_an_update_method()
    {
        $cover = factory(Cover::class)->create();

        $response = $this->actingAsAdmin()
            ->putJson("/dashboard/covers/{$cover->id}", ['title' => 'Updated Title', 'category_id' => 1, 'color' => '--secondary']);

        $this->assertDatabaseHas('covers', [
            'title' => 'Updated Title',
        ]);
    }

    /** @test */
    public function it_returns_to_index_route_on_destroy_method()
    {
        $cover = factory(Cover::class)->create();
        $response = $this->actingAsAdmin()->delete('/dashboard/covers/'.$cover->id);

        $response->assertRedirect(route('dashboard.covers.index'));
    }

    /** @test */
    public function it_returns_to_trashed_route_on_hard_destroy_method()
    {
        $cover = factory(Cover::class)->create();
        $response = $this->actingAsAdmin()->delete('/dashboard/covers/'.$cover->id.'?force');

        $response->assertRedirect(route('dashboard.covers.trashed'));
    }

    /** @test */
    public function it_returns_to_trashed_route_on_restore_method()
    {
        $cover = factory(Cover::class)->create();
        $response = $this->actingAsAdmin()->post('/dashboard/covers/'.$cover->id);

        $response->assertRedirect(route('dashboard.covers.trashed'));
    }

    /** @test */
    public function it_returns_to_trashed_view_on_trashed_method()
    {
        $response = $this->actingAsAdmin()->get('/dashboard/covers/trashed');

        $response->assertViewIs('dashboard.covers.trashed');
    }
}
