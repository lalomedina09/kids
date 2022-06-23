@extends('layouts.email')

@section('email-title', 'Confirmación de registro en línea')

@section('email-content')
    <tr>
        <td style="font-size:14px;">
            <p>Hola <b>{{ $user->present()->fullname }}</b>, recibimos tu pago para el siguiente registro en línea:</p>

            <br>

            <li>
                <b>@lang('Course'):</b>&nbsp;{{ $course->title }} {{ $course->subtitle }}
            </li>
            <li>
                <b>@lang('Date'):</b>&nbsp;{{ $course->present()->readable_event_date }}
            </li>

            <br><br>

            <p style="text-align:center;">Tú liga de acceso es la siguiente, <b>recuerda que es única y no debes compartirla con nadie</b>:</p>
            <br>
            <p style="text-align:center;">
                <a href="{{ $registration_url }}"
                    style="font-weight:bold;color:white;background-color:#ff6161;padding:15px 30px;display:inline-block;text-decoration:none;border-radius:5px;">
                    Da clic aquí para unirte
                </a>
            </p>
            @if ($course->webinar_password)
                <br>
                <p style="text-align: center;"><b>Código de acceso:</b> {{ $course->webinar_password }}</p>
            @endif
            <br><br>
            <p style="font-size:12px;">El envío de estos correos es automático, puedes recibir uno o más correos adicionales de confirmación y/o recordatorios.</p>
        </td>
    </tr>
@endsection
