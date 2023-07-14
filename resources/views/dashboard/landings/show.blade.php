@extends('layouts.dashboard.admin')

@section('dashboard-content')

    <div class="row mb-5">
        <div class="col-12">
            <h3>Landing Pages » {{ $page }}</h3>
        </div>
    </div>

    <ul class="nav nav-tabs mb-4">
        @foreach ($pages as $p)
            <a href="{{ route('dashboard.landings.show', [$p]) }}"
                class="nav-item nav-link {{ $p == $page ? 'active' : '' }}"
            >{{ $p }}</a>
        @endforeach
        <a href="{{ route('dashboard.landings.custom.show', ['registro-qdplay-empresas']) }}"
            class="nav-item nav-link {{ "registro-qdplay-empresas" == $page ? 'active' : '' }}">
            Registro QD Play Empresas
        </a>
        <a href="{{ route('dashboard.landings.custom.show', ['registro-qdplay-personas-fisicas']) }}"
            class="nav-item nav-link {{ "registro-qdplay-personas-fisicas" == $page ? 'active' : '' }}">
            Registro QD Play Personas Fis..
        </a>
        <a href="{{ route('dashboard.landings.custom.show', ['finanzas-personales-para-empleados']) }}"
            class="nav-item nav-link {{ "finanzas-personales-para-empleados" == $page ? 'active' : '' }}">
            Curso Finanzas Personales
        </a>
        <a href="{{ route('dashboard.landings.custom.show', ['finanzas-empleados']) }}"
            class="nav-item nav-link {{ "finanzas-empleados" == $page ? 'active' : '' }}">
            Curso Finanzas Personales #2
        </a>
        <a href="{{ route('dashboard.landings.custom.show', ['inversiones-colaboradores']) }}"
            class="nav-item nav-link {{ "inversiones-colaboradores" == $page ? 'active' : '' }}">
            Curso Inversiones Colaboradores
        </a>

    </ul>

    <div class="table-responsive">

        <div class="text-right">
            @if ($getLanding->form == "finanzas-personales-para-empleados")
                <a class="btn btn-info" href="{{ url("finanzas-personales-para-empleados") }}" target="_blank">
                    Ver Landing
                </a>
             @elseif($getLanding->form == "registro-qdplay-empresas")
                <a class="btn btn-info" href="{{ url("registro-qdplay-empresas") }}" target="_blank">
                    Ver Landing
                </a>
            @elseif($getLanding->form == "registro-qdplay-personas-fisicas")
                <a class="btn btn-info" href="{{ url("registro-qdplay-individual") }}" target="_blank">
                    Ver Landing
                </a>
            @else
                <a class="btn btn-info" href="{{ url($page) }}" target="_blank">
                    Ver Landing
                </a>
            @endif
            <a class="btn btn-success" href="{{ route('dashboard.landings.export.results.excel', [$page]) }}">
                Exportar resultados Excel
            </a>
            <br>
        </div>
        <br>
        <table class="table table-hover table-bordered" data-order='[[ 0, "asc" ]]'>
            <thead>
                <tr>
                    <th>Num</th>
                    @foreach ($columns->fields as $field => $item)
                        <th>{{ $field }}</th>
                    @endforeach
                    <th>Fecha de registro</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Num</th>
                    @foreach ($columns->fields as $field => $item)
                        <th>{{ $field }}</th>
                    @endforeach
                    <th>Fecha de registro</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
            <tbody>
                @php $count = 1; @endphp
                @foreach($results as $result)
                    <tr>
                        <td>{{ $count++ }}</td>
                        {{--<td class="small">
                            <ul class="m-0 pl-3">
                                @foreach ($result->fields as $field => $value)
                                    <li><strong>{{ $field }}</strong>: {{ $value }}</li>
                                @endforeach
                            </ul>
                        </td>--}}
                        @foreach ($result->fields as $field => $value)
                            @if ($field == "Tipo")

                            @else
                                <td>{{ $value }}</td>
                            @endif
                        @endforeach
                        <td class="small">{{-- data-order="{{ optional($result->created_at)->timestamp }}" --}}
                            {{-- $result->present()->created_at --}}
                            {{ $result->created_at }}
                        </td>
                        <td>
                            @if ($result->synced)
                                <span class="badge badge-success">Sincronizado</span>
                            @else
                                <span class="badge badge-danger">No sincronizado</span>
                            @endif
                        </td>
                        <td>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table><!-- .table -->
    </div><!-- .table-responsive -->

@endsection
