<?php

use Illuminate\Support\Facades\Auth;

use App\Models\Notification;
use App\Models\Category;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Carbon\Carbon;

if (! function_exists('active_class')) {
    /**
     * @param  string  $pattern
     * @return string
     */
    function active_class($pattern)
    {
        return request()->is($pattern) ? 'active' : '';
    }
}

if (! function_exists('active_media')) {
    /**
     * @param  string  $pattern
     * @return string
     */
    function active_media($pattern)
    {
        return request()->is($pattern) ? '' : 'd-none';
    }
}


if (! function_exists('format_value')) {
    /**
     * @param  mixed  $value
     * @param  string  $format
     * @return string
     */
    function format_value($value, $format='')
    {
        if (!is_numeric($value)) {
            return '0.0';
        }

        switch ($format) {
            case '$':
                return '$'.number_format($value, 2, '.', ',');
            case '%':
                $v = $value * 100;
                return number_format($v, 2, '.', ',').'%';
            case '0':
                return number_format($value, 2, '.', ',');
            default:
                return $value;
        }
    }
}

function getNotificationsMenu()
{
    $notifications = Notification::where('user_id', Auth::user()->id)
                    ->where('status', 0)
                    ->where('type', 3)
                    ->get();
    return count($notifications);

    #$notifications = Auth::user()->notificationsTypeWeb;
}

function getCustomDateHuman($date)
{
    if($date)
    {
        return $newDate = Carbon::parse($date)->diffForHumans();
    }else{
        return 'No Disponible';
    }
}

function getCategoriesQD()
{
    return $categories = Category::whereIn('id', ['4', '5', '6', '7', '8', '9'])
    ->get();
}

function legendsReschedule($reschedule)
{
    $status = $reschedule->status;
    $typeUser = $reschedule->type_user;
    $reschedule_user_id = $reschedule->user_id;
    #$user_current = Auth::user()->id;
    $created = Carbon::parse($reschedule->created_at)->format('Y-m-d H:i');
    switch ($status) {
        case 1:
            return 'Contemplada';
        case 2:
            if(Auth::user()->id == $reschedule_user_id)
            {
                return 'Sugeriste a tu asesorado cambiar la fecha de asesoría';
            }else {
                return 'Tu asesor te sugiere Re-agendar la asesoría, elige la nueva fecha desde el botón de Re agendar';
            }
        case 3:
            if (Auth::user()->id == $reschedule_user_id)
            {
                return 'Re agendaste la asesoría, espera que tu asesor acepte o rechace la nueva fecha. Si tu asesor no cambia el status tu asesoría se llevará a cabo en la nueva fecha que elegiste';
            }else{
                return 'Tu asesorado agendando la asesoría, acepta o rechaza la fecha, desde el botón de Re agendar. Si no actualizas el estatus el evento se llevara acabo en la nueva fecha solicitada por tu asesorado';
            }
        case 4:
            if (Auth::user()->id == $reschedule_user_id){
                return 'Aprobaste la nueva fecha que eligió tu asesorado';
            }else{
                return 'Tu solicitud fue aprobada por tu asesor';
            }
        case 5:
            if (Auth::user()->id == $reschedule_user_id) {
                return 'Rechazaste la solicitud de tu asesorado para Re agendar';
            } else {
                return 'Tu solicitud fue rechazada por el asesor, revisa las políticas de devoluciones y solicita la devolución de tu asesoría ';
            }
        case 6:
            if (Auth::user()->id == $reschedule_user_id) {
                return 'Solicitud de devolución en proceso ';
            } else {
                return 'Tu asesorado solicitó la devolución de la asesoría ';
            }
        case 7:
            if (Auth::user()->id == $reschedule_user_id) {
                return 'Asesor hizo reporte que no llegaste a la asesoría y ya no esta disponible para reagendar ';
            } else {
                return 'Asesorado no se presentó y bloqueaste la opción de re agendar ';
            }
        case 10:
            if (Auth::user()->id == $reschedule_user_id) {
                return 'Espera que tu asesor agregue nuevas fechas en las próximas 24 horas a partir que enviaste la solicitud '. $created;
            } else {
                return 'Tu asesorado solicitó fechas que se adapten a su agenda, sino agregas fechas tu asesorado solicitará el reembolso ' .
                'Mensaje del asesorado: '. $reschedule->description;
            }
        default:
            return null;
    }
}


function getDateSpanish($date, $time)
{
    $newDate = Carbon::parse($date);
    $days = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado");
    $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

    $day = $days[($newDate->dayOfWeek)];
    $mes = $meses[($newDate->format('n')) - 1];

    $_date = $day . ', ' . $newDate->format('d') . ' de ' . $mes . ' de ' . $newDate->format('Y');
    $getTime = $newDate->format('g:i A');

    if($time){
        return $_date.' a las '.$getTime;
    }else{
        return $_date;
    }
}

function divDate($date, $type)
{
    $date = explode("a las", $date);
    if($type == 'day'){
        return $date[0];
    }else{
        return $date[1];
    }
}

function getMyAdvices()
{
    return 12;
}

function showBtnVideoCall($_start, $_end)
{
    $start = Carbon::parse($_start)->subMinutes(15);
    $end = Carbon::parse($_end);

    $current = Carbon::now();
    $nowSub = Carbon::now();
    #->subMinutes(10);
    $nowAdd = Carbon::now();
    #->addMinutes(10);

    if($start->format('Y-m-d') == $current->format('Y-m-d')){
        if($current >= $start){
            return true;
        }else{
            return false;
        }
    }
}

function getSubMinutesTime($date)
{
    $hour = Carbon::parse($date)->subMinutes(15)->format('H:i A');
    return $hour;
}

function diferenceHoursStartToCurrent($date, $hours)
{
    $now = Carbon::now();
    $date = Carbon::parse($date);

    $hoursDiff = $date->diffInHours($now);

    if($hoursDiff >= $hours)
    {
        return true;
    }else{
        return false;
    }
}


function advicedateLastCurrent($last_reschedule)
{
    $new_date = $last_reschedule->current_date;
    $current = Carbon::now();

    if($new_date > $current){
        return true;
    }else{
        return false;
    }

function onlyDate($date)
{
    return $newFormat = Carbon::parse($date)->format('Y-m-d');
}
