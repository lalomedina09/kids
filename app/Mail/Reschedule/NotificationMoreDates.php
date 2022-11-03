<?php

namespace App\Mail\Reschedule;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificationMoreDates extends Mailable
{
    use Queueable, SerializesModels;

    protected $dataNotification;
    protected $advice;

    public function __construct($dataNotification, $advice)
    {
        $this->dataNotification = $dataNotification;
        $this->advice = $advice;
    }

    public function build()
    {
        $subject = $this->dataNotification['subject'];
        $emails = $this->dataNotification['advisor']->email;

        return $this->subject($subject)
            ->to($emails)
            ->view('emails.reschedules.more-dates')
            ->with([
                'dataNotification' => $this->dataNotification,
                'advice' => $this->advice
            ]);
    }
}
