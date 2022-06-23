@extends('layouts.page')

@section('page')

<div class="rounded-lg" style="background-image: url('/images/background/green.png');">
    <div class="exercise__container text-center">
        <h2 class="mb-4">Mi perfil de inversionista es:</h2>

        <div class="table-responsive mb-4">
            <table class="table table-bordered">
                <tr>
                    <td colspan="2"></td>
                    <td colspan="3">
                        (Menor) <span class="font-weight-bold">Tolerancia al riesgo</span> (Mayor)
                    </td>
                </tr>

                <tr>
                    <td rowspan="3" class="font-weight-bold">
                        H<br>O<br>R<br>I<br>Z<br>O<br>N<br>T<br>E
                    </td>
                    <td class="align-middle font-weight-bold">
                        Corto plazo
                    </td>
                    <td class="align-middle">
                        <span
                            class="{{ ((2 <= $risk_rate && $risk_rate <= 9) && (1 <= $horizon_rate && $horizon_rate <= 2)) ? 'text-underline' : '' }}">
                            Conservador
                        </span>
                    </td>
                    <td class="align-middle">
                        <span
                            class="{{ ((10 <= $risk_rate && $risk_rate <= 20) && (1 <= $horizon_rate && $horizon_rate <= 2)) ? 'text-underline' : '' }}">
                            Conservador
                        </span>
                    </td>
                    <td class="align-middle">
                        <span
                            class="{{ ((21 <= $risk_rate && $risk_rate <= 25) && (1 <= $horizon_rate && $horizon_rate <= 2)) ? 'text-underline' : '' }}">
                            Moderado
                        </span>
                    </td>
                </tr>

                <tr>
                    <td class="align-middle font-weight-bold">
                        Mediano plazo
                    </td>
                    <td class="align-middle">
                        <span
                            class="{{ ((2 <= $risk_rate && $risk_rate <= 9) && (3 <= $horizon_rate && $horizon_rate <= 6)) ? 'text-underline' : '' }}">
                            Conservador
                        </span>
                    </td>
                    <td class="align-middle">
                        <span
                            class="{{ ((10 <= $risk_rate && $risk_rate <= 20) && (3 <= $horizon_rate && $horizon_rate <= 6)) ? 'text-underline' : '' }}">
                            Moderado
                        </span>
                    </td>
                    <td class="align-middle">
                        <span
                            class="{{ ((21 <= $risk_rate && $risk_rate <= 25) && (3 <= $horizon_rate && $horizon_rate <= 6)) ? 'text-underline' : '' }}">
                            Agresivo
                        </span>
                    </td>
                </tr>

                <tr>
                    <td class="align-middle font-weight-bold">
                        Largo plazo
                    </td>
                    <td class="align-middle">
                        <span
                            class="{{ ((2 <= $risk_rate && $risk_rate <= 9) && (7 <= $horizon_rate && $horizon_rate <= 9)) ? 'text-underline' : '' }}">
                            Moderado
                        </span>
                    </td>
                    <td class="align-middle">
                        <span
                            class="{{ ((10 <= $risk_rate && $risk_rate <= 20) && (7 <= $horizon_rate && $horizon_rate <= 9)) ? 'text-underline' : '' }}">
                            Agresivo
                        </span>
                    </td>
                    <td class="align-middle">
                        <span
                            class="{{ ((21 <= $risk_rate && $risk_rate <= 25) && (7 <= $horizon_rate && $horizon_rate <= 9)) ? 'text-underline' : '' }}">
                            Agresivo
                        </span>
                    </td>
                </tr>
            </table>
        </div>

        <a href="{{ route('exercises.profile.edit') }}" class="btn btn-primary">Modificar mis respuestas</a>
        <br><br>
        <a class="back" href="{{ route('exercises.index') }}">Regresar a ejercicios</a>
    </div>
</div>

@endsection
