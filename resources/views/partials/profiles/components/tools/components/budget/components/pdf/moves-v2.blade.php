@extends('layouts.pdf-tool-budget')

@section('title', 'Movimientos')

@section('content')
<style>
    table.tb {
        width: 300px;
        border-collapse: collapse;
    }
    .tb th, .tb td {
        border: solid 1px #777;
        padding: 5px;
    }

    table.tbmoves {
        width: 100%;
        border-collapse: collapse;
    }
    .tbmoves th, .tbmoves td {
        border-bottom: solid 1px #1f1e1e;
        /*padding: 3px;*/
    }
</style>

<table>
    <tr>
        <td class="header" colspan="6" valign="middle" style="font-size:20px;">
            Movimientos de {{ getMonthSpanish($month) }} - {{ $year }}
        </td>
    </tr>

    <tr>
        <td colspan="6">
            <table>
                <tr>
                    <td valign="middle" width="40%" style="text-align:left;">
                        <p style="font-size:13px;">Nombre</p>
                        <p class="strong" style="font-size:13px;">{{ $user->fullname }}</p>
                    </td>
                    <td valign="middle" width="40%" style="text-align:left;">
                        <p style="font-size:13px;">Correo</p>
                        <p class="strong" style="font-size:13px;">{{ $user->email }}</p>
                    </td>
                    <td valign="middle" width="20%" style="text-align:left;">
                        <p style="font-size:13px;">Teléfono</p>
                        <p class="strong" style="font-size:13px;">
                            {{ $user->getMeta('blog', 'whatsapp') }}
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="6">
            <table class="tbmoves">
                <thead>
                    <tr class="" style="background-color:#000; color:#fff;">
                        <th scope="col" class="text-left" style="font-size: 0.9rem; color:#fff; text-align: left;">Clave</th>
                        <th scope="col" class="text-left" style="font-size: 0.9rem; color:#fff; text-align: left;">Movimiento</th>
                        <th scope="col" class="text-left" style="font-size: 0.9rem; color:#fff; text-align: left;">Categoría</th>
                        <th scope="col" class="text-left" style="font-size: 0.9rem; color:#fff; text-align: left;">Concepto</th>
                        <th scope="col" style="font-size: 0.9rem; color:#fff; text-align: left;">Fecha</th>
                        <th scope="col" style="font-size: 0.9rem; color:#fff; text-align: left;">Monto</th>
                    </tr>
                </thead>
                <tbody>
                    @php $counter = 1; @endphp
                    @foreach ($moves as $move)
                    <tr class="" style="border-bottom:1pt solid black; margin-bottom: 5px;">
                        <td class="text-left " style="font-size: 0.9rem;" scope="row">
                            #{{ $counter++ }}M0{{ $move->id }}
                        </td>
                        <td class="text-left " style="font-size: 0.9rem;">
                            @if ($move->type_move == 1)
                                Entrada
                            @else
                                Salida
                            @endif
                        </td>
                        <td class="text-left " style="font-size: 0.9rem;font-weight: bold;">
                            @if ($move->customCategory)
                                {{ $move->customCategory->name }}
                            @endif
                        </td>
                        <td class="text-left " style="font-size: 0.9rem;">
                            {{ $move->name }}
                        </td>
                        <td class="" style="font-size: 0.7rem;">
                            {{ fechaEspanol($move->created_at)}}
                        </td>
                        <td class="" style="font-size: 0.9rem;">
                            ${{ $move->amount_real }}
                            <span style="font-size: 0.5rem;">MXN</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </td>
    </tr>

</table>

@stop

