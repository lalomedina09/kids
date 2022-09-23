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
        //Inicializamos el servicio
        $advice = Advice::where('id', 569)->first();
        #dd($advice->duration);
        #dd($advice->advised->email);

        $calendar = new CalendarService($advice);
    }
}
