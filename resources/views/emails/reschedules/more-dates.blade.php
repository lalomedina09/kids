@extends('layouts.email')

@section('email-title', 'Solicitud de fechas en calendario')

@section('email-content')
    <tr>
        <td colspan=2 style="vertical-align:middle;text-align:center;">
            <p style="margin-bottom:10px; text-align:left;">¡Hola!
                <br>Tu asesorado
                <b>
                    {{ $dataNotification['advised']->name }}
                    {{ $dataNotification['advised']->last_name }}
                </b>
            </p>
            Envío solicitud para que actualices tu calendarío

            <p style="margin-bottom:10px; text-align:left;">
                {{ $dataNotification['description'] }}
            </p>
            <br><br>
            <p style="text-align:center;margin-bottom:40px;">
                <a href="{{ url('/perfil#asesorias') }}"
                    style="font-weight:bold;color:white;background-color:#0e0d0d;padding:15px 30px;display:inline-block;text-decoration:none;border-radius:5px;">
                    Ver detalles de asesoría
                </a>
            </p>
        </td>

        <tr height="20px"></tr>
        <tr>
            <td colspan=2 style="border-top:dashed 1px #cccccc;"></td>
        </tr>
        <tr height="20px"></tr>

    </tr>
@endsection
