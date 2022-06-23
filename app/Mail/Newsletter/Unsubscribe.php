<?php

namespace App\Mail\Newsletter;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Unsubscribe extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $newsletter;

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return void
     */
    public function __construct($newsletter)
    {
        $this->newsletter = $newsletter;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'Te extrañaremos ...';
        return $this->subject($subject)
            ->to($this->newsletter->email, $this->newsletter->fullname)
            ->view('emails.newsletter.unsubscribe')
            ->with([
                'fullname' => $this->newsletter->fullname
            ]);
    }
}
