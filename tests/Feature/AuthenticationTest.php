<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\BrowserKitTest;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends BrowserKitTest
{
    use RefreshDatabase;

    /** @test */
    public function users_can_login_into_the_application()
    {
        $user = factory(User::class)->create([
            'email' => 'john@example.com',
            'password' => bcrypt('secret'),
        ]);

        $this->visit('/login')
             ->type('john@example.com', 'email')
             ->type('secret', 'password')
             ->press('Iniciar sesión')
             ->seePageIs('/')
             ->see(htmlentities('Se inició tu sesión correctamente.'));

        $this->assertTrue($this->app['auth']->check());
        $this->assertTrue($this->app['auth']->user()->is($user));
    }

    /** @test */
    public function users_can_logout_from_the_application()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)
             ->visit('/logout')
             ->see(htmlentities('Tu sesión se cerró correctamente'))
             ->seePageIs('/');

        $this->assertFalse($this->app['auth']->check());
    }
}
