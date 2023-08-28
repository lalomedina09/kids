@extends('layouts.pdf-qdplay-reports-v2')

@section('title', 'Progreso de colaboradores')

@section('content')
    <span style="text-transform: uppercase; font-weight: bold;">Reporte:</span> Progreso de los colaboradores
    <br>
    <span style="text-transform: uppercase; font-weight: bold;">Administrador:</span> {{ $user->fullname }}
    <br>
    <span style="text-transform: uppercase; font-weight: bold;">Generado:</span> {{ $now->format('Y-m-d g:i A') }}

    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="concepts" style="text-align: left; ">
        <thead>
            <tr>
                    <th>#</th>
                    {{--<th>@lang('Administrator')</th>--}}
                    {{--<th>@lang('Admin')</th>--}}
                    {{--<th>@lang('User ID')</th>--}}
                    <th>@lang('Full name')</th>
                    <th>@lang('Email')</th>
                    <th>@lang('Course')</th>
                    <th>@lang('Course duration')</th>
                    <th>@lang('Minutes watched')</th>
                    <th>@lang('Advance percentage')</th>
                </tr>
        </thead>
        <tbody>
            @php $contador = 1; $total = 0; $i=0; @endphp
            @foreach ($result as $item)
            @php
                $i++;
                $duration = getDurationForCourse($item->course_id);
            @endphp

            <tr class="@if($i % 22 == 0) page-break @endif">
                <td style="text-transform: none;">{{ $contador++ }}</td>
                {{--<td>{{ $item->administrador }}</td>--}}
                {{--<td style="text-transform: capitalize;">{{ getNameUser($item->administrador) }}</td>--}}
                {{--<td>{{ $item->user_id }}</td>--}}
                <td style="text-transform: capitalize;">{{ $item->nombre_completo }}</td>
                <td style="text-transform: lowercase;">{{ $item->email }}</td>
                <td style="text-transform: capitalize;">{{ $item->curso }}</td>
                <td>{{ number_format($duration,2) }} Min</td>
                <td>{{ number_format($item->min_vistos,2) }} Min</td>
                <td>
                    @php
                        $getPorcent = (($item->min_vistos * 100)/$duration);
                        $avance = ($getPorcent>99) ? 100 : $getPorcent;
                    @endphp
                    {{ number_format($avance,2) }}%
                </td>
            </tr>
            @php
                $total += $item->min_vistos;
            @endphp
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="6" style="text-align:right; text-transform: none;">TOTAL MINUTOS VISTOS: </th>
                <td><b>{{ number_format($total,2) }}</b></td>
            </tr>
        </tfoot>
    </table>
@endsection
