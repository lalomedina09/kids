<?php

namespace App\Mail\Landings;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Becas extends Mailable implements ShouldQueue
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
        $emails = ['lalo@queridodinero.com','miriam@queridodinero.com','erika.munoz@mb.com.mx','rebeca.feria@mb.com.mx'];

        $subject = 'Nuevo Lead Mexicana de Becas';
        return $this->subject($subject)
            ->to($emails)
            ->view('emails.landings.becas')
            ->with([
                'params' => $this->params,
            ]);
    }

}
