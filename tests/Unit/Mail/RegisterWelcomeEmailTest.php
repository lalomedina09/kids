<?php

namespace Tests\Unit\Mail;

use Tests\TestCase;
use App\Models\User;
use App\Mail\RegisterWelcomeEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterWelcomeEmailTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_needs_a_user_to_be_created()
    {
        $user = factory(User::class)->create();

        $mail = new RegisterWelcomeEmail($user);

        $this->assertTrue($mail->user->is($user));
    }

    /** @test */
    public function it_overrides_the_build_method()
    {
        $user = factory(User::class)->create();

        $mail = (new RegisterWelcomeEmail($user))->build();

        $this->assertSame('Bienvenido a Querido Dinero', $mail->subject);
        $this->assertSame('emails.welcome.user', $mail->view);
        $this->assertSame(compact('user'), $mail->viewData);
    }

    /** @test */
    public function it_is_sent_to_the_queue()
    {
        $this->assertInstanceOf(ShouldQueue::class, new RegisterWelcomeEmail(new User));
    }
}
