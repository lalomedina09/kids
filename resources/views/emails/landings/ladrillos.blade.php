@extends('layouts.notification')

@section('email-title', 'Nuevo Lead 100 Ladrillos')

@section('email-content')
    <tr>
        <td style="font-size:14px;">
            <p>Hola, recibimos un nuevo lead con la siguiente información:</p>
            <br>
            @foreach ($params as $k=>$i )
                <li>
                    <b>{{$k}}:</b>&nbsp;{{ $i }}
                </li>
            @endforeach
            <br><br>
            <!-- <p style="text-align:center;">Da clic en la siguiente liga para ver los detalles en el panel de administración:</p>
            <br>
            <p style="text-align:center;">
                <a href="{{ route('dashboard.landings.show', ['page'=>'registrofibrax']) }}"
                    style="font-weight:bold;color:white;background-color:#ff6161;padding:15px 30px;display:inline-block;text-decoration:none;border-radius:5px;">
                    Dashboard
                </a>
            </p> -->
            <br><br>
        </td>
    </tr>
@endsection
