<?php

namespace App\Notifications;

use App\Models\User;

abstract class Notifier
{
    /**
     * Return new advice notification recipients
     *
     * @return Illuminate\Support\Collection
     */
    public static function getUsers()
    {
        $emails = env('QD_ADMINS', null);
        if (!$emails) return collect([]);

        $emails = explode(',', $emails);
        return User::whereIn('email', $emails)->get();
    }
}
