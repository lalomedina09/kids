@extends('layouts.page')

@section('page')

<div class="rounded-lg" style="background-image: url('/images/background/orange.png');">
    <div class="exercise__container">
        <div class="text-center mb-4">
            <h2>Cómo me veo en el futuro:</h2>
        </div>

        <p class="font-weight-bold mb-4">
            QUERID@ <span class="font-weight-bold mx-3 text-underline">{{ (array_key_exists(0, $answers)) ? $answers[0] : '' }}</span> DEL FUTURO:<br>
            SOY YO, OSEA TÚ. HOY QUE ESTÁS JUBILADO, Y TIENES <span class="font-weight-bold mx-3 text-underline">{{ (array_key_exists(1, $answers)) ? $answers[1] : '' }}</span> AÑOS
            ME DA GUSTO SABER QUE VIVES EN <span class="font-weight-bold mx-3 text-underline">{{ (array_key_exists(2, $answers)) ? $answers[2] : '' }}</span>
            Y QUE AHORA TE DEDICAS A <span class="font-weight-bold mx-3 text-underline">{{ (array_key_exists(3, $answers)) ? $answers[3] : '' }}</span>
            TODO EL DÍA.<br>
            DESDE LA EDAD DE <span class="font-weight-bold mx-3 text-underline">{{ (array_key_exists(4, $answers)) ? $answers[4] : '' }}</span>
            AÑOS EMPECÉ A INVERTIR PARA QUE TE ALIVIANES Y TE DEDIQUES A SER UN(A) VIEJIT@ BUENA ONDA MIENTRAS TODOS LOS DEMÁS
            TRABAJAN COMO ESCLAVOS.<br><br>
            ATENTAMENTE,<br>
            TU YO DEL PASADO.
        </p>

        <div class="text-center">
            <a href="{{ route('exercises.future.edit') }}" class="btn btn-primary">Modificar mi yo del futuro</a>
            <br><br>
            <a class="back" href="{{ route('exercises.index') }}">Regresar a ejercicios</a>
        </div>
    </div>
</div>

@endsection

