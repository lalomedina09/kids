<?php

namespace App\Mail\Webinar;

use Mail;

class Mailer
{

    /**
     * Send registration email
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Course  $course
     * @param  string  $registration_url
     * @return void
     */
    public static function sendWebinarRegistrationMail($user, $course, $registration_url)
    {
        Mail::queue(new Registration($user, $course, $registration_url));
    }

}
