<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use Tests\BrowserKitTest;
use App\Models\{ Role, User };
use Illuminate\Support\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersTest extends BrowserKitTest
{
    use RefreshDatabase;

    /** @test */
    public function admins_can_browse_to_the_users_index_page()
    {
        $user = factory(User::class)->create();

        $this->actingAsAdmin()
             ->visit('/dashboard')
             ->click('Usuarios')
             ->seePageIs('/dashboard/users')
             ->see($user->present()->name);
    }

    /** @test */
    public function admins_can_browse_to_an_specific_user_page()
    {
        $user = factory(User::class)->create();

        $this->actingAsAdmin()
             ->visit("/dashboard/users/{$user->id}")
             ->see($user->present()->name);
    }

    /** @test */
    public function admins_can_fill_and_submit_the_create_user_form()
    {
        $this->actingAsAdmin()
             ->visit('/dashboard/users/create')
             ->select('admin', 'type')
             ->type('John', 'name')
             ->type('Doe', 'last_name')
             ->type('john@doe.com', 'email')
             ->type('Oakland', 'city')
             ->type('secret', 'password')
             ->type('secret', 'password_confirmation')
             ->press('Crear')
             ->see('El usuario se creo correctamente')
             ->seeInDatabase('users', [
                 'name' => 'John',
                 'last_name' => 'Doe'
             ]);
    }

    /** @test */
    public function admins_can_fill_and_submit_the_edit_user_form()
    {
        $user = factory(User::class)->create([
            'name' => 'Test Name',
            'last_name' => 'Test Last Name',
            'city' => 'test city'
        ]);

        $role = (new Role)->forceFill(['name' => 'Administrator']);
        $role->save();

        $user->roles()->save($role);

        $response = $this->actingAsAdmin()
             ->visit("/dashboard/users/{$user->id}/edit")
             ->see('Test Name')
             ->see('Test Last Name')
             ->see('test city')
             ->type('Updated Name', 'name')
             ->select('subscriptor', 'type')
             ->press('Actualizar')
             ->see('Se guardaron los cambios correctamente')
             ->seeInDatabase('users', [
                 'name' => 'Updated Name'
             ]);

        $this->assertFalse($user->fresh()->isAdmin());
    }


    /** @test */
    public function users_can_move_user_to_the_trash()
    {
        $user = factory(User::class)->create();

        $this->actingAsAdmin()
             ->visit('/dashboard/users')
             ->see($user->name)
             ->press('Remover')
             ->see('Usuario borrado exitosamente')
             ->see($user->name);
    }

    /** @test */
    public function admins_restore_a_trashed_user()
    {
        $user = factory(User::class)->create(['deleted_at' => Carbon::now()]);

        $this->actingAsAdmin()
             ->visit('/dashboard/users')
             ->see($user->name)
             ->press('Restablecer')
             ->see('Usuario reactivado exitosamente');
    }
}
