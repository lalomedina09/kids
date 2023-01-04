<?php

namespace App\Services\CalendarClients;

use Mail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Mail\Notifications\Mailer;
use Illuminate\Support\Facades\Log;
use Illuminate\Notifications\Notifiable;
use Spatie\IcalendarGenerator\Components\Event;
use Spatie\IcalendarGenerator\Enums\EventStatus;
use Spatie\IcalendarGenerator\Components\Calendar;
use Spatie\IcalendarGenerator\PropertyTypes\TextPropertyType;
use Spatie\IcalendarGenerator\Enums\ParticipationStatus;


class CalendarService
{
    protected $advice;
    protected $address;
    protected $attendee;
    protected $timeEnd;
    protected $organizer;
    protected $timeStart;
    protected $description;
    protected $msgAlertBefore;
    protected $setDescriptionAdvisor;
    protected $setDescriptionAdvised;
    protected $timeProccess;

    public function __construct($advice)
    {
        $this->advice = $advice;
        $setVariables = $this->setVariables($advice);
        $setDescriptionAdvisor = $this->setDescription('advisor');
        $setDescriptionAdvised = $this->setDescription('advised');

        $build1 = $this->generate($this->advice->advisor, $setDescriptionAdvisor);
        $build2 = $this->generate($this->advice->advised, $setDescriptionAdvised);
    }

    public function generate($dataUser, $description)
    {
        $this->attendee = $dataUser;
        $this->description = $description;

        $calendar = Calendar::create('QD Mentorías')
        ->productIdentifier('asesoria.cz')
        ->event(function (Event $event) {
            $event->name("Mentoría Programada En Querido Dinero")
            ->alertMinutesBefore(15, $this->msgAlertBefore)
            ->organizer($this->organizer, 'Querido Dinero')
            ->status(EventStatus::confirmed())
            ->description($this->description)
            ->attendee($this->attendee->email, $this->attendee->fullname, ParticipationStatus::accepted())
            ->startsAt($this->timeStart)
            ->endsAt($this->timeEnd)
            ->address($this->address);
        });

        $calendar->appendProperty(TextPropertyType::create('METHOD', 'REQUEST'));
        Mailer::sendMailAddEventCalendar($this->advice, $calendar, $this->attendee);
    }

    public function setDescription($type)
    {
        $text1 = " Mentoría programada en Querido Dinero con tu ";
        $text2 = " Link de videollamada disponible en www.queridodinero.com/perfil ";
        $text3 = "
            Recuerda iniciar Sesion > Perfil > Mentorías creado";

        if($type == "advisor")
        {
            return $text1 . " asesorado " . $this->advice->advised->fullname . $text2 . $text3 ;
        }else{
            return $text1 . " mentor ". $this->advice->advisor->fullname . $text2 . $text3;
        }
    }

    public function setVariables()
    {
        $duration = $this->advice->duration/60;
        //H ->format 24 hours //h ->format 12 hours
        $start = Carbon::parse($this->advice->start_date)->addHours(6);
        $end = Carbon::parse($start)->addMinutes($duration);

        $this->timeStart = $start;
        $this->timeEnd = $end;
        $this->organizer = env('QD_CONTACT_EMAIL', 'elqueridodinero@gmail.com');

        $this->address = " Liga de mentoría por Meeting en www.queridodinero.com/perfil ";
        $this->msgAlertBefore = " Ingresa a www.queridodinero.com, La mentoría comenzara en 15 minutos ";
    }

}

