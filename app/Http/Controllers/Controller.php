<?php

namespace App\Http\Controllers;

use App\Models\UserLog;
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
            7 => "Viernes"
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
}
