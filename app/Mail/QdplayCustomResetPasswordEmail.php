<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class QdplayCustomResetPasswordEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $token;

    /**
     * Create a new message instance.
     *
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
        $subject = 'Restablecer Password QD Play';

        return $this->subject($subject)
            ->to($this->user->email, $this->user->fullname)
            ->view('emails.qdplay.auth.password')
            ->with([
                'token' => $this->token
            ]);
    }
}
