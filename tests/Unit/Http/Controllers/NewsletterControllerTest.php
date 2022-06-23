<?php

namespace Tests\Unit\Http\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NewsletterControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_validates_that_the_email_is_required()
    {
        $response = $this->post('/newsletter', [
            'email' => null,
        ]);

        $response->assertSessionHasErrors([
            'email' => trans('validation.required', ['attribute' => 'correo electrónico']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_email_is_string()
    {
        $response = $this->post('/newsletter', [
            'email' => false,
        ]);

        $response->assertSessionHasErrors([
            'email' => trans('validation.string', ['attribute' => 'correo electrónico']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_email_is_valid_email()
    {
        $response = $this->post('/newsletter', [
            'email' => 'INVALID_EMAIL_FORMAT',
        ]);

        $response->assertSessionHasErrors([
            'email' => trans('validation.email', ['attribute' => 'correo electrónico']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_email_is_not_too_long()
    {
        $response = $this->post('/newsletter', [
            'email' => str_repeat('x', 256),
        ]);

        $response->assertSessionHasErrors([
            'email' => trans('validation.max.string', ['attribute' => 'correo electrónico', 'max' => 255]),
        ]);
    }
}
