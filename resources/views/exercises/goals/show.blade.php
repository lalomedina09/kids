@extends('layouts.page')

@section('page')

<div class="rounded-lg" style="background-image: url('/images/background/blue.png');">
    <div class="exercise__container text-center">
        <h2 class="mb-4">Mis metas son:</h2>

        @if (!$short->isEmpty())
            <h4>Corto plazo</h4>

            <div class="table-responsive mb-4">
                <table class="table table-borderless">
                    <col width="33%" />
                    <col width="33%" />
                    <col width="33%" />
                    <thead>
                        <tr>
                            <th>Meta</th>
                            <th>Tiempo</th>
                            <th>Costo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($short as $goal)
                            <tr>
                                <td class="align-middle">
                                    <span class="font-weight-bold">{{ $goal['m'] }}</span>
                                </td>
                                <td class="align-middle">
                                    <span class="font-weight-bold">{{ $goal['t'] }} meses</span>
                                </td>
                                <td class="align-middle">
                                    <span class="font-weight-bold">@money($goal['c'])</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        @if (!$medium->isEmpty())
            <h4>Mediano plazo</h4>

            <div class="table-responsive mb-4">
                <table class="table table-borderless">
                    <col width="33%" />
                    <col width="33%" />
                    <col width="33%" />
                    <thead>
                        <tr>
                            <th>Meta</th>
                            <th>Tiempo</th>
                            <th>Costo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($medium as $goal)
                            <tr>
                                <td class="align-middle">
                                    <span class="font-weight-bold">{{ $goal['m'] }}</span>
                                </td>
                                <td class="align-middle">
                                    <span class="font-weight-bold">{{ $goal['t'] }} meses</span>
                                </td>
                                <td class="align-middle">
                                    <span class="font-weight-bold">@money($goal['c'])</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        @if (!$large->isEmpty())
            <h4>Largo plazo</h4>

            <div class="table-responsive mb-4">
                <table class="table table-borderless">
                    <col width="33%" />
                    <col width="33%" />
                    <col width="33%" />
                    <thead>
                        <tr>
                            <th>Meta</th>
                            <th>Tiempo</th>
                            <th>Costo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($large as $goal)
                            <tr>
                                <td class="align-middle">
                                    <span class="font-weight-bold">{{ $goal['m'] }}</span>
                                </td>
                                <td class="align-middle">
                                    <span class="font-weight-bold">{{ $goal['t'] }} meses</span>
                                </td>
                                <td class="align-middle">
                                    <span class="font-weight-bold">@money($goal['c'])</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <a href="{{ route('exercises.goals.edit') }}" class="btn btn-primary">Modificar mis metas</a>
        <br><br>
        <a class="back" href="{{ route('exercises.index') }}">Regresar a ejercicios</a>
    </div>
</div>

@endsection
