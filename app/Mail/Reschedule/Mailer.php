<?php

namespace App\Mail\Reschedule;

use App\Models\Notification;
use Mail;

class Mailer
{


    public static function sendTestingMail($user)
    {
        Mail::send(new TestMail($user));
    }

    public static function sendMailRequestAdvised($dataNotification, $user, $newReschedule)
    {
        Mail::send(new NotificationForAdvised($dataNotification, $user, $newReschedule));
    }

    public static function sendMailRequestAdvisor($dataNotification, $user, $newReschedule)
    {
        Mail::send(new NotificationForAdvisor($dataNotification, $user, $newReschedule));
    }

    public static function sendMailLastStatus($dataNotification, $user, $newReschedule)
    {
        Mail::send(new NotificationStatusReschedule($dataNotification, $user, $newReschedule));
    }

    public static function createNotificationRefund()
    {
        Mail::send(new NotificationRefundReschedule($dataNotification, $user));
    }
    /*
    public static function sendUnsubscriptionMail($newsletter)
    {
        $mailable = new Unsubscribe($newsletter);
        Mail::queue($mailable);
    }*/
}
