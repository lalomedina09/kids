<?php

namespace Tests\Unit\Http\Controllers\Auth;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ResetPasswordControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_validates_that_the_token_is_required()
    {
        $response = $this->post('/password/reset', [
            'token' => null,
        ]);

        $response->assertSessionHasErrors([
            'token' => trans('validation.required', ['attribute' => 'token']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_email_is_required()
    {
        $response = $this->post('/password/reset', [
            'email' => null,
        ]);

        $response->assertSessionHasErrors([
            'email' => trans('validation.required', ['attribute' => 'correo electrónico']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_email_is_a_string()
    {
        $response = $this->post('/password/reset', [
            'email' => false,
        ]);

        $response->assertSessionHasErrors([
            'email' => trans('validation.string', ['attribute' => 'correo electrónico']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_email_has_a_valid_format()
    {
        $response = $this->post('/password/reset', [
            'email' => 'NOT_A_VALID_EMAIL',
        ]);

        $response->assertSessionHasErrors([
            'email' => trans('validation.email', ['attribute' => 'correo electrónico']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_email_is_not_too_long()
    {
        $response = $this->post('/password/reset', [
            'email' => str_repeat('x', 256),
        ]);

        $response->assertSessionHasErrors([
            'email' => trans('validation.max.string', ['attribute' => 'correo electrónico', 'max' => 255]),
        ]);
    }

    /** @test */
    public function it_validates_that_the_password_is_required()
    {
        $response = $this->post('/password/reset', [
            'password' => null,
        ]);

        $response->assertSessionHasErrors([
            'password' => trans('validation.required', ['attribute' => 'contraseña'])
        ]);
    }

    /** @test */
    public function it_validates_that_the_password_is_a_string()
    {
        $response = $this->post('/password/reset', [
            'password' => false,
        ]);

        $response->assertSessionHasErrors([
            'password' => trans('validation.string', ['attribute' => 'contraseña'])
        ]);
    }

    /** @test */
    public function it_validates_that_the_password_is_not_too_short()
    {
        $response = $this->post('/password/reset', [
            'password' => str_repeat('x', 5),
        ]);

        $response->assertSessionHasErrors([
            'password' => trans('validation.min.string', ['attribute' => 'contraseña', 'min' => 6])
        ]);
    }

    /** @test */
    public function it_validates_that_the_password_is_not_too_long()
    {
        $response = $this->post('/password/reset', [
            'password' => str_repeat('x', 256),
        ]);

        $response->assertSessionHasErrors([
            'password' => trans('validation.max.string', ['attribute' => 'contraseña', 'max' => 255])
        ]);
    }

    /** @test */
    public function it_validates_that_the_password_is_confirmed()
    {
        $response = $this->post('/password/reset', [
            'password' => 'password',
            'password_confirmation' => 'WRONG_CONFIRMATION',
        ]);

        $response->assertSessionHasErrors([
            'password' => trans('validation.confirmed', ['attribute' => 'contraseña'])
        ]);
    }

    /** @test */
    public function it_redirects_authenticated_users()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/password/reset/abc123');

        $response->assertRedirect('/');
    }

    /** @test */
    public function it_displays_an_error_if_the_email_is_not_found()
    {
        $response = $this->post('/password/reset', [
            'token' => 'abc123',
            'email' => 'not@existent.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasErrors([
            'email' => trans('passwords.user'),
        ]);
    }

    /** @test */
    public function it_displays_an_error_if_the_token_is_invalid()
    {
        factory(User::class)->create(['email' => 'john@example.com']);

        $response = $this->post('/password/reset', [
            'token' => 'INVALID_TOKEN',
            'email' => 'john@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasErrors([
            'email' => trans('passwords.token'),
        ]);
    }
}
