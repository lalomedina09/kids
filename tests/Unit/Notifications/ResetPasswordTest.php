<?php

namespace Tests\Unit\Notifications;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Bus\Queueable;
use App\Notifications\ResetPassword;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetPasswordTest extends TestCase
{
    /** @test */
    public function it_is_sent_to_the_queue()
    {
        $notification = new ResetPassword('abc123');

        $this->assertInstanceOf(ShouldQueue::class, $notification);
        $this->assertArrayHasKey(Queueable::class, class_uses($notification));
    }

    /** @test */
    public function it_is_sent_via_email()
    {
        $user = new User;
        $token = 'abc123';
        $notification = new ResetPassword($token);

        $this->assertContains('mail', $notification->via($user));

        $message = $notification->toMail($user);

        $this->assertEquals('Restablecer tu contraseña', $message->subject);
        $this->assertEquals('Restablecer Contraseña', $message->actionText);
        $this->assertEquals(url('password/reset', $token), $message->actionUrl);
        $this->assertContains('Puedes hacer clic en el siguiente enlace para restablecer tu contraseña:', $message->introLines);
        $this->assertContains('Este enlace caduca 60 minutos después de su fecha de envío.', $message->outroLines);
    }
}
