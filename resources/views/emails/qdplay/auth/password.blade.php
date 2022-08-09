@extends('layouts.qdplay-email')

@section('email-title', 'Restablecer contraseña')

@section('email-content')
    <tr>
        <td colspan=2 style="vertical-align:middle;text-align:center;">
            <p style="margin-bottom:10px;">¡Hola!</p>

            <p style="margin-bottom:10px;">Recibimos una solicitud para restablecer la contraseña de tu cuenta.</p>

            <p style="margin-bottom:40px;">Si solicitaste restablecer tu cuenta, haz clic en el siguiente botón:</p>

            <p style="text-align:center;margin-bottom:40px;">
                <a href="{{ route('password.reset', ['token' => $token]) }}"
                    style="font-weight:bold;color:white;background-color:#ff6161;padding:15px 30px;display:inline-block;text-decoration:none;border-radius:5px;">
                    Restablecer contraseña
                </a>
            </p>

            <p style="margin-bottom:10px;">Si no realizaste esta solicitud, no te preocupes puedes ignorar este mensaje.</p>
        </td>

        <tr height="20px"></tr>
        <tr>
            <td colspan=2 style="border-top:dashed 1px #cccccc;"></td>
        </tr>
        <tr height="20px"></tr>

        <td colspan=2 style="vertical-align:middle;text-align:center;">
            <p style="margin-bottom:10px;">Si tienes problemas dando clic en el botón, copia y pega esta URL en tu navegador:</p>
            <p>{{ route('password.reset', ['token' => $token]) }}</p>
        </td>
    </tr>
@endsection

