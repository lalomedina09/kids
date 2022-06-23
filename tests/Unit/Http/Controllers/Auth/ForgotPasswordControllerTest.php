<?php

namespace Tests\Unit\Http\Controllers\Auth;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ForgotPasswordControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_redirects_authenticated_users()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/password/reset');

        $response->assertRedirect('/');
    }

    /** @test */
    public function it_validates_that_the_email_is_required()
    {
        $response = $this->post('/password/email', [
            'email' => null,
        ]);

        $response->assertSessionHasErrors([
            'email' => trans('validation.required', ['attribute' => 'correo electrónico']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_email_is_a_string()
    {
        $response = $this->post('/password/email', [
            'email' => false,
        ]);

        $response->assertSessionHasErrors([
            'email' => trans('validation.string', ['attribute' => 'correo electrónico']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_email_is_not_too_long()
    {
        $response = $this->post('/password/email', [
            'email' => str_repeat('x', 256),
        ]);

        $response->assertSessionHasErrors([
            'email' => trans('validation.max.string', ['attribute' => 'correo electrónico', 'max' => 255]),
        ]);
    }

    /** @test */
    public function it_validates_that_the_email_has_a_valid_format()
    {
        $response = $this->post('/password/email', [
            'email' => 'NOT_A_VALID_EMAIL',
        ]);

        $response->assertSessionHasErrors([
            'email' => trans('validation.email', ['attribute' => 'correo electrónico']),
        ]);
    }

    /** @test */
    public function it_shows_an_error_if_the_user_does_not_exists()
    {
        $response = $this->post('/password/email', [
            'email' => 'non@existent.com',
        ]);

        $response->assertSessionHasErrors([
            'email' => trans('passwords.user'),
        ]);
    }
}
