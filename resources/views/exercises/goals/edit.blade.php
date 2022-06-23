@extends('layouts.page')

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/vendor/ejs.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/exercises/goals.js') }}"></script>
@endpush

@section('page')

<div class="rounded-lg" style="background-image: url('/images/background/blue.png');">
    <div class="exercise__container">
        <div class="text-center mb-4">
            <h2>Define tus metas</h2>
        </div>

        <form action="{{ route('exercises.goals.update') }}" method="post" id="form-exercise">
            @csrf

            <div class="table-responsive mb-4">
                <table id="goal-answers" class="table table-borderless">
                    <col width="10%" />
                    <col width="30%" />
                    <col width="30%" />
                    <col width="30%" />
                    <thead>
                        <tr>
                            <th></th>
                            <th class="text-center">Meta</th>
                            <th class="text-center">Tiempo</th>
                            <th class="text-center">Costo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @unless(empty($answers))
                            @foreach($answers as $key => $answer)
                                <tr>
                                    <td class="text-center">
                                        <span class="fa fa-2x fa-times goal-answers-remove" title="Quitar rubro"></span>
                                    </td>
                                    <td class="text-center">
                                        <textarea name="m[{{ $key }}][m]"
                                            class="form-control exercise-answer exercise-answer-text"
                                            rows="3">{{ (array_has($answer, 'm')) ? $answer['m']: '' }}</textarea>
                                    </td>
                                    <td class="text-center">
                                        <input type="number" name="m[{{ $key }}][t]"
                                            class="form-control exercise-answer exercise-answer-number"
                                            value="{{ (array_has($answer, 't')) ? $answer['t']: '' }}"
                                            min="1" step="1">
                                        <p>meses</p>
                                    </td>
                                    <td class="text-center">
                                        <input type="number" name="m[{{ $key }}][c]"
                                            class="form-control exercise-answer exercise-answer-number"
                                            value="{{ (array_has($answer, 'c')) ? $answer['c']: '' }}"
                                            min="1" step="1">
                                        <p>pesos</p>
                                    </td>
                                </tr>
                            @endforeach
                        @endunless
                    </tbody>
                </table>
            </div>


            <div class="text-center mb-4">
                <button id="goal-answers-add" class="btn btn-sm btn-secondary">
                    Agregar meta
                </button>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Guardar mis metas</button>
                <a class="back" href="{{ route('exercises.goals.show') }}">Cancelar</a>
                <br><br>
                <a class="back" href="{{ route('exercises.index') }}">Regresar a ejercicios</a>
            </div>
        </form>
    </div>
</div>

@endsection
