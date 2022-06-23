<?php

namespace Tests\Unit\Http\Controllers\Dashboard;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VideosControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_validates_that_the_title_is_required()
    {
        $response = $this->actingAsAdmin()->post('/dashboard/videos', [
            'title' => null,
        ]);

        $response->assertSessionHasErrors([
            'title' => trans('validation.required', ['attribute' => 'título']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_title_is_not_too_long()
    {
        $response = $this->actingAsAdmin()->post('/dashboard/videos', [
            'title' => str_repeat('x', 256),
        ]);

        $response->assertSessionHasErrors([
            'title' => trans('validation.max.string', ['attribute' => 'título', 'max' => 255]),
        ]);
    }

    /** @test */
    public function it_validates_that_the_url_is_required()
    {
        $response = $this->actingAsAdmin()->post('/dashboard/videos', [
            'url' => null,
        ]);

        $response->assertSessionHasErrors([
            'url' => trans('validation.required', ['attribute' => 'url']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_url_is_a_url_string_type()
    {
        $response = $this->actingAsAdmin()->post('/dashboard/videos', [
            'url' => 'url string',
        ]);

        $response->assertSessionHasErrors([
            'url' => trans('validation.url', ['attribute' => 'url']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_body_is_required()
    {
        $response = $this->actingAsAdmin()->post('/dashboard/videos', [
            'body' => null,
        ]);

        $response->assertSessionHasErrors([
            'body' => trans('validation.required', ['attribute' => 'contenido']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_body_is_string_type()
    {
        $response = $this->actingAsAdmin()->post('/dashboard/videos', [
            'body' => false,
        ]);

        $response->assertSessionHasErrors([
            'body' => trans('validation.string', ['attribute' => 'contenido']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_category_id_is_required()
    {
        $response = $this->actingAsAdmin()->post('/dashboard/videos', [
            'category_id' => null,
        ]);

        $response->assertSessionHasErrors([
            'category_id' => trans('validation.required', ['attribute' => 'categoría']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_category_id_is_a_integer()
    {
        $response = $this->actingAsAdmin()->post('/dashboard/videos', [
            'category_id' => 1.1,
        ]);

        $response->assertSessionHasErrors([
            'category_id' => trans('validation.integer', ['attribute' => 'categoría']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_category_id_exists()
    {
        $response = $this->actingAsAdmin()->post('/dashboard/videos', [
            'category_id' => 0,
        ]);

        $response->assertSessionHasErrors([
            'category_id' => trans('validation.exists', ['attribute' => 'categoría']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_featured_image_is_a_image()
    {
        $response = $this->actingAsAdmin()->post('/dashboard/videos', [
            'featured_image' => UploadedFile::fake()->create('document.pdf'),
        ]);

        $response->assertSessionHasErrors([
            'featured_image' => trans('validation.image', ['attribute' => 'imagen destacada']),
        ]);
    }
}
