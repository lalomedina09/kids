@extends('layouts.page')

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/exercises/amount.js') }}"></script>
@endpush

@section('page')

<div class="rounded-lg" style="background-image: url('/images/background/blue.png');">
    <div class="exercise__container">
        <div class="text-center mb-4">
            <h2>¿Con cuánto vivirás en 30 años?</h2>
        </div>

        <form action="{{ route('exercises.amount.update') }}" method="post" id="form-exercise">
            @csrf

            <div class="row mb-4">
                <div class="col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-12">
                    <h4 class="text-center">Para vivir en 30 años en <span class="font-weight-bold mx-1 text-underline">{{ $city }}</span> necesitaré:</h4>

                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="number" name="a[a]" id="amount" class="form-control exercise-answer-number">
                        <div class="input-group-append">
                            <span class="input-group-text">pesos</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a class="back" href="{{ route('exercises.amount.show') }}">Cancelar</a>
                <br><br>
                <a class="back" href="{{ route('exercises.index') }}">Regresar a ejercicios</a>
            </div>
        </form>
    </div>
</div>

@endsection

