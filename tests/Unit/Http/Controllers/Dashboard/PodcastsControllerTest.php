<?php

namespace Tests\Unit\Http\Controllers\Dashboard;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PodcastsControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_validates_that_the_title_is_required()
    {
        $response = $this->actingAsAdmin()->post('/dashboard/podcasts', [
            'title' => null,
        ]);

        $response->assertSessionHasErrors([
            'title' => trans('validation.required', ['attribute' => 'título']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_title_is_not_too_long()
    {
        $response = $this->actingAsAdmin()->post('/dashboard/podcasts', [
            'title' => str_repeat('x', 256),
        ]);

        $response->assertSessionHasErrors([
            'title' => trans('validation.max.string', ['attribute' => 'título', 'max' => 255]),
        ]);
    }

    /** @test */
    public function it_validates_that_the_category_id_is_required()
    {
        $response = $this->actingAsAdmin()->post('/dashboard/podcasts', [
            'category_id' => null,
        ]);

        $response->assertSessionHasErrors([
            'category_id' => trans('validation.required', ['attribute' => 'categoría']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_category_id_is_a_integer()
    {
        $response = $this->actingAsAdmin()->post('/dashboard/podcasts', [
            'category_id' => 1.1,
        ]);

        $response->assertSessionHasErrors([
            'category_id' => trans('validation.integer', ['attribute' => 'categoría']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_category_id_exists()
    {
        $response = $this->actingAsAdmin()->post('/dashboard/podcasts', [
            'category_id' => 0,
        ]);

        $response->assertSessionHasErrors([
            'category_id' => trans('validation.exists', ['attribute' => 'categoría']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_featured_image_is_a_image()
    {
        $response = $this->actingAsAdmin()->post('/dashboard/podcasts', [
            'featured_image' => UploadedFile::fake()->create('document.pdf'),
        ]);

        $response->assertSessionHasErrors([
            'featured_image' => trans('validation.image', ['attribute' => 'imagen destacada']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_audio_file_is_a_audio()
    {
        $response = $this->actingAsAdmin()->post('/dashboard/podcasts', [
            'audio_file' => UploadedFile::fake()->create('document.pdf'),
        ]);

        $response->assertSessionHasErrors([
            'audio_file' => trans('validation.mimes', ['attribute' => 'audio podcast', 'values' => 'mp3, mpga, ogg']),
        ]);
    }
}
