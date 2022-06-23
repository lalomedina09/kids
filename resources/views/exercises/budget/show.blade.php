@extends('layouts.page')

@section('page')

<div class="rounded-lg" style="background-image: url('/images/background/red.png');">
    <div class="exercise__container text-center">
        <h2 class="mb-5">Mi presupuesto mensual:</h2>

        <h4 class="mb-4">Ingreso mensual: @money($budget['income'])</h4>

        <div id="budget" class="mb-4">
            <h4 class="font-weight-bold">
                Fijos:
                {{ $budget['fixed']['percentage'] }} %
                (@money($budget['fixed']['total']))
            </h4>

            <h4 class="font-weight-bold">
                Gustos:
                {{ $budget['expenses']['percentage'] }} %
                (@money($budget['expenses']['total']))
            </h4>

            <h4 class="font-weight-bold">
                Ahorro:
                {{ $budget['savings']['percentage'] }} %
                (@money($budget['savings']['total'] ))
            </h4>
        </div>

        <h4 class="mb-4">
            @if ($budget['diff'] > 0)
                ¡Felicidades! Te quedan @money($budget['diff']) para ahorrar
            @elseif ($budget['diff'] === 0)

            @else
                ¡Cuidado! Tus gastos sobrepasan tus ingresos
            @endif
        </h4>

        <div class="mb-4">
            <a class="back" data-toggle="collapse" href="#collapse-budget">Ver detalle</a>
        </div>

        <div id="collapse-budget" class="collapse mb-4">
            <div class="table-responsive">
                <table class="table table-borderless">
                    <col width="33%" />
                    <col width="33%" />
                    <col width="33%" />
                    <thead>
                        <tr>
                            <th>Gasto</th>
                            <th>Tipo</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($answers as $key => $answer)
                            <tr>
                                <td class="align-middle">
                                    <span>{{ $answer['label'] }}</span>
                                </td>
                                <td class="align-middle">
                                    <span>@lang($answer['type'])</span>
                                </td>
                                <td class="align-middle">
                                    <span>@money($answer['amount'])</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <a href="{{ route('exercises.budget.edit') }}" class="btn btn-primary">Modificar mi presupuesto</a>
        <br><br>
        <a class="back" href="{{ route('exercises.index') }}">Regresar a ejercicios</a>
    </div>
</div>

@endsection
