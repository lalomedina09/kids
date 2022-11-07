@extends('layouts.email')

@section('email-title', 'Notificacion de devolucion')

@section('email-content')
    <tr>
        <td colspan=2 style="vertical-align:middle;text-align:center;">
            <p style="margin-bottom:10px; text-align:left;">¡Hola!
                <br>El asesorado <b>{{ $advice->advised->present()->fullname }}</b>
            </p>

            <p style="margin-bottom:10px; text-align:left;">
                Tu asesorado solicito la devolucion de la asesoría
                y por lo tanto se cancelo el evento, para cualquier aclaracion
                contacto al equipo de Querido Dinero Miriam@queridodinero.com
            </p>
        </td>

        <tr height="20px"></tr>
        <tr>
            <td colspan=2 style="border-top:dashed 1px #cccccc;"></td>
        </tr>
        <tr height="20px"></tr>

    </tr>
@endsection
