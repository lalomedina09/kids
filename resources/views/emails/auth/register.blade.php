@extends('layouts.email')

@section('email-title', '¡BIENVENIDO!')

@section('email-content')

    <tr>
        <td colspan=2 style="vertical-align:middle;text-align:center;">
            <p style="color:#ff6162;font-size:28px;font-weight:bold;margin-bottom:20px;">
                ¡Hola {{ $user->present()->fullname }}!
            </p>

            <p>
                Bienvenid@ a nuestra comunidad financiera.
            </p>
        </td>
    </tr>

    <tr height="50px"></tr>

    <tr>
        <td style="vertical-align:middle;text-align:center;">
            <p style="color:#ff6162;font-size:24px;margin-bottom:20px;">
                Mi perfil
            </p>

            <p style="margin-bottom:20px;">
                Tendrás acceso a un perfil personal donde podrás actualizar tus datos y decidir qué es lo que quieres leer primero de acuerdo a tus intereses.
            </p>

            <a href="{{ route('profile.edit') }}" style="color:#ff6162;">CONOCE MÁS</a>
        </td>

        <td style="vertical-align:middle;text-align:center;">
            <img src="{{ asset('images/emails/welcome-account.png') }}" alt="Gracias recordatorio" width="230">
        </td>
    </tr>

    <tr height="50px"></tr>

    <tr>
        <td colspan=2 style="vertical-align:middle;text-align:center;">
            <p style="font-size:28px;font-weight: bold;margin-bottom:20px;">
                ¡Gracias por formar parte de nuestra comunidad!
            </p>

            <p style="color: #ff6162;">
                EQUIPO QUERIDO DINERO
            </p>
        </td>
    </tr>

@endsection
