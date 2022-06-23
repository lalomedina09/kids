<?php

namespace App\Mail\Webinar;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Registration extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $user;
    protected $course;
    protected $registration_url;

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Course  $course
     * @param  string  $registration_url
     * @return void
     */
    public function __construct($user, $course, $registration_url)
    {
        $this->user = $user;
        $this->course = $course;
        $this->registration_url = $registration_url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'Confirmación de registro en línea';
        return $this->subject($subject)
            ->to($this->user->email, $this->user->fullname)
            ->view('emails.webinar.registration')
            ->with([
                'user' => $this->user,
                'course' => $this->course,
                'registration_url' => $this->registration_url
            ]);
    }

}
