<?php

namespace App\Mail\Auth;

use Mail;

class Mailer
{

    /**
     * Send new register mail
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public static function sendRegisterMail($user)
    {
        $mailable = new Register($user);
        Mail::queue($mailable);
    }

    /**
     * Send rate mail
     *
     * @param  \App\Models\User  $user
     * @param  string  $token
     * @return void
     */
    public static function sendResetPasswordMail($user, $token)
    {
        $mailable = new ResetPassword($user, $token);
        Mail::queue($mailable);
    }

}
