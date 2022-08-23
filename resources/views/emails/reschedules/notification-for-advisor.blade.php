@extends('layouts.email')

@section('email-title', 'Solicitud para Re - agendar asesoria')

@section('email-content')
    <tr>
        <td colspan=2 style="vertical-align:middle;text-align:center;">
            <p style="margin-bottom:10px; text-align:left;">¡Hola <b>{{ $dataNotification['advisor']->fullname }}</b> !</p>

            <p style="margin-bottom:10px; text-align:left;">
                Tu cliente <b>{{ $user->fullname }}</b>
                <br><br>
                Solicito reagendar la asesoria a la nueva fecha {{ $newReschedule->new_date }}

                <br>
                El motivo para reagendar la asesoria es el siguiente
                {{ $newReschedule->description }}
            </p>

            <p style="margin-bottom:40px;">
                Ingresa a la plataforma para que tengas mas detalles sobre la nueva fecha que eligio tu cliente para
                tomar la asesoria. Si por algun motivo no puedes brindar la asesoria procede a rechazar y proceder con
                el reembolso de la misma.
            </p>

            <p style="text-align:center;margin-bottom:40px;">
                <a href="{{ url('/perfil#asesorias') }}"
                    style="font-weight:bold;color:white;background-color:#0e0d0d;padding:15px 30px;display:inline-block;text-decoration:none;border-radius:5px;">
                    Ver Solicitud
                </a>
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

