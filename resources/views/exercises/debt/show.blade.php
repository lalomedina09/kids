@extends('layouts.page')

@section('page')

<div class="rounded-lg" style="background-image: url('/images/background/green.png');">
    <div class="exercise__container text-center">
        <h2 class="mb-5">Mi deuda mensual es:</h2>

        <h4 class="mb-4">Ingreso mensual: @money($answers['income'])</h4>

        <h4 class="mb-4">Tu porcentaje de deuda es: <span class="font-weight-bold mx-1 text-underline">{{ $answers['percentage'] }}%</span></h4>

        <h4 class="mb-4">
            @if ($answers['percentage'] <= 30)
                ¡Muy bien! Tienes una deuda sana
            @elseif (30 <= $answers['percentage'] && $answers['percentage'] <= 40)
                Estás excedido en tu deuda
            @elseif (40 <= $answers['percentage'] && $answers['percentage'] <= 50)
                ¡Cuidado! Tienes problemas con tu deuda
            @else
                ¡Tienes que arreglar tus finanzas urgentemente!
            @endif
        </h4>

        <a href="{{ route('exercises.debt.edit') }}" class="btn btn-primary">Modificar mi deuda</a>
        <br><br>
        <a class="back" href="{{ route('exercises.index') }}">Regresar a ejercicios</a>
    </div>
</div>

@endsection
