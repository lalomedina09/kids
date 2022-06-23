@extends('layouts.page')

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/exercises/debt.js') }}"></script>
@endpush

@section('page')

<div class="rounded-lg" style="background-image: url('/images/background/green.png');">
    <div class="exercise__container">
        <div class="text-center mb-5">
            <h2>Mi deuda mensual es:</h2>
        </div>

        <form action="{{ route('exercises.debt.update') }}" method="post" id="form-exercise" class="form-horizontal">
            @csrf

            <div class="table-responsive">
                <table id="budget-answers" class="table table-borderless">
                    <col width="33%" />
                    <col width="33%" />
                    <col width="33%" />
                    <thead>
                        <tr>
                            <th class="text-center">Gastos mensuales</th>
                            <th class="text-center">Cantidad</th>
                            <th class="text-center">Deuda (pesos)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @unless(empty($expenses))
                            @foreach($expenses as $key => $expense)
                                <tr>
                                    <td class="text-center">
                                        <label class="form-label">{{ $expense['label'] }}</label>
                                    </td>
                                    <td class="text-center">
                                        <label class="form-label">@money($expense['amount'])</label>
                                    </td>
                                    <td class="text-center">
                                        <input type="number" name="d[{{ $key }}][amount]"
                                            value="{{ ($answers && array_key_exists($key, $answers)) ? $answers[$key]['amount'] : $expense['amount'] }}"
                                            min="0" max="{{ $expense['amount'] }}" step="1"
                                            class="form-control exercise-answer exercise-answer-number" />
                                    </td>
                                </tr>
                            @endforeach
                        @endunless
                    </tbody>
                </table>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Calcular mi deuda</button>
                <a class="back" href="{{ route('exercises.debt.show') }}">Cancelar</a>
                <br><br>
                <a class="back" href="{{ route('exercises.index') }}">Regresar a ejercicios</a>
            </div>
        </form>
    </div>
</div>

@endsection
