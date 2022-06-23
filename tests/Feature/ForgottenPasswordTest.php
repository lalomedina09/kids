<?php

namespace Feature;

use App\Models\User;
use Tests\BrowserKitTest;
use App\Notifications\ResetPassword;
use Illuminate\Support\Facades\Notification;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ForgottenPasswordTest extends BrowserKitTest
{
    use RefreshDatabase;

    /** @test */
    public function users_can_request_a_password_recovery_email()
    {
        Notification::fake();

        $user = factory(User::class)->create(['email' => 'john@example.com']);

        $this->visit('/password/reset')
             ->type('john@example.com', 'email')
             ->press('Restablecer contraseña');

        $this->see('¡Te hemos enviado por correo el enlace para restablecer tu contraseña!');

        Notification::assertSentTo($user, ResetPassword::class);
    }

    /** @test */
    public function users_can_reset_their_passwords()
    {
        $user = factory(User::class)->create(['email' => 'john@example.com']);
        $token = app(PasswordBroker::class)->getRepository()->create($user);

        $this->visit("/password/reset/{$token}")
             ->type('john@example.com', 'email')
             ->type('new_password', 'password')
             ->type('new_password', 'password_confirmation')
             ->press('Restablecer contraseña');

        $this->seePageIs('/')
             ->see(htmlentities('¡Tu contraseña ha sido restablecida!'));

        $this->assertTrue($this->app['auth']->check());
        $this->assertTrue($this->app['auth']->user()->is($user));
        $this->assertTrue(
            $this->app['hash']->check('new_password', $user->fresh()->password)
        );
    }
}
