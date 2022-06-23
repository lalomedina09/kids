<?php

namespace Tests\Unit\Http\Controllers\Auth;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_validates_that_the_name_is_required()
    {
        $response = $this->post('/register', [
            'name' => null,
        ]);

        $response->assertSessionHasErrors([
            'name' => trans('validation.required', ['attribute' => 'nombre']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_name_is_a_string()
    {
        $response = $this->post('/register', [
            'name' => false,
        ]);

        $response->assertSessionHasErrors([
            'name' => trans('validation.string', ['attribute' => 'nombre']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_name_is_not_too_long()
    {
        $response = $this->post('/register', [
            'name' => str_repeat('x', 256),
        ]);

        $response->assertSessionHasErrors([
            'name' => trans('validation.max.string', ['attribute' => 'nombre', 'max' => 255]),
        ]);
    }

     /** @test */
    public function it_validates_that_the_last_name_is_required()
    {
        $response = $this->post('/register', [
            'last_name' => null,
        ]);

        $response->assertSessionHasErrors([
            'last_name' => trans('validation.required', ['attribute' => 'apellidos']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_last_name_is_a_string()
    {
        $response = $this->post('/register', [
            'last_name' => false,
        ]);

        $response->assertSessionHasErrors([
            'last_name' => trans('validation.string', ['attribute' => 'apellidos']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_last_name_is_not_too_long()
    {
        $response = $this->post('/register', [
            'last_name' => str_repeat('x', 256),
        ]);

        $response->assertSessionHasErrors([
            'last_name' => trans('validation.max.string', ['attribute' => 'apellidos', 'max' => 255]),
        ]);
    }

    /** @test */
    public function it_validates_that_the_email_is_required()
    {
        $response = $this->post('/register', [
            'email' => null,
        ]);

        $response->assertSessionHasErrors([
            'email' => trans('validation.required', ['attribute' => 'correo electrónico']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_email_is_a_string()
    {
        $response = $this->post('/register', [
            'email' => false,
        ]);

        $response->assertSessionHasErrors([
            'email' => trans('validation.string', ['attribute' => 'correo electrónico']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_email_is_not_too_long()
    {
        $response = $this->post('/register', [
            'email' => str_repeat('x', 256),
        ]);

        $response->assertSessionHasErrors([
            'email' => trans('validation.max.string', ['attribute' => 'correo electrónico', 'max' => 255]),
        ]);
    }

    /** @test */
    public function it_validates_that_the_email_is_unique()
    {
        factory(User::class)->create(['email' => 'john@example.com']);

        $response = $this->post('/register', [
            'email' => 'john@example.com',
        ]);

        $response->assertSessionHasErrors([
            'email' => trans('validation.unique', ['attribute' => 'correo electrónico']),
        ]);
    }

    /** @test */
    public function store_validates_the_gender_is_required()
    {
        $response = $this->post('/register', [
            'gender' => null
        ]);

        $response->assertSessionHasErrors([
            'gender' => trans('validation.required', ['attribute' => 'género']),
        ]);
    }

    /** @test */
    public function store_validates_the_gender_is_not_in()
    {
        $response = $this->post('/register', [
            'gender' => 'xxxx'
        ]);

        $response->assertSessionHasErrors([
            'gender' => trans('validation.in', ['attribute' => 'género']),
        ]);
    }

    /** @test */
    public function store_validates_the_birthday_is_required()
    {
        $response = $this->post('/register', [
            'birthday' => null
        ]);

        $response->assertSessionHasErrors([
            'birthday' => trans('validation.required', ['attribute' => 'fecha de nacimiento']),
        ]);
    }

    /** @test */
    public function store_validates_the_birthday_is_an_array()
    {
        $response = $this->post('/register', [
            'birthday' => 'NOT_AN_ARRAY',
        ]);

        $response->assertSessionHasErrors([
            'birthday' => trans('validation.array', ['attribute' => 'fecha de nacimiento']),
        ]);
    }

    /** @test */
    public function store_validates_the_birthday_day_is_required()
    {
        $response = $this->post('/register', [
            'birthday' => [
                'day' => null,
            ],
        ]);

        $response->assertSessionHasErrors([
            'birthday.day' => trans('validation.required', ['attribute' => 'día']),
        ]);
    }

    /** @test */
    public function store_validates_the_birthday_day_is_numeric()
    {
        $response = $this->post('/register', [
            'birthday' => [
                'day' => false,
            ],
        ]);

        $response->assertSessionHasErrors([
            'birthday.day' => trans('validation.numeric', ['attribute' => 'día']),
        ]);
    }

    /** @test */
    public function store_validates_the_birthday_day_is_between()
    {
        $response = $this->post('/register', [
            'birthday' => [
                'day' => 0,
            ],
        ]);

        $response->assertSessionHasErrors([
            'birthday.day' => trans('validation.between.numeric', ['attribute' => 'día', 'min' => 1, 'max' => 31]),
        ]);
    }

    /** @test */
    public function store_validates_the_birthday_month_is_required()
    {
        $response = $this->post('/register', [
            'birthday' => [
                'month' => null,
            ],
        ]);

        $response->assertSessionHasErrors([
            'birthday.month' => trans('validation.required', ['attribute' => 'mes']),
        ]);
    }

    /** @test */
    public function store_validates_the_birthday_month_is_numeric()
    {
        $response = $this->post('/register', [
            'birthday' => [
                'month' => false,
            ],
        ]);

        $response->assertSessionHasErrors([
            'birthday.month' => trans('validation.numeric', ['attribute' => 'mes']),
        ]);
    }

    /** @test */
    public function store_validates_the_birthday_month_is_between()
    {
        $response = $this->post('/register', [
            'birthday' => [
                'month' => 0,
            ],
        ]);

        $response->assertSessionHasErrors([
            'birthday.month' => trans('validation.between.numeric', ['attribute' => 'mes', 'min' => 1, 'max' => 12]),
        ]);
    }

    /** @test */
    public function store_validates_the_birthday_year_is_required()
    {
        $response = $this->post('/register', [
            'birthday' => [
                'year' => null,
            ],
        ]);

        $response->assertSessionHasErrors([
            'birthday.year' => trans('validation.required', ['attribute' => 'año']),
        ]);
    }

    /** @test */
    public function store_validates_the_birthday_year_is_numeric()
    {
        $response = $this->post('/register', [
            'birthday' => [
                'year' => false,
            ],
        ]);

        $response->assertSessionHasErrors([
            'birthday.year' => trans('validation.numeric', ['attribute' => 'año']),
        ]);
    }

    /** @test */
    public function store_validates_the_birthday_year_is_between()
    {
        $response = $this->post('/register', [
            'birthday' => [
                'year' => 0,
            ],
        ]);

        $response->assertSessionHasErrors([
            'birthday.year' => trans('validation.digits', ['attribute' => 'año', 'digits' => 4]),
        ]);
    }

    /** @test */
    public function it_validates_that_the_interest_is_a_array()
    {
        $response = $this->post('/register', [
            'interest' => false,
        ]);

        $response->assertSessionHasErrors([
            'interest' => trans('validation.array', ['attribute' => 'intereses']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_password_is_required()
    {
        $response = $this->post('/register', [
            'password' => null,
        ]);

        $response->assertSessionHasErrors([
            'password' => trans('validation.required', ['attribute' => 'contraseña']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_password_is_a_string()
    {
        $response = $this->post('/register', [
            'password' => false,
        ]);

        $response->assertSessionHasErrors([
            'password' => trans('validation.string', ['attribute' => 'contraseña']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_password_is_not_too_short()
    {
        $response = $this->post('/register', [
            'password' => str_repeat('x', 5),
        ]);

        $response->assertSessionHasErrors([
            'password' => trans('validation.min.string', ['attribute' => 'contraseña', 'min' => 6]),
        ]);
    }

    /** @test */
    public function it_validates_that_the_password_is_not_too_long()
    {
        $response = $this->post('/register', [
            'password' => str_repeat('x', 256),
        ]);

        $response->assertSessionHasErrors([
            'password' => trans('validation.max.string', ['attribute' => 'contraseña', 'max' => 255]),
        ]);
    }

    /** @test */
    public function it_validates_that_the_password_has_confirmation()
    {
        $response = $this->post('/register', [
            'password' => 'password',
            'confirm_password' => 'NOT_MATCHING_PASSWORD',
        ]);

        $response->assertSessionHasErrors([
            'password' => trans('validation.confirmed', ['attribute' => 'contraseña']),
        ]);
    }
}
