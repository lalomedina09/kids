<?php

namespace App\Http\Controllers;
//prueba de servicio para envio de correo y carga de evento en calendario
use App\Services\CalendarClients\CalendarService;
use Illuminate\Http\Request;
use QD\Advice\Models\Advice;
use App\Models\User;
class TestingController extends Controller
{
    //
    public function dispatchService()
    {
        //Ejemplo para iniciar servicio
        $user = User::where('id', 14542)->first();
        $advice = Advice::where('id', 569)->first();

        $calendar = new CalendarService($advice, $user);
    }
}
