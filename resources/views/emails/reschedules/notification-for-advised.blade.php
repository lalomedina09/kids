@extends('layouts.email')

@section('email-title', 'Solicitud para Re - agendar mentoría')

@section('email-content')
    <tr>
        <td colspan=2 style="vertical-align:middle;text-align:center;">
            <p style="margin-bottom:10px; text-align:left;">¡Hola <b>{{ $dataNotification['advised']->fullname }}</b> !</p>

            <p style="margin-bottom:10px; text-align:left;">
                Tu mentor <b>{{ $user->fullname }}</b>
                <br><br>
                Te invita a reagendar la mentoría ya que por el siguiente motivo no estare disponible en la fecha
                que se tenía contemplada.

                <br>
                El motivo para reagendar la mentoría es el siguiente
                {{ $newReschedule->description }}
            </p>

            <p style="margin-bottom:40px;">
                Ingresa a la plataforma para que elijas la nueva fecha y hora.
                <br>
                Si por algun motivo ya no te interesa tomar la mentoría solicita tu reembolso.
            </p>

            <p style="text-align:center;margin-bottom:40px;">
                <a href="{{ url('/perfil#asesorias') }}"
                    style="font-weight:bold;color:white;background-color:#0e0d0d;padding:15px 30px;display:inline-block;text-decoration:none;border-radius:5px;">
                    Elige la nueva fecha y hora
                </a>

                <a href="{{ url('/perfil#asesorias') }}"
                    style="font-weight:bold;color:white;background-color:#0e0d0d;padding:15px 30px;display:inline-block;text-decoration:none;border-radius:5px;">
                    Solicitar Reembolso
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

