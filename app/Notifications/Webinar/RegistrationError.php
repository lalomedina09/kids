<?php

namespace App\Notifications\Webinar;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RegistrationError extends Notification implements ShouldQueue
{

    use Queueable;

    public $user;
    public $course;
    public $error_message;

    /**
     * Create a notification instance.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Course  $course
     * @param  string  $error_message
     * @return  void
     */
    public function __construct($user, $course, $error_message)
    {
        $this->user = $user;
        $this->course = $course;
        $this->error_message = $error_message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable) : array
    {
        return ['mail'];
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable) : MailMessage
    {
        //Validacion temporal para que no envie este error en la compra del
        // paquete de qdplay que toma referencia de webinar
        if($this->course->id != 51){
            return (new MailMessage)
                ->subject('Ocurrió un problema al registrar un usuario al taller o streaming en línea')
                ->view('emails.webinar.error', [
                    'user' => $this->user,
                    'course' => $this->course,
                    'error_message' => $this->error_message
                ]);

        }
    }
}
