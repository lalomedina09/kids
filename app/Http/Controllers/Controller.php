<?php

namespace App\Http\Controllers;

use DateTime;
use DatePeriod;
use DateInterval;
use Carbon\Carbon;
use App\Models\UserLog;
use App\Models\UserAgent;

use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function createUserLog($array)
    {
        $data = new UserLog;
        $data->move = $array['move'];
        $data->user_id = Auth::user()->id;
        $data->description = $array['description'];
        $data->userlogsable_type = $array['userlogsable_type'];
        $data->userlogsable_id = $array['userlogsable_id'];

        $data->save();
        return $data;
    }

    public static function listMonths()
    {
        return $months = array(
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
    }

    public static function listYears()
    {
        return $years = array(
            2021 => "2021",
            2022 => "2022",
            2023 => "2023",
            2024 => "2024"
        );
    }

    public static function listDays()
    {
        return $days = array(
            1 => "Lunes",
            2 => "Martes",
            3 => "Miercoles",
            4 => "Jueves",
            5 => "Viernes",
            6 => "Sabado",
            7 => "Domingo"
        );
    }

    public static function buildArrayMonths($year)
    {
        return $months = array(
            "01" => array(
                "month" => "Enero",
                "start_month" => $year . "-01-01",
                "end_month" => $year . "-01-31",
            ),
            "02" => array(
                "month" => "Febrero",
                "start_month" => $year . "-02-01",
                "end_month" => $year . "-02-29",
            ),
            "03" => array(
                "month" => "Marzo",
                "start_month" => $year . "-03-01",
                "end_month" => $year . "-03-31",
            ),
            "04" => array(
                "month" => "Abril",
                "start_month" => $year . "-04-01",
                "end_month" => $year . "-04-30",
            ),
            "05" => array(
                "month" => "Mayo",
                "start_month" => $year . "-05-01",
                "end_month" => $year . "-05-31",
            ),
            "06" => array(
                "month" => "Junio",
                "start_month" => $year . "-06-01",
                "end_month" => $year . "-06-30",
            ),
            "07" => array(
                "month" => "Julio",
                "start_month" => $year . "-07-01",
                "end_month" => $year . "-07-31",
            ),
            "08" => array(
                "month" => "Agosto",
                "start_month" => $year . "-08-01",
                "end_month" => $year . "-08-31",
            ),
            "09" => array(
                "month" => "Septiembre",
                "start_month" => $year . "-09-01",
                "end_month" => $year . "-09-30",
            ),
            "10" => array(
                "month" => "Octubre",
                "start_month" => $year . "-10-01",
                "end_month" => $year . "-10-31",
            ),
            "11" => array(
                "month" => "Noviembre",
                "start_month" => $year . "-11-01",
                "end_month" => $year . "-11-30",
            ),
            "12" => array(
                "month" => "Diciembre",
                "start_month" => $year . "-12-01",
                "end_month" => $year . "-12-31",
            ),
        );
    }

    public static function buildDateMonth($request)
    {
        $year = ($request->has('year')) ? $request->year : Carbon::now()->format('Y');
        $month = ($request->has('month')) ? $request->month : Carbon::now()->format('m');

        $startDate = $year . '-' . $month . '-01'  . ' 00:00:00';
        $endTime = '' . ' 23:59:59';
        $_endDate = Carbon::parse($startDate)->format('Y-m-t');
        $endDate = $_endDate . $endTime;

        return $date = array(
            'start' => $startDate,
            'end' => $endDate,
            'month' => $month,
            'year' => $year,
        );
    }

    public static function getRangeDate($date_ini, $date_end, $format)
    {

        $dt_ini = DateTime::createFromFormat($format, $date_ini);
        $dt_end = DateTime::createFromFormat($format, $date_end);
        $period = new DatePeriod(
            $dt_ini,
            new DateInterval('P1D'),
            $dt_end,
        );

        $range = [];
        foreach ($period as $date) {
            $range[] = $date->format($format);
        }

        $range[] = $date_end;
        return $range;
    }

    public static function calculatePercent($value1, $value2)
    {
        if ($value2 == 0 || $value1 == 0) {
            return 0;
        }

        $percentChange = (($value2 - $value1) / $value1) * 100;
        return intval(round($percentChange, 0));
    }

    public static function usersQD()
    {
        $usersQD = [
            2, 3, 239, 463, 16065,26301, 16468, 16256, 16124, 15807, 15998, 15861,
            15784, 15780, 15772, 15167, 14889, 14858, 14565, 16383,
            14542, 14726, 15884, 16118, 16290, 16064, 16080
        ];

        return $usersQD;
    }

    public static function detectAgent($request, $url)
    {
        $agent = new Agent();
        $languages = $agent->languages();

        $data = [
            'languages' => $languages[0],
            'ip' => $request->ip(),
            'platform' => $agent->platform(),
            'version_platform' => $agent->version($agent->platform()),
            'device' => $agent->device(),
            'browser' => $agent->browser(),
            'version_browser' => $agent->version($agent->browser()),
            'is_tablet' => $agent->isTablet(),
            'is_mobile' => $agent->isMobile(),
            'is_desktop' => $agent->isDesktop(),
            'is_robot' => $agent->robot(),
            'url' => $url
        ];

        return $data;
    }

    public static function saveUserAgent($agent, $user_id)
    {
        if ($agent) {
            $userAgent = new UserAgent();
            $userAgent->user_id = $user_id;
            $userAgent->url = $agent['url'];
            $userAgent->ip = $agent['ip'];
            $userAgent->platform = $agent['platform'];
            $userAgent->languages = $agent['languages'];
            $userAgent->platform_version = $agent['version_platform'];
            $userAgent->browser = $agent['browser'];
            $userAgent->browser_version = $agent['version_browser'];
            $userAgent->is_mobile = $agent['is_mobile'];
            $userAgent->is_tablet = $agent['is_tablet'];
            $userAgent->is_desktop = $agent['is_desktop'];
            $userAgent->is_robot = $agent['is_robot'];
            $userAgent->save();
            return true;
        } else {
            return false;
        }
    }


    public static function buildArrayMonthDinamic($numberOfMonths)
    {

        $monthsArray = [];

        // Obtener la fecha actual
        $currentDate = Carbon::now();

        // Iterar para obtener los últimos $numberOfMonths meses
        for ($i = 0; $i < $numberOfMonths; $i++) {
            // Restar $i meses a la fecha actual
            $date = $currentDate->copy()->subMonths($i);

            // Obtener el primer día del mes
            $firstDayOfMonth = $date->firstOfMonth()->format('Y-m-d');

            // Obtener el último día del mes
            $lastDayOfMonth = $date->endOfMonth()->format('Y-m-d');

            // Agregar al array
            $monthsArray[] = [
                'first_day' => $firstDayOfMonth,
                'last_day' => $lastDayOfMonth,
                'month' => $date->format('F'),
                'year' => $date->format('Y'),
            ];
        }

        // Cambiar el orden del array para que el primer elemento sea el último
        $monthsArray = array_reverse($monthsArray);

        return $monthsArray;
    }
}
