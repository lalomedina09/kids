@extends('layouts.notification')

@section('email-title', 'Descargable Querido Dinero')

@section('email-content')
    <tr>
        <td style="font-size:14px;">
            <p>Hola {{$params['Nombre']}}, aquí está tu descargable de Querido Dinero:</p>
            <br>
            <br><br>
            <p style="text-align:center;font-weight:bold;color:#000000;">Da clic en la siguiente liga:</p>
            <br>
            <p style="text-align:center;">
                <a href="{{ $link }}"
                    style="font-weight:bold;color:white;background-color:#ff6161;padding:15px 30px;display:inline-block;text-decoration:none;border-radius:5px;">
                    Link
                </a>
            </p>
            <br><br>
        </td>
    </tr>
@endsection
