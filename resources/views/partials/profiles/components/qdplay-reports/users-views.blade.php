@extends('layouts.pdf-qdplay-reports-v2')

@section('title', 'Movimientos')

@section('content')
    <span style="text-transform: uppercase; font-weight: bold;">Reporte:</span> Vistas de los colaboradores
    <br>
    <span style="text-transform: uppercase; font-weight: bold;">Administrador:</span> {{ $user->fullname }}
    <br>
    <span style="text-transform: uppercase; font-weight: bold;">Generado:</span> {{ $now->format('Y-m-d g:i A') }}

    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="concepts" style="text-align: left; ">
        <thead>
            <tr>
                <th style="text-align: left;">#</th>
                <th style="text-align: left;">Colaborador</th>
                <th style="text-align: left;">Usuario</th>
                <th style="text-align: left;">Curso</th>
                <th style="text-align: left;">Vistas</th>
            </tr>
        </thead>
        <tbody>
            @php $contador = 1; $total = 0; $i=0; @endphp
            @foreach ($result as $item)
            @php $i++; @endphp
            <tr class="@if($i % 22 == 0) page-break @endif">
                <td style="text-transform: none;">{{ $contador++ }}</td>
                <td style="text-transform: capitalize;">{{ $item->user }} {{ $item->last_name }}</td>
                <td style="text-transform: lowercase;">{{ $item->email }}</td>
                <td style="text-transform: capitalize;">{{ $item->name }}</td>
                <td style="text-align: center;"><b>{{ $item->total_views }}</b></td>
            </tr>
            @php
                $total += $item->total_views;

            @endphp
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="4" style="text-align:right; text-transform: none;">TOTAL: </th>
                <td><b>{{ $total }}</b></td>
            </tr>
        </tfoot>
    </table>
@endsection
