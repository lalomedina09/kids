<?php

namespace App\Mail\Reschedule;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificationAdvisorRefundReschedule extends Mailable
{
    use Queueable, SerializesModels;

    protected $dataNotification;
    protected $advice;
    #protected $user;
    #protected $refund;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($dataNotification, $advice)
    {
        $this->dataNotification = $dataNotification;
        $this->advice = $advice;
        #$this->user = $user;
        #$this->refund = $refund;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = $this->dataNotification->subject;
        $emails = [$this->advice->advisor->email];

        return $this->subject($subject)
            ->to($emails)
            ->view('emails.refund.advisor')
            ->with([
                'dataNotification' => $this->dataNotification,
                'advice' => $this->advice,
            ]);
    }
}
