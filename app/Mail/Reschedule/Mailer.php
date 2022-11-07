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

    public static function createNotificationStaffRefund($dataNotification, $advice, $user, $refund)
    {
        Mail::send(new NotificationRefundReschedule($dataNotification, $advice, $user, $refund));
    }

    public static function sendMailNotificationBlockReschedule($dataNotification, $advice)
    {
        Mail::send(new NotificationBlockReschedule($dataNotification, $advice));
    }

    public static function createNotificationAdvisorRefund($dataNotification, $advice)
    {
        Mail::send(new NotificationAdvisorRefundReschedule($dataNotification, $advice));
    }

    public static function sendNotificationMoreDates($dataNotification, $advice)
    {
        Mail::send(new NotificationMoreDates($dataNotification, $advice));
    }

    public static function sendMailNotificationNewDates($dataNotification, $advice)
    {
        Mail::send(new NotificationNewDates($dataNotification, $advice));
    }
}
