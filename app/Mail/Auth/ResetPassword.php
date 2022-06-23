<?php

namespace App\Mail\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetPassword extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $user;
    protected $token;

    /**
     * Create a notification instance.
     *
     * @param  \App\Models\User  $user
     * @param  string  $token
     * @return void
     */
    public function __construct($user, $token)
    {
        $this->user = $user;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'Restablecer tu contraseña';
        return $this->subject($subject)
            ->to($this->user->email, $this->user->fullname)
            ->view('emails.auth.password')
            ->with([
                'token' => $this->token
            ]);
    }
}
