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
            2022 => "2022",
            2023 => "2023"
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
}
