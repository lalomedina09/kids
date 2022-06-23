@extends('layouts.notification')

@section('email-title', 'Ocurrió un problema al registrar un usuario al taller o streaming en línea')

@section('email-content')
    <tr>
        <td style="font-size:14px;">
            <p><b>Detalles</b></p>
            <ul>
                <li>
                    <b>@lang('User'):</b>&nbsp;{{ $user->present()->fullname }}
                </li>
                <li>
                    <b>@lang('Email'):</b>&nbsp;{{ $user->email }}
                </li>
                <li>
                    <b>@lang('Course'):</b>&nbsp;{{ $course->title }} {{ $course->subtitle }}
                </li>
                <li>
                    <b>@lang('Date'):</b>&nbsp;{{ $course->present()->readable_event_date }}
                </li>
            </ul>

            <p>Se recibió el pago del taller o streaming en línea y se intentó registrar al usuario automáticamente, pero ocurrió un problema:</p>
            <br>
            <p><b>{{ $error_message }}</b></p>
        </td>
    </tr>
@endsection
