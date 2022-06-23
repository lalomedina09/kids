<?php

namespace Tests\Unit\Http\Controllers;

use App\Models\User;
use Illuminate\Cache\RateLimiter;
use Mockery;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_validates_that_the_email_is_required()
    {
        $response = $this->post('/login', [
            'email' => null,
        ]);

        $response->assertSessionHasErrors([
            'email' => trans('validation.required', ['attribute' => 'correo electrónico']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_email_is_a_string()
    {
        $response = $this->post('/login', [
            'email' => false,
        ]);

        $response->assertSessionHasErrors([
            'email' => trans('validation.string', ['attribute' => 'correo electrónico']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_email_is_not_too_long()
    {
        $response = $this->post('/login', [
            'email' => str_repeat('x', 256),
        ]);

        $response->assertSessionHasErrors([
            'email' => trans('validation.max.string', ['attribute' => 'correo electrónico', 'max' => 255]),
        ]);
    }

    /** @test */
    public function it_validates_that_the_email_has_a_valid_format()
    {
        $response = $this->post('/login', [
            'email' => 'NOT_A_VALID_EMAIL',
        ]);

        $response->assertSessionHasErrors([
            'email' => trans('validation.email', ['attribute' => 'correo electrónico']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_password_is_required()
    {
        $response = $this->post('/login', [
            'password' => null,
        ]);

        $response->assertSessionHasErrors([
            'password' => trans('validation.required', ['attribute' => 'contraseña']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_password_is_a_string()
    {
        $response = $this->post('/login', [
            'password' => false,
        ]);

        $response->assertSessionHasErrors([
            'password' => trans('validation.string', ['attribute' => 'contraseña']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_password_is_not_too_long()
    {
        $response = $this->post('/login', [
            'password' => str_repeat('x', 256),
        ]);

        $response->assertSessionHasErrors([
            'password' => trans('validation.max.string', ['attribute' => 'contraseña', 'max' => 255]),
        ]);
    }

    /** @test */
    public function it_redirects_logged_in_users()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/login');

        $response->assertRedirect('/');
    }

    /** @test */
    public function it_throttles_login_attempts()
    {
        factory(User::class)->create(['password' => bcrypt('password')]);

        $mock = Mockery::mock(RateLimiter::class)->shouldReceive([
            'tooManyAttempts' => true,
            'availableIn' => 60,
        ])->once()->getMock();

        $this->app->instance(RateLimiter::class, $mock);

        $response = $this->post('/login', [
            'email' => 'john@example.com',
            'password' => 'INCORRECT_PASSWORD',
        ]);

        $response->assertSessionHasErrors([
            'email' => trans('auth.throttle', ['seconds' => 60]),
        ]);
    }
}
