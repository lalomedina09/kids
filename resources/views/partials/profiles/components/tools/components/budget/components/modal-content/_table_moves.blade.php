<div class="row line-buttom">
    <div class="col-md-5 mt-3 ml-4 mb-4">
        <img src="{{ asset('images/tools/budget/moves-dark.png') }}" width="25" alt="Movimientos Dark">
        <span class="text-bold"> Movimientos de {{ $nameMonth }}</span>
    </div>
</div>
@if(count($data)>0)
    <!---------  Mostrar esta tabla si se encuentran movimientos ------------->
<div class="my-custom-scrollbar">
    <table class="table">
        <thead>
            <tr>
                <th scope="col" class="text-white" style="font-size: 0.9rem;">#</th>
                <th scope="col" class="text-white" class="text-left" style="font-size: 0.9rem;">Categoría</th>
                <th scope="col" class="text-white" class="text-left" style="font-size: 0.9rem;">Concepto</th>
                <th scope="col" class="text-white" style="font-size: 0.9rem;">Monto Real</th>
                <th scope="col" class="text-white" style="font-size: 0.9rem;">Fecha</th>
            </tr>
        </thead>
        <tbody>
            @php $counter = 1; @endphp
            @foreach ($data as $move)
            <tr class="text-white">
                <td style="font-size: 0.9rem;" scope="row" class="text-white">
                    #{{ $counter++ }}M0{{ $move->id }}
                </td>
                <td class="text-left" style="font-size: 0.9rem;" class="text-white">
                    {{ $move->customCategory->category->name }}
                </td>
                <td class="text-left" style="font-size: 0.9rem;" class="text-white">
                    {{ $move->customCategory->name }}
                </td>
                <td style="font-size: 0.9rem;" class="text-white">
                    @if ($move->type_move == 1)
                        <i class="lni lni-plus" style="font-weight: bold;"></i>
                    @else
                        <i class="lni lni-minus" style="font-weight: bold;"></i>
                    @endif
                    ${{ $move->amount_real }} MXN
                </td>
                <td style="font-size: 0.9rem;" class="text-white">
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
        <p class="text-center mt-5 mb-5" style="font-size:1rem;" class="text-white">
            Aun no tienes movimientos para mostrar, <br>
            comienza a registrar tus
            <a href="#" onclick="activeBudgetSectionMonthMenu('exits');">gastos </a>
            e
            <a href="#" onclick="activeBudgetSectionMonthMenu('entrances');">ingresos. </a>
        </p>
    </div>
@endif
