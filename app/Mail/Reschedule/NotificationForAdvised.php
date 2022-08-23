<?php

namespace App\Mail\Reschedule;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificationForAdvised extends Mailable
{
    use Queueable, SerializesModels;

    protected $dataNotification;
    protected $user;
    protected $newReschedule;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($dataNotification, $user, $newReschedule)
    {
        $this->dataNotification = $dataNotification;
        $this->user = $user;
        $this->newReschedule = $newReschedule;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = $this->dataNotification['subject'];

        return $this->subject($subject)
        ->to($this->dataNotification['advised']->email, $this->dataNotification['advised']->fullname)
            ->view('emails.reschedules.notification-for-advised')
            ->with([
                'dataNotification' => $this->dataNotification,
                'user' => $this->user,
                'newReschedule' => $this->newReschedule
            ]);
    }
}
