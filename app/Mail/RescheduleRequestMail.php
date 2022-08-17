<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RescheduleRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $typeUser;
    protected $subject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($advice, $user, $typeUser, $subject)
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = $this->subject;

        return $this->subject($subject)
            ->to($this->user->email, $this->user->fullname)
            ->view('emails.reshedules.requests')
            ->with([
                'user' => $this->user,
                'typeUser' => $this->typeUser
            ]);
    }
}
