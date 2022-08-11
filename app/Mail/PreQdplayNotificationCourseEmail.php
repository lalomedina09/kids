<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PreQdplayNotificationCourseEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'Gracias por tu compra Instrucciones';

        return $this->subject($subject)
            ->to($this->user->email, $this->user->fullname)
            ->view('emails.qdplay.pre-experiment.steps')
            ->with([
                'user' => $this->user
            ]);
    }
}
