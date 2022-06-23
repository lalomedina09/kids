<?php

namespace App\Mail\Landings;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Fibrax extends Mailable implements ShouldQueue
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
        $subject = 'Nuevo Lead Fibrax Life';
        return $this->subject($subject)
            ->to('acamacho@fibrax.mx', 'Fibrax Life')
            ->view('emails.landings.fibrax')
            ->with([
                'params' => $this->params,
            ]);
    }

}
