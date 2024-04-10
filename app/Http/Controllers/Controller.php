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

    public static function ipsGoogleBot()
    {
        return $ips = array(
            "3.238.2.174",

            "31.13.115.5",
            "31.13.115.6",
            "31.13.115.10",
            "31.13.115.118",

            "35.225.82.182",
            "35.88.101.152",

            "40.77.167.1",
            "40.77.167.2",
            "40.77.167.7",
            "40.77.167.10",
            "40.77.167.14",
            "40.77.167.17",
            "40.77.167.20",

            "40.77.167.22",
            "40.77.167.24",
            "40.77.167.25",
            "40.77.167.26",
            "40.77.167.27",
            "40.77.167.28",
            "40.77.167.30",

            "40.77.167.32",
            "40.77.167.36",
            "40.77.167.41",
            "40.77.167.43",
            "40.77.167.46",
            "40.77.167.48",
            "40.77.167.50",
            "40.77.167.52",
            "40.77.167.59",
            "40.77.167.60",
            "40.77.167.54",
            "45.233.117.217",

            "40.77.167.65",
            "40.77.167.67",
            "40.77.167.71",
            "40.77.167.76",

            "40.77.167.254",
            "40.77.167.255",
            "40.77.167.132",
            "40.77.167.143",
            "40.77.167.235",

            "40.77.167.13",
            "40.77.167.75",
            "40.77.167.23",
            "40.77.167.4",
            "40.77.167.16",
            "40.77.167.45",
            "40.77.167.63",
            "40.77.167.64",
            "40.77.167.78",
            "40.77.167.18",
            "40.77.167.13",
            "40.77.167.57",
            "40.77.167.61",
            "40.77.167.247",
            "40.77.167.126",

            "52.167.144.16",
            "52.167.144.20",
            "52.167.144.22",
            "52.167.144.24",
            "52.167.144.184",
            "52.167.144.139",
            "52.167.144.161",
            "52.167.144.170",
            "52.167.144.174",
            "52.167.144.185",
            "52.167.144.203",
            "52.167.144.204",
            "52.167.144.209",
            "52.167.144.175",
            "52.167.144.187",
            "52.167.144.237",
            "52.167.144.235",
            "52.167.144.205",
            "52.167.144.229",
            "52.167.144.191",
            "52.167.144.211",
            "52.167.144.186",
            "52.167.144.222",
            "52.167.144.182",
            
            "52.167.144.137",
            "52.167.144.233",
            "52.17.197.221",
            "52.167.144.223",
            "52.167.144.181",
            "52.167.144.217",
            "52.167.144.190",
            "52.167.144.12",
            "52.167.144.221",
            "52.167.144.194",
            "52.167.144.224",
            "52.167.144.205",
            "52.167.144.218",
            "52.167.144.191",
            "52.167.144.140",

            "52.167.144.212",
            "52.167.144.214",
            "52.167.144.216",
            "52.167.144.219",
            "52.167.144.226",
            "52.167.144.230",
            "52.167.144.238",
            "52.167.144.200",
            "52.206.84.190",
            "52.167.144.180",
            "52.167.144.191",
            "52.167.144.166",
            "54.197.197.229",
            "66.220.149.12",
            "66.249.65.237",
            "66.249.65.238",
            "66.249.65.239",

            "66.249.70.97",
            "66.249.70.96",
            "66.249.70.110",
            "66.249.70.103",
            "66.249.70.104",
            "66.249.70.105",
            "66.249.70.106",
            "66.249.70.109",
            "66.249.70.195",
            "66.249.70.197",

            "66.249.79.6",
            "66.249.79.7",
            "66.249.79.8",
            "66.249.79.192",
            "66.249.79.201",
            "66.249.79.202",
            "66.249.79.205",
            "66.249.79.206",

            "94.228.169.199",

            "173.252.87.1",

            "205.210.31.9",
            "207.46.13.153",
            "207.46.13.151",            

            "40.77.167.243",
            "35.213.238.205",

            "18.203.61.76",
            "66.102.7.110",

            "207.46.13.64",
            "207.46.13.107",
            "207.46.13.141",
            "207.46.13.7",
            "207.46.13.126",
            "207.46.13.168",
            "207.46.13.141",

            "157.55.39.52",
            "157.55.39.54",
            "157.55.39.62",
            "157.55.39.10",
            
            "20.7.221.176",

            "207.46.13.127",
            "157.55.39.58",

            "35.190.132.234",
            "35.171.144.152",


            "207.46.13.54",

            "54.88.179.33",
            "199.45.155.53",
            "104.194.196.124",
            
            "34.125.240.71",
            "35.196.132.85",

            "18.201.22.151",
            
            "173.252.87.5",

            "199.45.155.16",
            "199.45.154.51",
            "20.15.133.186",
            "38.65.158.81",
            "18.203.176.135",
            
            "74.125.151.96",
            "66.249.79.4",
            "87.236.176.209",
            "87.236.176.134",
            
        );
        /*
            "",
            "200.56.121.98",
            "195.201.12.243",
            "187.189.188.235",
            "187.190.205.237",
            "187.190.170.78",
            "187.209.163.147",
        */
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
            14542, 14726, 15884, 16290, 16064, 16080
        ];
        #vanesa@queridodinero.com = 16118
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
