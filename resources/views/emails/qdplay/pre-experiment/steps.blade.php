@extends('layouts.qdplay-email')

@section('email-title', 'Restablecer contraseña')

@section('email-content')
    <tr>
        <td colspan=2 style="vertical-align:middle;text-align:center;">
            <p style="margin-bottom:10px;">¡Hola {{ $user->name }}!</p>

            <p style="margin-bottom:10px;">Muchas gracias por tu compra.</p>

            <p style="margin-bottom:40px;">
                ¡Empieza a aprender!
            </p>

            <p style="text-align:center;margin-bottom:40px;">
                <a href="{{ url('/qdplay') }}"
                    style="font-weight:bold;color:white;background-color:#0e0d0d;padding:15px 30px;display:inline-block;text-decoration:none;border-radius:5px;">
                    Ver cursos
                </a>
            </p>

            <p style="margin-bottom:10px;">
                Recuerda que para poder visualizar los cursos, debes tener iniciada tu sesión en queridodinero.com
            </p>
        </td>

        <tr height="20px"></tr>
        <tr>
            <td colspan=2 style="border-top:dashed 1px #cccccc;"></td>
        </tr>
        <tr height="20px"></tr>

        <td colspan=2 style="vertical-align:middle;text-align:center;">
            <p style="margin-bottom:10px;">Si tienes problemas dando clic en el botón, copia y pega esta URL en tu navegador:</p>
            <p>{{ url('/qdplay') }}</p>
        </td>
    </tr>
@endsection

