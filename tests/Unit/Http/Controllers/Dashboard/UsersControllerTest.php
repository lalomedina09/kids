<?php

namespace Tests\Unit\Http\Controllers\Dashboard;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_validates_that_the_password_is_required()
    {
        $response = $this->actingAsAdmin()->post('/dashboard/users', [
            'password' => null,
        ]);

        $response->assertSessionHasErrors('password');
    }

    /** @test */
    public function it_validates_that_the_name_is_required()
    {
        $response = $this->actingAsAdmin()->post('/dashboard/users', [
            'name' => null,
        ]);

        $response->assertSessionHasErrors([
            'name' => trans('validation.required', ['attribute' => 'nombre']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_last_name_is_required()
    {
        $response = $this->actingAsAdmin()->post('/dashboard/users', [
            'last_name' => null,
        ]);

        $response->assertSessionHasErrors([
            'last_name' => trans('validation.required', ['attribute' => 'apellidos']),
        ]);
    }

    /** @test */
    public function it_validates_that_the_email_is_an_email()
    {
        $response = $this->actingAsAdmin()->post('/dashboard/users', [
            'email' => 'not-an-email',
        ]);

        $response->assertSessionHasErrors('email');
    }

    /** @test */
    public function it_validates_that_the_city_is_required()
    {
        $response = $this->actingAsAdmin()->post('/dashboard/users', [
            'city' => null,
        ]);

        $response->assertSessionHasErrors('city');
    }

    /** @test */
    public function it_indexes_users()
    {
        $response = $this->actingAsAdmin()->get('/dashboard/users');

        $response->assertViewIs('dashboard.users.index');
    }

    /** @test */
    public function it_edits_users()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAsAdmin()->get('/dashboard/users/'.$user->id.'/edit');

        $response->assertViewIs('dashboard.users.edit');
    }

    /** @test */
    public function it_stores_users()
    {
        $response = $this->actingAsAdmin()->post('/dashboard/users', [
            'name' => 'Test Name',
            'last_name' => 'Test Last Name',
            'email' => 'test@email.com',
            'password' => 'secret',
            'password_confirmation' => 'secret',
            'city' => 'Oakland',
            'type' => 'admin'
        ]);

        $response->assertRedirect(route('dashboard.users.edit', 2));

        $this->assertDatabaseHas('users', [
            'name' => 'Test Name',
            'last_name' => 'Test Last Name',
            'email' => 'test@email.com',
            'city' => 'Oakland'
        ]);

        $this->assertTrue(User::find(2)->isAdmin());
    }

    /** @test */
    public function destroy_method_redirects_to_index_route()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAsAdmin()->delete('/dashboard/users/'.$user->id);

        $response->assertRedirect(route('dashboard.users.index'));
    }

    /** @test */
    public function it_returns_index_route_on_restore_method()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAsAdmin()->post('/dashboard/users/'.$user->id);

        $response->assertRedirect(route('dashboard.users.index'));
    }
}
