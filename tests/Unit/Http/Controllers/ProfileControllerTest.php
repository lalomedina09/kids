<?php

namespace Tests\Unit\Http\Controllers;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithExceptionHandling;

class ProfileControllerTest extends TestCase
{
    use RefreshDatabase, InteractsWithExceptionHandling;

    /** @test */
    public function it_redirect_guest_users()
    {
        $response = $this->get('/perfil');

        $response->assertRedirect('/login');
    }

    /** @test */
    public function it_validates_that_the_name_is_required()
    {
        $response = $this->actingAsUser()->post('/perfil', [
            'name' => null,
        ]);

        $response->assertSessionHasErrors([
            'name' => trans('validation.required', ['attribute' => 'nombre']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_name_is_a_string()
    {
        $response = $this->actingAsUser()->post('/perfil', [
            'name' => false,
        ]);

        $response->assertSessionHasErrors([
            'name' => trans('validation.string', ['attribute' => 'nombre']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_name_is_not_too_long()
    {
        $response = $this->actingAsUser()->post('/perfil', [
            'name' => str_repeat('x', 256),
        ]);

        $response->assertSessionHasErrors([
            'name' => trans('validation.max.string', ['attribute' => 'nombre', 'max' => 255]),
        ]);
    }

    /** @test */
    public function it_validates_that_the_last_name_is_required()
    {
        $response = $this->actingAsUser()->post('/perfil', [
            'last_name' => null,
        ]);

        $response->assertSessionHasErrors([
            'last_name' => trans('validation.required', ['attribute' => 'apellidos']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_last_name_is_a_string()
    {
        $response = $this->actingAsUser()->post('/perfil', [
            'last_name' => false,
        ]);

        $response->assertSessionHasErrors([
            'last_name' => trans('validation.string', ['attribute' => 'apellidos']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_last_name_is_not_too_long()
    {
        $response = $this->actingAsUser()->post('/perfil', [
            'last_name' => str_repeat('x', 256),
        ]);

        $response->assertSessionHasErrors([
            'last_name' => trans('validation.max.string', ['attribute' => 'apellidos', 'max' => 255]),
        ]);
    }

    /** @test */
    public function it_validates_that_the_email_is_required()
    {
        $response = $this->actingAsUser()->post('/perfil', [
            'email' => null,
        ]);

        $response->assertSessionHasErrors([
            'email' => trans('validation.required', ['attribute' => 'correo electrónico']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_email_is_string()
    {
        $response = $this->actingAsUser()->post('/perfil', [
            'email' => false,
        ]);

        $response->assertSessionHasErrors([
            'email' => trans('validation.string', ['attribute' => 'correo electrónico']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_email_is_valid_email()
    {
        $response = $this->actingAsUser()->post('/perfil', [
            'email' => 'INVALID_EMAIL_FORMAT',
        ]);

        $response->assertSessionHasErrors([
            'email' => trans('validation.email', ['attribute' => 'correo electrónico']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_email_is_not_too_long()
    {
        $response = $this->actingAsUser()->post('/perfil', [
            'email' => str_repeat('x', 256),
        ]);

        $response->assertSessionHasErrors([
            'email' => trans('validation.max.string', ['attribute' => 'correo electrónico', 'max' => 255]),
        ]);
    }

    /** @test */
    public function it_validates_that_the_age_is_an_integer()
    {
        $response = $this->actingAsUser()->post('/perfil', [
            'age' => 'NOT_AN_INTEGER',
        ]);

        $response->assertSessionHasErrors([
            'age' => trans('validation.integer', ['attribute' => 'edad']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_city_is_a_string()
    {
        $response = $this->actingAsUser()->post('/perfil', [
            'city' => false,
        ]);

        $response->assertSessionHasErrors([
            'city' => trans('validation.string', ['attribute' => 'ciudad']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_city_is_not_too_long()
    {
        $response = $this->actingAsUser()->post('/perfil', [
            'city' => str_repeat('x', 256),
        ]);

        $response->assertSessionHasErrors([
            'city' => trans('validation.max.string', ['attribute' => 'ciudad', 'max' => 255]),
        ]);
    }

    /** @test */
    public function it_validates_that_the_occupation_is_a_string()
    {
        $response = $this->actingAsUser()->post('/perfil', [
            'occupation' => false,
        ]);

        $response->assertSessionHasErrors([
            'occupation' => trans('validation.string', ['attribute' => 'ocupación']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_occupation_is_not_too_long()
    {
        $response = $this->actingAsUser()->post('/perfil', [
            'occupation' => str_repeat('x', 256),
        ]);

        $response->assertSessionHasErrors([
            'occupation' => trans('validation.max.string', ['attribute' => 'ocupación', 'max' => 255]),
        ]);
    }

    /** @test */
    public function it_validates_that_the_profile_photo_is_a_image()
    {
        $response = $this->actingAsAdmin()->post('/perfil', [
            'profile_photo' => UploadedFile::fake()->create('document.pdf'),
        ]);

        $response->assertSessionHasErrors([
            'profile_photo' => trans('validation.image', ['attribute' => 'profile photo']),
        ]);
    }
}
