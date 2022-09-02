@extends('layouts.email')

@section('email-title', 'Estatus del cambio de fecha de tu asesoria')

@section('email-content')
    <tr>
        <td colspan=2 style="vertical-align:middle;text-align:center;">
            <p style="margin-bottom:10px; text-align:left;">¡Hola <b>{{ $dataNotification['advised']->fullname }}</b> !</p>

            <p style="margin-bottom:10px; text-align:left;">
                {{ $dataNotification['description'] }}
            </p>

            <p style="text-align:center;margin-bottom:40px;">
                @if ($newReschedule->status == 4)
                    <a href="{{ url('/perfil#asesorias') }}"
                        style="font-weight:bold;color:white;background-color:#0e0d0d;padding:15px 30px;display:inline-block;text-decoration:none;border-radius:5px;">
                        Ver detalles de asesoría
                    </a>
                @else
                    <a href="{{ url('/perfil#asesorias') }}"
                        style="font-weight:bold;color:white;background-color:#0e0d0d;padding:15px 30px;display:inline-block;text-decoration:none;border-radius:5px;">
                        Solicitar Reembolso
                    </a>
                @endif
            </p>

            <p style="margin-bottom:10px;">
                Recuerda iniciar sesion
            </p>
        </td>

        <tr height="20px"></tr>
        <tr>
            <td colspan=2 style="border-top:dashed 1px #cccccc;"></td>
        </tr>
        <tr height="20px"></tr>

        <td colspan=2 style="vertical-align:middle;text-align:center;">
            <p style="margin-bottom:10px;">Si tienes problemas dando clic en el botón, copia y pega esta URL en tu navegador:</p>
            <p>{{ url('/perfil#asesorias') }}</p>
        </td>
    </tr>
@endsection

