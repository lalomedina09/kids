@if(count($moves)>0)
    <!---------  Mostrar esta tabla si se encuentran movimientos ------------->
    <table class="table">
        <thead>
            <tr>
                <th scope="col" style="font-size: 0.9rem;">#</th>
                <th scope="col" style="font-size: 0.9rem;">Concepto</th>
                <th scope="col" style="font-size: 0.9rem;">Monto Real</th>
                <th scope="col" style="font-size: 0.9rem;">Fecha</th>
            </tr>
        </thead>
        <tbody>
            @php $counter = 1; @endphp
            @foreach ($moves as $move)
            <tr>
                <th style="font-size: 0.9rem;" scope="row">{{ $counter++ }}</th>
                <td style="font-size: 0.9rem;">{{ $move->customCategory->name }}</td>
                <td style="font-size: 0.9rem;">
                    @if ($move->type_move == 1)
                        <i class="lni lni-plus" style="font-weight: bold;"></i>
                    @else
                        <i class="lni lni-minus" style="font-weight: bold;"></i>
                    @endif
                    ${{ $move->amount_real }} MXN
                </td>
                <td style="font-size: 0.9rem;">{{ customDateSpanish($move->updated_at)}}</td>
                <!--10 - Abr - 2023-->
            </tr>
            @endforeach
        </tbody>
    </table>
@else
    <!------------  Div para mostrar mensaje donde no hay movimientos que se deben mostrar---------->
    <div>
        <p class="text-center mt-5 mb-5">
            No tienes movimientos para mostrar, comienza a registrar tus gastos e ingresos.
        </p>
    </div>
@endif
