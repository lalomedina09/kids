<?php
namespace App\Mail\Reschedule;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificationBlockReschedule extends Mailable
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
    public function __construct($dataNotification, $advice)
    {
        $this->dataNotification = $dataNotification;
        $this->advice = $advice;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $emails = [env('QD_CONTACT_EMAIL')];
        $subject = $this->dataNotification['subject'];

        return $this->subject($subject)
            ->to($emails)
            ->view('emails.reschedules.advisor-block-reschedule')
            ->with([
                'dataNotification' => $this->dataNotification,
                'advice' => $this->advice
            ]);
    }
}
