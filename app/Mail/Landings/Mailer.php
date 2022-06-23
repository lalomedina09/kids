<?php

namespace App\Mail\Landings;

use Mail;

class Mailer
{

    /**
     * Send registration email
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Course  $course
     * @param  string  $registration_url
     * @return void
     */
    public static function sendLeadFibrax($params)
    {
        Mail::send(new Fibrax($params));
    }
    public static function sendLeadMplan($params)
    {
        Mail::send(new Mplan($params));
    }
    public static function sendLeadLadrillos($params)
    {
        Mail::send(new Ladrillos($params));
    }
    public static function sendLeadNube($params)
    {
        Mail::send(new Nube($params));
    }
    public static function sendLeadGarbi($params)
    {
        Mail::send(new Garbi($params));
    }
    public static function sendLeadBecas($params)
    {
        Mail::send(new Becas($params));
    }
    public static function sendLinkInversiones($params)
    {
        Mail::send(new Inversiones($params));
    }
    public static function sendLinkParejas($params)
    {
        Mail::send(new Parejas($params));
    }
    public static function sendLinkImpuestos($params)
    {
        Mail::send(new Impuestos($params));
    }
    public static function sendLinkPersonales($params)
    {
        Mail::send(new Personales($params));
    }
     public static function sendLinkColombia($params)
    {
        Mail::send(new Colombia($params));
    }

}
