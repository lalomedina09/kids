@extends('layouts.page')

@section('page')

<div class="rounded-lg" style="background-image: url('/images/background/orange.png');">
    <div class="exercise__container text-center">
        <h2 class="mb-5">¿Cuánto gastarán tus dependientes en 10 años?</h2>

        <h4 class="mb-4">
            <span class="font-weight-bold mx-1 text-underline">@money($total)</span>
            adicionales que deberás a tus gastos en 10 años
        </h4>

        <div class="mb-4">
            <a class="back" data-toggle="collapse" href="#collapse-dependant">Ver detalle</a>
        </div>

        <div id="collapse-dependant" class="collapse mb-4">
            <div class="table-responsive">
                <table class="table table-borderless">
                    <col width="60%" />
                    <col width="40%" />
                    <thead>
                        <tr>
                            <th class="text-center">Dependientes</th>
                            <th class="text-center">Cantidad (Pesos)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($answers as $key => $answer)
                            <tr>
                                <td class="align-middle">
                                    <span>{{ $answer['label'] }}</span>
                                </td>
                                <td class="align-middle">
                                    <span>@money($answer['amount'])</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <a href="{{ route('exercises.dependant.edit') }}" class="btn btn-primary">Modificar mis dependientes</a>
        <br><br>
        <a class="back" href="{{ route('exercises.index') }}">Regresar a ejercicios</a>
    </div>
</div>

@endsection
