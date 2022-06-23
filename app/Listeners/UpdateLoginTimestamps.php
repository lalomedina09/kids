<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;

class UpdateLoginTimestamps
{
    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Login  $event
     */
    public function handle(Login $event)
    {
        tap($event->user, function ($user) {
            if (empty($user->first_login)) {
                $user->setAttribute('first_login', $user->freshtimestamp());
            }

            $user->setAttribute('last_login', $user->freshtimestamp());
        })->save();
    }
}
