<?php

namespace App\Mail\Notifications;

#use App\Models\Notification;
use Mail;

class Mailer
{

    public static function sendMailAddEventCalendar($advice, $calendar, $userTo)
    {
        Mail::send(new MessageiCalendarAdvised($advice, $calendar, $userTo));
    }

}
