<?php
namespace App\Mail\Reschedule;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificationRefundReschedule extends Mailable
{
    use Queueable, SerializesModels;

    protected $dataNotification;
    protected $user;
    protected $advice;
    protected $refund;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($dataNotification, $advice, $user, $refund)
    {
        $this->dataNotification = $dataNotification;
        $this->user = $user;
        $this->advice = $advice;
        $this->refund = $refund;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = $this->dataNotification['subject'];
        $emails = [env('QD_CONTACT_EMAIL')];

        return $this->subject($subject)
            ->to($emails)
            ->view('emails.reschedules.request-refund')
            ->with([
                'dataNotification' => $this->dataNotification,
                'user' => $this->user,
                'advice' => $this->advice,
                'refund' => $this->refund
            ]);
    }
}
