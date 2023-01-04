@extends('layouts.email')

@section('email-title', 'Solicitud de devolucion')

@section('email-content')
    <tr>
        <td colspan=2 style="vertical-align:middle;text-align:center;">
            <p style="margin-bottom:10px; text-align:left;">¡Hola!
                <br>El asesorado <b>{{ $advice->advised->present()->fullname }}</b>
            </p>

            <p style="margin-bottom:10px; text-align:left;">
                {{ $dataNotification['description'] }}
            </p>

            <p style="margin-bottom:10px; text-align:left;">
                La siguiente Orden de compra : <b>{{ $refund->order_id }} </b> esta relacionada a la mentoría que se le solicita la devolución
            </p>

            <p style="text-align:center;margin-bottom:40px;">
                <a href="{{ url('/dashboard/marketplace/orders/'. $refund->order_id) }}"
                    style="font-weight:bold;color:white;background-color:#0e0d0d;padding:15px 30px;display:inline-block;text-decoration:none;border-radius:5px;">
                    Ver orden de compra
                </a>
            </p>
        </td>

        <tr height="20px"></tr>
        <tr>
            <td colspan=2 style="border-top:dashed 1px #cccccc;"></td>
        </tr>
        <tr height="20px"></tr>

    </tr>
@endsection

