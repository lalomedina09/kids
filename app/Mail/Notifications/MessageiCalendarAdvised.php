<?php

namespace App\Mail\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MessageiCalendarAdvised extends Mailable
{
    use Queueable, SerializesModels;

    protected $advice;
    protected $userEmail;
    protected $calendar;

    public function __construct($advice, $calendar, $user)
    {
        $this->advice = $advice;
        $this->calendar = $calendar;
        $this->userEmail = $user->email;
    }

    public function build()
    {
        return $this->to($this->userEmail)
            ->subject("Querido Dinero - Asesoría Programada #ID" . $this->advice->id)
            ->markdown('emails.calendar.invite')
            ->attachData($this->calendar->get(), 'invite.ics', [
                'mime' => 'text/calendar; charset=UTF-8; method=REQUEST',
            ]);
    }
}
