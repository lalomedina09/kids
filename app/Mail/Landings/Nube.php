<?php

namespace App\Mail\Landings;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Nube extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $params;

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Course  $course
     * @param  string  $registration_url
     * @return void
     */
    public function __construct($params)
    {
        $this->params = $params;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $emails = ['lalo@queridodinero.com','miriam@queridodinero.com','karla.reyes@tiendanube.com'];

        $subject = 'Nuevo Lead Tienda Nube';
        return $this->subject($subject)
            ->to($emails)
            ->view('emails.landings.nube')
            ->with([
                'params' => $this->params,
            ]);
    }

}
