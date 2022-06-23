@extends('layouts.page')

@section('page')

<div class="rounded-lg" style="background-image: url('/images/background/blue.png');">
    <div class="exercise__container">
        <div class="text-center mb-4">
            <h2>¿Con cuánto vivirás en 30 años?</h2>
        </div>

        <h4 class="text-center mb-4">
            Para vivir 30 años en
            <span class="font-weight-bold mx-1 text-underline">{{ $city }}</span>
            necesitaré: <span class="font-weight-bold mx-1 text-underline">@money($answers['a'])</span>
        </h4>

        <div class="text-center">
            <a href="{{ route('exercises.amount.edit') }}" class="btn btn-primary">Modificar cantidad</a>
            <br><br>
            <a class="back" href="{{ route('exercises.index') }}">Regresar a ejercicios</a>
        </div>
    </div>
</div>

@endsection

