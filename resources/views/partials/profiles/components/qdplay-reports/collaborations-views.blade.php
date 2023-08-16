@extends('layouts.pdf-qdplay-reports')

@section('title', 'Movimientos')

@section('content')
<div style="width: 700px;" class="backgrounds-principal">
aqui va el encabezado
</div>

<table width="700px" border="0" cellpadding="0" cellspacing="0" style="" class="backgrounds-principal">
    <tr>
        <td>
            <img src="{{ asset('/etapa1/imagenes recibo 10.png') }}" alt="QD Play" width="70" />
        </td>
    </tr>
    <tr style="height: 20px;"></tr>
    <tr>
        <td style="font-size: 1em; font-weight: bold;">
            Reporte de vistas por colaborador
        </td>
    </tr>

    <tr style="height: 20px;"></tr>
    <tr>
        <td style="">
            <!--Generado: 15 de agosto de 2023-->
        </td>
    </tr>
    <tr style="height: 20px;"></tr>
    <tr>
        <td class="renglon-verde-superior" style="">
            <!--Detalle de vistas-->
            <br>
            <br>
        </td>
    </tr>
    <tr style="height: 20px;"></tr>
    <tr>
        <td style="">
            <span style="text-transform: uppercase; font-weight: bold;">Administrador:</span>
            {{ $user->fullname }}
        </td>
    </tr>
    <tr style="height: 20px;"></tr>
    <tr>
        <td>
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="concepts" style="text-align: left;">
                <thead>
                    <tr>
                        <th>Num</th>
                        <th>Colaborador</th>
                        <th>Usuario</th>
                        <th>Curso</th>
                        <th>Vistas</th>
                    </tr>
                </thead>
                <tbody>
                    @php $contador = 1; $total = 0; @endphp
                    @foreach ($result as $item)
                    <tr>
                        <td style="text-transform: none;"><b>{{ $contador++ }}</b></td>
                        <td style="text-transform: capitalize;">{{ $item->user }} {{ $item->last_name }}</td>
                        <td style="text-transform: lowercase;">{{ $item->email }}</td>
                        <td style="text-transform: capitalize;">{{ $item->name }}</td>
                        <td style="text-align: center;"><b>{{ $item->total_views }}</b></td>
                    </tr>
                    @php $total += $item->total_views; @endphp
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4" style="text-align:right; text-transform: none;">TOTAL: </th>
                        <td><b>{{ $total }}</b></td>
                    </tr>
                </tfoot>
            </table>
        </td>
    </tr>
    <tr style="height: 20px;"></tr>
    <tr>
        <td class="renglon-verde-azul" style="">
            {{--Pagado el, <span style="font-weight: bold;">
                fecha--}}
            </span>
        </td>
    </tr>
    <tr style="height: 20px;"></tr>
    <tr>
        <td style="text-transform: uppercase; font-weight: bold;">
            ¿Tienes alguna duda?
        </td>
    </tr>
    <tr style="height: 20px;"></tr>
    <tr>
        <td style="text-transform: none;">
            Comunicate con nosotros:
        </td>
    </tr>
    <tr style="height: 20px;"></tr>
    <tr>
        <td style="text-transform: none;">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td>
                        <img src="{{ asset('/etapa1/imagenes recibo 13.png')}}" alt="" width="25" style="margin-bottom: -5px;" />
                        <b>Monterrey: </b>
                        <a href="tel:{{ config('money.phone.mty') }}">{{ config('money.phone.mty') }}</a>
                    </td>
                    <td>
                        <img src="{{ asset('/etapa1/imagenes recibo 11.png')}}" alt="" width="25" style="margin-bottom: -5px;" />
                        <a href="mailto:hola@queridodinero.com">hola@<b>queridodinero</b>.com</a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr style="height: 20px;"></tr>
    <tr>
        <td style="text-transform: uppercase; font-weight: bold;">
            Redes sociales:
        </td>
    </tr>
    <tr style="height: 20px;"></tr>
    <tr>
        <td style="text-transform: none;">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td>
                        <img src="{{ asset('/etapa1/imagenes recibo 07.png')}}" alt="" width="25" style="margin-bottom: -5px;" />
                        <a href="https://www.facebook.com/queridodinero/">Querido Dinero</a>
                    </td>
                    <td>
                        <img src="{{ asset('/etapa1/imagenes recibo 14.png')}}" alt="" width="25" style="margin-bottom: -5px;" />
                        <a href="https://twitter.com/querido_dinero">@querido_dinero</a>
                    </td>
                    <td>
                        <img src="{{ asset('/etapa1/imagenes recibo 12.png')}}" alt="" width="25" style="margin-bottom: -5px;" />
                        <a href="https://www.tiktok.com/@querido_dinero">@querido_dinero</a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr style="height: 20px;"></tr>
    <tr>
        <td style="text-transform: none; border-top: 1px solid black; background-color: #f1f1f1; padding: 10px;">
            <b>Horarios de atención:</b> 09:00 a 14:00 hrs y de 15:00 a 16:30 hrs
        </td>
    </tr>
    <tr>
        <td style="height: 250px; vertical-align: bottom; text-transform: none;">
            <a href="https://www.queridodinero.com/" style="font-style: italic;">www.<b>queridodinero</b>.com</a>
        </td>
    </tr>
</table>
<br><br>
<div class="renglon-verde-azul">
    <p>
        texto y mas texto
    </p>
</div>
@endsection

