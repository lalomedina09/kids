<?php

namespace App\Notifications\Webinar;

use App\Notifications\Notifier as BaseNotifier;

use Notification;

class Notifier extends BaseNotifier
{

    /**
     * Send webinar registration error notification
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Course  $course
     * @param  string  $error_message
     * @return void
     */
    public static function sendWebinarRegistrationErrorNotification($user, $course, $error_message)
    {
        Notification::send(self::getUsers(), new RegistrationError($user, $course, $error_message));
    }

}
