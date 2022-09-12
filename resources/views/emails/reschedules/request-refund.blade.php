@extends('layouts.email')

@section('email-title', 'Solicitud de devolucion')

@section('email-content')
    <tr>
        <td colspan=2 style="vertical-align:middle;text-align:center;">
            <p style="margin-bottom:10px; text-align:left;">¡Hola!
                <br>el asesorado {{ $advice->advised->present()->fullname }}
            </p>

            <p style="margin-bottom:10px; text-align:left;">
                {{ $dataNotification['description'] }}
            </p>

            <p style="text-align:center;margin-bottom:40px;">
                <a href="{{ url('/perfil#asesorias') }}"
                    style="font-weight:bold;color:white;background-color:#0e0d0d;padding:15px 30px;display:inline-block;text-decoration:none;border-radius:5px;">
                    Ir a mi perfil
                </a>
            </p>

        </td>

        <tr height="20px"></tr>
        <tr>
            <td colspan=2 style="border-top:dashed 1px #cccccc;"></td>
        </tr>
        <tr height="20px"></tr>

        <!--<td colspan=2 style="vertical-align:middle;text-align:center;">
            <p style="margin-bottom:10px;">Si tienes problemas dando clic en el botón, copia y pega esta URL en tu navegador:</p>
            <p>{{ url('/perfil#asesorias') }}</p>
        </td>-->
    </tr>
@endsection

