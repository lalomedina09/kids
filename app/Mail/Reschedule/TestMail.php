<?php

namespace App\Mail\Reschedule;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        //
        $this->dataNotification;
        $this->user = $user;
        $this->newReschedule;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $subject = 'Correo de prueba Octavos de Final';
        //$emails = ['lalo@queridodinero.com', 'eumedina@vector.com.mx'];
        return $this->subject($subject)
            ->to($this->user->email, $this->user->fullname)
            ->view('emails.test.prueba')
            ->with([
                'user' => $this->user
            ]);
    }
}
