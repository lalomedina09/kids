@extends('layouts.page')

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/exercises/profile.js') }}"></script>
@endpush

@section('page')

<div class="rounded-lg" style="background-image: url('/images/background/green.png');">
    <div class="exercise__container">
        <div class="text-center mb-4">
            <h2>Mi perfil de inversionista</h2>
        </div>

        <form action="{{ route('exercises.profile.update') }}" method="post" id="form-exercise">
            @csrf

            <div class="mb-5">
                <p class="font-weight-bold">Planeo retirar mi inversión en:</p>
                <div class="custom-control custom-radio">
                    <input type="radio" name="p[0]" id="q1a" class="custom-control-input" value="a" {{ ($answers[0] === 'a') ? 'checked' : '' }}>
                    <label for="q1a" class="custom-control-label">Menos de 2 años</label>
                </div>

                <div class="custom-control custom-radio">
                    <input type="radio" name="p[0]" id="q1b" class="custom-control-input" value="b" {{ ($answers[0] === 'b') ? 'checked' : '' }}>
                    <label for="q1b" class="custom-control-label">Entre 2 y 10 años</label>
                </div>

                <div class="custom-control custom-radio">
                    <input type="radio" name="p[0]" id="q1c" class="custom-control-input" value="c" {{ ($answers[0] === 'c') ? 'checked' : '' }}>
                    <label for="q1c" class="custom-control-label">Más de 10 años</label>
                </div>
            </div>

            <div class="mb-5">
                <p class="font-weight-bold">Al momento de retirar mi dinero, me lo gastaré:</p>
                <div class="custom-control custom-radio">
                    <input type="radio" name="p[1]" id="q2a" class="custom-control-input" value="a" {{ ($answers[1] === 'a') ? 'checked' : '' }}>
                    <label for="q2a" class="custom-control-label">Todo en menos de 2 años</label>
                </div>

                <div class="custom-control custom-radio">
                    <input type="radio" name="p[1]" id="q2b" class="custom-control-input" value="b" {{ ($answers[1] === 'b') ? 'checked' : '' }}>
                    <label for="q2b" class="custom-control-label">Entre 2 y 8 años</label>
                </div>

                <div class="custom-control custom-radio">
                    <input type="radio" name="p[1]" id="q2c" class="custom-control-input" value="c" {{ ($answers[1] === 'c') ? 'checked' : '' }}>
                    <label for="q2c" class="custom-control-label">Más de 8 años</label>
                </div>
            </div>

            <div class="mb-5">
                <p class="font-weight-bold">¿Qué tanto conozco las inversiones?</p>
                <div class="custom-control custom-radio">
                    <input type="radio" name="p[2]" id="q3a" class="custom-control-input" value="a" {{ ($answers[2] === 'a') ? 'checked' : '' }}>
                    <label for="q3a" class="custom-control-label">Casi nada</label>
                </div>

                <div class="custom-control custom-radio">
                    <input type="radio" name="p[2]" id="q3b" class="custom-control-input" value="b" {{ ($answers[2] === 'b') ? 'checked' : '' }}>
                    <label for="q3b" class="custom-control-label">Algunas cosas</label>
                </div>

                <div class="custom-control custom-radio">
                    <input type="radio" name="p[2]" id="q3c" class="custom-control-input" value="c" {{ ($answers[2] === 'c') ? 'checked' : '' }}>
                    <label for="q3c" class="custom-control-label">Soy experto</label>
                </div>
            </div>

            <div class="mb-5">
                <p class="font-weight-bold">Cuando invierto mi dinero:</p>
                <div class="custom-control custom-radio">
                    <input type="radio" name="p[3]" id="q4a" class="custom-control-input" value="a" {{ ($answers[3] === 'a') ? 'checked' : '' }}>
                    <label for="q4a" class="custom-control-label">Me preocupo de no perder valor</label>
                </div>

                <div class="custom-control custom-radio">
                    <input type="radio" name="p[3]" id="q4b" class="custom-control-input" value="b" {{ ($answers[3] === 'b') ? 'checked' : '' }}>
                    <label for="q4b" class="custom-control-label">Me preocupo igual por no perder que por ganar</label>
                </div>

                <div class="custom-control custom-radio">
                    <input type="radio" name="p[3]" id="q4c" class="custom-control-input" value="c" {{ ($answers[3] === 'c') ? 'checked' : '' }}>
                    <label for="q4c" class="custom-control-label">Me preocupo más por ganar</label>
                </div>
            </div>

            <div class="mb-5">
                <p class="font-weight-bold">¿Qué es lo más riesgoso en lo que has invertido?</p>
                <div class="custom-control custom-radio">
                    <input type="radio" name="p[4]" id="q5a" class="custom-control-input" value="a" {{ ($answers[4] === 'a') ? 'checked' : '' }}>
                    <label for="q5a" class="custom-control-label">Cetes, pagarés bancarios, fondos de deuda</label>
                </div>

                <div class="custom-control custom-radio">
                    <input type="radio" name="p[4]" id="q5b" class="custom-control-input" value="b" {{ ($answers[4] === 'b') ? 'checked' : '' }}>
                    <label for="q5b" class="custom-control-label">Acciones, fondos de renta variable</label>
                </div>

                <div class="custom-control custom-radio">
                    <input type="radio" name="p[4]" id="q5c" class="custom-control-input" value="c" {{ ($answers[4] === 'c') ? 'checked' : '' }}>
                    <label for="q5c" class="custom-control-label">ETFs, Bitcoins, fondos internacionales</label>
                </div>

                <div class="custom-control custom-radio">
                    <input type="radio" name="p[4]" id="q5d" class="custom-control-input" value="d" {{ ($answers[4] === 'd') ? 'checked' : '' }}>
                    <label for="q5d" class="custom-control-label">Nunca he invertido</label>
                </div>
            </div>

            <div class="mb-5">
                <p class="font-weight-bold">Imagina que en los últimos 3 meses el IPC (Bolsa de Valores) perdió el 20%, y una acción también perdió el 20% de su valor. ¿Qué harías?</p>
                <div class="custom-control custom-radio">
                    <input type="radio" name="p[5]" id="q6a" class="custom-control-input" value="a" {{ ($answers[5] === 'a') ? 'checked' : '' }}>
                    <label for="q6a" class="custom-control-label">Vendo mis acciones</label>
                </div>

                <div class="custom-control custom-radio">
                    <input type="radio" name="p[5]" id="q6b" class="custom-control-input" value="b" {{ ($answers[5] === 'b') ? 'checked' : '' }}>
                    <label for="q6b" class="custom-control-label">Vendo algunas de mis acciones</label>
                </div>

                <div class="custom-control custom-radio">
                    <input type="radio" name="p[5]" id="q6c" class="custom-control-input" value="c" {{ ($answers[5] === 'c') ? 'checked' : '' }}>
                    <label for="q6c" class="custom-control-label">No hago nada</label>
                </div>

                <div class="custom-control custom-radio">
                    <input type="radio" name="p[5]" id="q6d" class="custom-control-input" value="d" {{ ($answers[5] === 'd') ? 'checked' : '' }}>
                    <label for="q6d" class="custom-control-label">Compro más acciones</label>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">¡Descubrir mi perfil de inversionista!</button>
                <a class="back" href="{{ route('exercises.profile.show') }}">Cancelar</a>
                <br><br>
                <a class="back" href="{{ route('exercises.index') }}">Regresar a ejercicios</a>
            </div>
        </form>
    </div>
</div>

@endsection
