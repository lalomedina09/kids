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
    $user_id = $reschedule->user_id;
    $user_current = Auth::user()->id;

    switch ($status) {
        case 1:
            return 'Contemplada';
        case 2:
            if($user_current == $user_id)
            {
                return 'Sugeriste a tu cliente cambiar la fecha de asesoría';
            }else {
                return 'Tu asesor te sugiere Re-agendar la asesoria, elige la nueva fecha desde el botón de Re agendar';
            }
        case 3:
            if ($user_current == $user_id)
            {
                return 'Re agendaste la asesoria, espera que tu asesor acepte o rechace la nueva fecha';
            }else{
                return 'Tu cliente Re-agendo la asesoria, acepta o rechaza la fecha, desde el botón de Re agendar';
            }
        case 4:
            if ($user_current == $user_id){
                return 'Aprobabaste la nueva fecha que eligio tu cliente';
            }else{
                return 'Tu solicitud fue aprobada por tu asesor';
            }
        case 5:
            if ($user_current == $user_id) {
                return 'Rechazaste la solicitud de tu cliente para Re agendar';
            } else {
                return 'Tu solicitud fue rechazada por el asesor';
            }
        default:
            return null;
    }
}


function getDateSpanish($date)
{
    $newDate = Carbon::parse($date);
    $days = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado");
    $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

    $day = $days[($newDate->dayOfWeek)];
    $mes = $meses[($newDate->format('n')) - 1];

    return $dateFormat = $day.', '.$newDate->format('d') . ' de ' . $mes . ' de ' . $newDate->format('Y');

}
