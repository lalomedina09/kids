@extends('layouts.email')

@section('email-title', 'Te has suscrito a nuestro newsletter')

@section('email-content')

    <tr>
        <td style="vertical-align:middle;text-align:center;">
            <img src="{{ asset('images/emails/welcome-thanks.png') }}" alt="Gracias imagen" width="150">
        </td>

        <td style="vertical-align:middle;text-align:center;">
            <p style="color:#ff6162;font-size:24px;margin-bottom:20px;">
                ¡Gracias, {{ $fullname }}!
            </p>

            <p>
                Por suscribirte al newsletter de <b>Querido Dinero</b>, a partir de ahora recibirás notificaciones de nuestro equipo, noticias, contenido, artículos y mucho más.
            </p>
        </td>
    </tr>

@endsection
