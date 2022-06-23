@extends('layouts.email')

@section('email-title', '¡Gracias por acompañarnos!')

@section('email-content')

    <tr>
        <td style="vertical-align:middle;text-align:center;">
            <img src="{{ asset('images/emails/welcome-remember.png') }}" alt="Gracias recordatorio" width="170px">
        </td>

        <td style="vertical-align:middle;text-align:center;">
            <p style="color:#ff6162;font-size:24px;margin-bottom:20px;">
                ¡No nos olvides {{ $fullname }}!
            </p>

            <p style="margin-bottom:20px;">
                Ya no estás suscrito al newsletter de <b>Querido Dinero</b>, pero mantente en contacto en nuestras redes sociales para estar al tanto de nuevas sorpresas que nuestro equipo tiene preparado para este año.
            </p>
        </td>
    </tr>

@endsection
