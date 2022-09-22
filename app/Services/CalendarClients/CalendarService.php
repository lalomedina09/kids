<?php

namespace App\Services\CalendarClients;

use Mail;
use Carbon\Carbon;
#use App\Mail\MailMessage;
#use Spatie\GoogleCalendar\Event;
use Illuminate\Http\Request;
use App\Mail\Notifications\Mailer;
use Illuminate\Support\Facades\Log;
use Illuminate\Notifications\Notifiable;
use Spatie\IcalendarGenerator\Enums\Display;
use Spatie\IcalendarGenerator\Components\Event;
use Spatie\IcalendarGenerator\Enums\EventStatus;
use Spatie\IcalendarGenerator\Components\Calendar;
use Spatie\IcalendarGenerator\PropertyTypes\TextPropertyType;
use Spatie\IcalendarGenerator\Enums\ParticipationStatus;


class CalendarService
{
    protected $user;
    protected $advice;
    protected $address;
    #protected $request;
    protected $timeEnd;
    protected $organizer;
    protected $timeStart;
    protected $description;
    protected $msgAlertBefore;

    public function __construct($advice, $user)
    {
        $this->user = $user;
        $this->advice = $advice;

        $setVariables = $this->setVariables($advice);
        $setDescription = $this->setDescription($user);

        $build = $this->generate();
    }

    public function generate()
    {
        $calendar = Calendar::create('QD Asesorias')
        ->productIdentifier('asesoria.cz')
        ->event(function (Event $event) {
            $event->name("Asesoría Programada En Querido Dinero")
            ->alertMinutesBefore(15, $this->msgAlertBefore)
            ->organizer($this->organizer, 'Querido Dinero')
            ->status(EventStatus::confirmed())
                ->description($this->description)
                ->attendee($this->user->email, $this->user->fullname, ParticipationStatus::accepted())
                ->startsAt($this->timeStart)
                ->endsAt($this->timeEnd)
                ->address($this->address);
        });

        $calendar->appendProperty(TextPropertyType::create('METHOD', 'REQUEST'));

        Mailer::sendMailAddEventCalendar($this->advice, $calendar, $this->user);
        //dd('Evento creado correctamente en calendario del cliente: ', $this->user, Carbon::now()->format('Y-m-d H:i:s'));
    }

    public function setDescription($user)
    {
        $text1 = " Asesoría programada en Querido Dinero con tu ";
        $text2 = " Link de videollamada disponible en www.queridodinero.com/perfil ";
        $text3 = " Recuerda iniciar Sesion > Perfil > Asesorías ";

        //validamos el tipo de usuario
        if ($user == 1) {
            $this->description = $text1 . " asesor " . $user->fullname . $text2 . $text3 ;
        }else{
            //si es asesorado(cliente final)
            $this->description = $text1 . " asesorado ". $user->fullname . $text2 . $text3;
        }
    }

    public function setVariables($advice)
    {
        //$this->user = "laliyo.mb@gmail.com";
        $this->timeEnd = Carbon::parse($advice->start_date)->addHours(5);
        $this->timeStart = Carbon::parse($advice->end_date)->addHours(5);
        $this->organizer = env('QD_CONTACT_EMAIL');
        #$this->timeStart = Carbon::parse("2022-09-23 07:10:00")->addHours(5);
        #$this->timeEnd = Carbon::parse("2022-09-23 08:10:00")->addHours(5);

        $this->address = " Liga de Asesoria por Meeting en www.queridodinero.com/perfil ";
        $this->msgAlertBefore = " Ingresa a www.queridodinero.com, La asesoria comenzara en 15 minutos ";
    }
}
