@extends('layouts.email')

@section('email-title', 'Notificacion Coach no ofrecio reagendar')

@section('email-content')
    <tr>
        <td colspan=2 style="vertical-align:middle;text-align:center;">
            <p style="margin-bottom:10px; text-align:left;">¡Hola!</p>

            <p style="margin-bottom:10px; text-align:left;">
                El coach <b> {{ $advice->advisor->fullname }} </b>:
                solicito <b>no reagendar</b> la asesoria a su asesorado <b>{{ $advice->advised->fullname }}</b>
                que estaba programada para <b>{{ $advice->present()->given_at }}</b>
            </p>

            <p style="margin-bottom:10px; text-align:left;">
                Mensaje del coach: <br>
                {{ $dataNotification['description'] }}
            </p>
        </td>

        <tr height="20px"></tr>
        <tr>
            <td colspan=2 style="border-top:dashed 1px #cccccc;"></td>
        </tr>
        <tr height="20px"></tr>
    </tr>
@endsection

