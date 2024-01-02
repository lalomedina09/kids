<?php

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Notification;
use App\Models\Category;
use App\Models\QzAnswer;
use App\Models\Quiz;
use App\Models\TsBudget;
use App\Models\TsCategory;
use App\Models\TsCategoryUser;

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

function getCategoriesQDPlay()
{
    return $categories = Category::whereIn('id', ['75', '101', '77', '78', '81', '79'])
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
                return 'Sugeriste a tu asesorado cambiar la fecha de mentoría';
            }else {
                return 'Tu mentor te sugiere Re-agendar la mentoría, elige la nueva fecha desde el botón de Re agendar';
            }
        case 3:
            if (Auth::user()->id == $reschedule_user_id)
            {
                return 'Re agendaste la mentoría, espera que tu mentor acepte o rechace la nueva fecha. Si tu mentor no cambia el status tu mentoría se llevará a cabo en la nueva fecha que elegiste';
            }else{
                return 'Tu asesorado agendando la mentoría, acepta o rechaza la fecha, desde el botón de Re agendar. Si no actualizas el estatus el evento se llevara acabo en la nueva fecha solicitada por tu asesorado';
            }
        case 4:
            if (Auth::user()->id == $reschedule_user_id){
                return 'Solicitud aprobada correctamente';
            }else{
                return 'Solicitud aprobada correctamente';
            }
        case 5:
            if (Auth::user()->id == $reschedule_user_id) {
                return 'Rechazaste la solicitud de tu asesorado para Re agendar';
            } else {
                return 'Tu solicitud fue rechazada por el mentor, revisa las políticas de devoluciones y solicita la devolución de tu mentoría ';
            }
        case 6:
            if (Auth::user()->id == $reschedule_user_id) {
                return 'Solicitud de devolución en proceso ';
            } else {
                return 'Tu asesorado solicitó la devolución de la mentoría ';
            }
        case 7:
            if (Auth::user()->id == $reschedule_user_id) {
                return 'mentor hizo reporte que no llegaste a la mentoría y ya no esta disponible para reagendar ';
            } else {
                return 'Asesorado no se presentó y bloqueaste la opción de re agendar ';
            }
        case 10:
            if (Auth::user()->id == $reschedule_user_id) {
                return 'Espera que tu mentor agregue nuevas fechas en las próximas 24 horas a partir que enviaste la solicitud '. $created;
            } else {
                return 'Tu asesorado solicitó fechas que se adapten a su agenda, sino agregas fechas tu asesorado solicitará el reembolso ' .
                'Mensaje del asesorado: '. $reschedule->description;
            }
        case 11:
            if (Auth::user()->id == $reschedule_user_id) {
                return 'Espera que tu asesorado elija la nueva fecha ';
            } else {
                return 'Tu mentor actualizo el calendario, elije una nueva fecha para re agendar la mentoría ' .
                'Mensaje del mentor: ' . $reschedule->description;
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
    $start = Carbon::parse($_start)->subMinutes(60);
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
    $hour = Carbon::parse($date)->subMinutes(60)->format('H:i A');
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
    if($last_reschedule){
        $new_date = $last_reschedule->new_date;
    }else{
        $new_date = null;
    }

    $current = Carbon::now();

    if($new_date > $current){
        return true;
    }else{
        return false;
    }
}

function onlyDate($date)
{
    return  Carbon::parse($date)->format('Y-m-d');
}

function separateLinkDonwload($link)
{
    if($link)
    {
        $explode = explode('descargas/', $link);
        $newUrl = 'https://dear-money.com/downloads/' . $explode[1];

        return $newUrl;
    }

}

function countCharacterArticle($article)
{
    $trim = strip_tags($article->body);
    $trim = str_replace([" ", "\n", "\t", "&ndash;", "&rsquo;", "&#39;", "&quot;", "&nbsp;"], '', $trim);

    //Contamos los caracteres
    $subTotalCharacter = strlen(utf8_decode($trim));

    //Retornamos la variable
    return $subTotalCharacter;
}

function AvgQuizQdplay($quiz, $user)
{
    $data = [
        'total' => count($quiz->questions),
        'correct' => count(getOptionsCorrect($quiz, $user)),
        'incorrect' => count(getOptionsDontCorrect($quiz, $user)),
        'img' => asset('etapa1/quiz/mas-o-menos.png')
    ];

    $avg = ($data['correct'] * 100 ) / $data['total'];

    if ($avg >= 80) {
        $data['img'] = asset('etapa1/quiz/correct.png');
    } elseif ($avg >= 60) {
        $data['img'] = asset('etapa1/quiz/mas-o-menos.png');
    } else{
        $data['img'] = asset('etapa1/quiz/incorrect.png');
    }

    return $data;
}

function getQuiz($type, $id)
{
    return Quiz::where('quizzesable_type',$type)->where('quizzesable_id', $id)->first();
}
function getOptionsCorrect($quiz, $user)
{
    $data = QzAnswer::join('qz_options', 'qz_answers.option_id', '=', 'qz_options.id')
    ->select('qz_options.*')
    ->where('qz_answers.quiz_id', $quiz->id)
    ->where('qz_answers.user_id', $user->id)
    ->where('qz_options.is_correct', 1)
    ->get();

    return $data;
}

function getOptionsDontCorrect($quiz, $user)
{
    $data = QzAnswer::join('qz_options', 'qz_answers.option_id', '=', 'qz_options.id')
    ->select('qz_options.*')
    ->where('qz_answers.quiz_id', $quiz->id)
    ->where('qz_answers.user_id', $user->id)
    ->where('qz_options.is_correct', 0)
    ->get();

    return $data;
}

//Obtener fecha personalizada
function customDateSpanish($date)
{
    $now = Carbon::parse($date)->format('Y-m-d');
    $div = explode("-", $now);
    //dd($div);
    $year = $div[0];
    $month = $div[1];
    $day = $div[2];
    $month_spanish = getMonthSpanish($month);
    //dd($month, " mes y nombre del mes ",$month_spanish);
    return $day . " de " . $month_spanish . " de " . $year;
}


function getMonthSpanish($month)
{
    $months = array(
        '01' => "Enero",
        '02' => "Febrero",
        '03' => "Marzo",
        '04' => "Abril",
        '05' => "Mayo",
        '06' => "Junio",
        '07' => "Julio",
        '08' => "Agosto",
        '09' => "Septiembre",
        '10' => "Octubre",
        '11' => "Noviembre",
        '12' => "Diciembre"
    );
    return $months[$month];
}

function fechaEspanol($date)
{
    $format = 'Y-m-d H:i:s'; //This is an optional input format mask for datetime database extracted info
    $d = DateTime::createFromFormat($format, $date); //A simple $d = new DateTime($fecha) can also be used
    $year = $d->format('Y');
    $month = $d->format('n');
    $day = $d->format('d');
    $dayWeek = $d->format('w');

    $days = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");

    $months = array(1 => "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

    return "{$days[$dayWeek]}, $day de {$months[$month]} de $year";
}

function dateRemoveHours($date)
{
    $onlyDate= explode(" ", $date);

    return $onlyDate[0];
}

function getPercentForCategory($int_real, $out_real)
{
    if($int_real <> 0 && $out_real <> 0)
    {
        $percent = round(($out_real * 100)/$int_real);
    }else{
        $percent = 0;
    }
    return $percent;
}

function divEmailProfile($email)
{
    return $separate = explode("@", $email);

}


function getSumForCategory($arrayCategories, $arrayDate, $nameColumn)
{
    $user = Auth::user();

    if(count($arrayCategories)>0){

        return
        $moves = TsBudget::join('ts_categories_users', 'ts_budgets.ts_category_user_id', '=', 'ts_categories_users.id')
        ->where('ts_budgets.user_id', $user->id)
            ->whereIn('ts_categories_users.id', $arrayCategories)
            ->where('ts_budgets.created_at', '>=', $arrayDate['start'])
            ->where('ts_budgets.created_at', '<=', $arrayDate['end'])
            ->select('ts_budgets.*')
            ->get()
            ->sum("$nameColumn");
    }else{
        return 0;
    }

}

function getDurationForCourse($id){

    $query = DB::table('qdp_courses AS c')
    ->join('qdp_courses_qdp_videos AS cyv',
        'c.id',
        '=',
        'cyv.course_id'
    )
    ->join('qdp_videos AS v', 'cyv.video_id', '=', 'v.id')
    ->where('c.id', '=', $id)
    ->selectRaw('SUM(v.length/60) as duracionCurso')
    ->first();

    return $query->duracionCurso;

}

function getNameUser($id)
{
    $user = User::where('id', $id)->first();

    return $retVal = ($user) ? $user->fullName : null ;
}

function numberToFormatHour($hour)
{
    // Convierte el número en una hora en formato de 24 horas
    $hour_24h = $hour . ':00';

    // Convierte la hora de 24 horas a 12 horas con prefijo "am" o "pm"
    $hour_12h = date('h:i A', strtotime($hour_24h));

    return $hour_12h; // Mostrará la hora en formato "03:00 PM" para el número 15
}

function convertNumerToHour($minutos)
{
    // Calcular las horas y minutos
    $horas = floor($minutos / 60);
    $minutosRestantes = $minutos % 60;

    // Formatear la salida
    return $formatoHorasMinutos = sprintf("%02d:%02d hrs", $horas, $minutosRestantes);
}


if (!function_exists('date_mx')) {
    /**
     * @param  string  $pattern
     * @return string
     */
    function date_mx($datetime)
    {
        $time = strtotime($datetime);
        $months = ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'];
        $str = date('d _ Y', $time);
        return str_replace('_', $months[intval(date('m', $time)) - 1], $str);
    }
}

function searchCourseQuiz($courseId)
{
    $quiz = Quiz::where('quizzesable_type', "QD\\QDPlay\\Models\\Course")
        ->where('quizzesable_id', $courseId)
        ->get();
    return $quiz;
}
