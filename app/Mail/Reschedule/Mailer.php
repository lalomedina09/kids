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

    public static function createNotificationRefund($dataNotification, $advice, $user)
    {
        Mail::send(new NotificationRefundReschedule($dataNotification, $advice, $user));
    }

    public static function sendMailNotificationBlockReschedule($dataNotification, $advice)
    {
        Mail::send(new NotificationBlockReschedule($dataNotification, $advice));
    }
    /*
    public static function sendUnsubscriptionMail($newsletter)
    {
        $mailable = new Unsubscribe($newsletter);
        Mail::queue($mailable);
    }*/
}
