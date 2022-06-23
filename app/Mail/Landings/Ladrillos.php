<?php

namespace App\Mail\Landings;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Ladrillos extends Mailable implements ShouldQueue
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
        $emails = ['jose@queridodinero.com','miriam@queridodinero.com','arturo@100ladrillos.com','adriana@100ladrillos.com'];

        $subject = 'Nuevo Lead 100 Ladrillos';
        return $this->subject($subject)
            ->to($emails)
            ->view('emails.landings.ladrillos')
            ->with([
                'params' => $this->params,
            ]);
    }

}
