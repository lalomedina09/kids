@extends('layouts.page')

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/vendor/ejs.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/exercises/budget.js') }}"></script>
@endpush

@section('page')

<div class="rounded-lg" style="background-image: url('/images/background/red.png');">
    <div class="exercise__container">
        <div class="text-center mb-5">
            <h2>Mi presupuesto mensual</h2>
        </div>

        <form action="{{ route('exercises.budget.update') }}" method="post" id="form-exercise" class="form-horizontal">
            @csrf

            <div class="form-group row">
                <label for="budget_income" class="col-form-label col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">Total de ingresos mensuales:</label>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-6 col-12">
                    <input type="number" name="b[i]" id="budget_income"
                        class="form-control exercise-answer-number"
                        value="{{ array_has($answers,'i') ? $answers['i'] : '' }}"
                        min="1" step="1" />
                </div>
            </div>

            <div class="table-responsive">
                <table id="budget-answers" class="table table-borderless">
                    <col width="10%" />
                    <col width="30%" />
                    <col width="30%" />
                    <col width="30%" />
                    <thead>
                        <tr>
                            <th></th>
                            <th class="text-center">Gastos mensuales</th>
                            <th class="text-center">Tipo</th>
                            <th class="text-center">Cantidad (Pesos)</th>
                        </tr>
                    </thead>
                    <tbody>
                    @unless(empty($answers))
                        @foreach($answers['e'] as $key => $answer)
                            <tr>
                                <td class="text-center">
                                    <span class="fa fa-2x fa-times budget-answers-remove" title="Quitar rubro"></span>
                                </td>
                                <td class="text-center">
                                    <input type="text" name="b[e][{{ $key }}][label]" value="{{ $answer['label'] }}"
                                        class="form-control exercise-answer exercise-answer-text" />
                                </td>
                                <td class="text-center">
                                    <select name="b[e][{{ $key }}][type]"
                                        class="form-control exercise-answer exercise-answer-type">
                                        <option value="saving" {{ ($answer['type'] === 'saving') ? 'selected="selected"' : '' }}>@lang('saving')</option>
                                        <option value="expense" {{ ($answer['type'] === 'expense') ? 'selected="selected"' : '' }}>@lang('expense')</option>
                                        <option value="fixed" {{ ($answer['type'] === 'fixed') ? 'selected="selected"' : '' }}>@lang('fixed')</option>
                                    </select>
                                </td>
                                <td class="text-center">
                                    <input type="number" name="b[e][{{ $key }}][amount]" value="{{ $answer['amount'] }}"
                                        min="1" max="1000000" step="1"
                                        class="form-control exercise-answer exercise-answer-number" />
                                </td>
                            </tr>
                        @endforeach
                    @endunless
                    </tbody>
                </table>
            </div>

            <div class="text-center mb-4">
                <button id="budget-answers-add" class="btn btn-sm btn-secondary">
                    Agregar gasto
                </button>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Guardar mi presupuesto</button>
                <a class="back" href="{{ route('exercises.budget.show') }}">Cancelar</a>
                <br><br>
                <a class="back" href="{{ route('exercises.index') }}">Regresar a ejercicios</a>
            </div>
        </form>
    </div>
</div>

@endsection
