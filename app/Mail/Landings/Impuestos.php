<?php

namespace App\Mail\Landings;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Impuestos extends Mailable implements ShouldQueue
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
        $subject = 'Descargable Querido Dinero';
        return $this->subject($subject)
            ->to($this->params['Correo'], 'Querido Dinero')
            ->view('emails.landings.inversiones')
            ->with([
                'params' => $this->params,
                'link' => asset('images/landing/impuestos/ebook.pdf')
            ]);
    }

}
