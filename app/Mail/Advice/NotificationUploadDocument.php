<?php
namespace App\Mail\Advice;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class NotificationUploadDocument extends Mailable
{
    use Queueable, SerializesModels;

    protected $advice;
    protected $request;

    public function __construct($advice, $request)
    {
        $this->advice = $advice;
        $this->request = $request;
    }

    public function build()
    {
        $subject = "Mentoría | Subir documentos ";
        $emails = [$this->advice->advised->email];

        return $this->subject($subject)
            ->to($emails)
            ->view('qd:advice::emails.advices.request_documentation')
            ->with([
                'request' => $this->request,
                'advice' => $this->advice,
            ]);
    }
}
