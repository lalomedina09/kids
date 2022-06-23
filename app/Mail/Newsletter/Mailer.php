<?php

namespace App\Mail\Newsletter;

use Mail;

class Mailer
{

    /**
     * Send subscribe to newsletter email
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return void
     */
    public static function sendSubscriptionMail($newsletter)
    {
        $mailable = new Subscribe($newsletter);
        Mail::queue($mailable);
    }

    /**
     * Send unsubscribe to newsletter email
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return void
     */
    public static function sendUnsubscriptionMail($newsletter)
    {
        $mailable = new Unsubscribe($newsletter);
        Mail::queue($mailable);
    }

}
