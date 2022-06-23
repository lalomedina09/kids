@extends('layouts.page')

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/vendor/ejs.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/exercises/dependant.js') }}"></script>
@endpush

@section('page')

<div class="rounded-lg" style="background-image: url('/images/background/orange.png');">
    <div class="exercise__container">
        <div class="text-center mb-5">
            <h2>¿Cuánto gastarán tus dependientes en 10 años?</h2>
        </div>

        <form action="{{ route('exercises.dependant.update') }}" method="post" id="form-exercise" class="form-horizontal">
            @csrf

            <div class="table-responsive">
                <table id="dependant-answers" class="table table-borderless">
                    <col width="10%" />
                    <col width="60%" />
                    <col width="30%" />
                    <thead>
                        <tr>
                            <th></th>
                            <th class="text-center">Dependientes</th>
                            <th class="text-center">Cantidad (Pesos)</th>
                        </tr>
                    </thead>
                    <tbody>
                    @unless(empty($answers))
                        @foreach($answers as $key => $answer)
                            <tr>
                                <td class="text-center">
                                    <span class="fa fa-2x fa-times dependant-answers-remove" title="Quitar dependiente"></span>
                                </td>
                                <td class="text-center">
                                    <input type="text" name="d[{{ $key }}][label]" value="{{ $answer['label'] }}"
                                        class="form-control exercise-answer exercise-answer-text" />
                                </td>
                                <td class="text-center">
                                    <input type="number" name="d[{{ $key }}][amount]" value="{{ $answer['amount'] }}"
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
                <button id="dependant-answers-add" class="btn btn-sm btn-secondary">
                    Agregar dependiente
                </button>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Guardar mis dependientes</button>
                <a class="back" href="{{ route('exercises.dependant.show') }}">Cancelar</a>
                <br><br>
                <a class="back" href="{{ route('exercises.index') }}">Regresar a ejercicios</a>
            </div>
        </form>
    </div>
</div>

@endsection
