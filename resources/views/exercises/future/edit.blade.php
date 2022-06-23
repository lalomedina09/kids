@extends('layouts.page')

@push('styles-inline')
    <style>
        input {
            background-color: transparent;
            border-radius: 0;
            border: none;
            border-bottom: 1px solid #000;
            color: #000;
            outline: none;
            padding: 2px 10px;
            width: 150px;
        }
    </style>
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/exercises/future.js') }}"></script>
@endpush

@section('page')

<div class="rounded-lg" style="background-image: url('/images/background/orange.png');">
    <div class="exercise__container">
        <div class="text-center mb-4">
            <h2>¿Cómo te ves en el futuro?</h2>
        </div>

        <form action="{{ route('exercises.future.update') }}" method="post" id="form-exercise">
            @csrf

            <p class="font-weight-bold mb-4">
                QUERID@ <span class="d-inline"><input type="text" name="f[0]" value="{{ (array_has($answers, 0)) ? $answers[0] : '' }}"></span> DEL FUTURO:<br>
                SOY YO, OSEA TÚ. HOY QUE ESTÁS JUBILADO, Y TIENES <span class="d-inline"><input type="number" name="f[1]" value="{{ (array_has($answers, 1)) ? $answers[1] : '' }}" min="1" max="100" step="1"></span> AÑOS,
                ME DA GUSTO SABER QUE VIVES EN <span class="d-inline"><input type="text" name="f[2]" value="{{ (array_has($answers, 2)) ? $answers[2] : '' }}"></span>
                Y QUE AHORA TE DEDICAS A <span class="d-inline"><input type="text" name="f[3]" value="{{ (array_has($answers, 3)) ? $answers[3] : '' }}"></span>
                TODO EL DÍA.<br>
                DESDE LA EDAD DE <span class="d-inline"><input type="number" name="f[4]" value="{{ (array_has($answers, 4)) ? $answers[4] : '' }}" min="1" max="100" step="1"></span>
                AÑOS EMPECÉ A INVERTIR PARA QUE TE ALIVIANES Y TE DEDIQUES A SER UN(A) VIEJIT@ BUENA ONDA MIENTRAS TODOS LOS DEMÁS
                TRABAJAN COMO ESCLAVOS.<br><br>
                ATENTAMENTE,<br>
                TU YO DEL PASADO.
            </p>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Guardar mi historia</button>
                <a class="back" href="{{ route('exercises.future.show') }}">Cancelar</a>
                <br><br>
                <a class="back" href="{{ route('exercises.index') }}">Regresar a ejercicios</a>
            </div>
        </form>
    </div>
</div>

@endsection

