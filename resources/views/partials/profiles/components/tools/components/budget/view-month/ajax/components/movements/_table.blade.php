{{--dd($data['movements']->get(), 'entrentrentre')--}}
@if(count($data['movements'])>0)
    <!---------  Mostrar esta tabla si se encuentran movimientos ------------->
<div class="my-custom-scrollbar">
    <table class="table">
        <thead>
            <tr>
                <th scope="col" style="font-size: 0.9rem;">#</th>
                <th scope="col" class="text-left" style="font-size: 0.9rem;">Movimiento</th>
                <th scope="col" class="text-left" style="font-size: 0.9rem;">Categoría</th>
                <th scope="col" class="text-left" style="font-size: 0.9rem;">Concepto</th>
                <th scope="col" style="font-size: 0.9rem;">Monto Real</th>
                <th scope="col" style="font-size: 0.9rem;">Fecha</th>
            </tr>
        </thead>
        <tbody>
            @php $counter = 1; @endphp
            @foreach ($data['movements'] as $move)
            <tr>
                <td style="font-size: 0.9rem;" scope="row">
                    #{{ $counter++ }}M0{{ $move->id }}
                </td>
                <td class="text-left" style="font-size: 0.9rem;">
                    @if ($move->type_move == 1)
                        Entrada
                    @else
                        Salida
                    @endif
                </td>
                <td class="text-left" style="font-size: 0.9rem;font-weight: bold;">
                    @if ($move->customCategory)
                        {{ $move->customCategory->name }}
                    @endif
                </td>
                <td class="text-left" style="font-size: 0.9rem;">
                    {{ $move->name }}
                </td>
                <td style="font-size: 0.9rem;">
                    ${{ $move->amount_real }}
                    <span style="font-size: 0.5rem;">MXN</span>
                </td>
                <td style="font-size: 0.7rem;">
                    {{ fechaEspanol($move->created_at)}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
    <!------------  Div para notificar que no existen movimientos mayores a zero---------->
    <div>
        <p class="text-center mt-5 mb-5" style="font-size:1rem;">
            Aun no tienes movimientos para mostrar, <br>
            comienza a registrar tus
            <a href="#" onclick="activeBudgetSectionMonthMenu('exits');">gastos </a>
            e
            <a href="#" onclick="activeBudgetSectionMonthMenu('entrances');">ingresos. </a>
        </p>
    </div>
@endif
