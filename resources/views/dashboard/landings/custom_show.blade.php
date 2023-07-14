@extends('layouts.dashboard.admin')

@section('dashboard-content')

    <div class="row mb-5">
        <div class="col-12">
            <h3>Paginas » {{ $custom_page }}</h3>
        </div>
    </div>
    @php //$pageCustom = "registro-qdplay-empresas"
    @endphp
    <ul class="nav nav-tabs mb-4">
        @foreach ($pages as $p)
            <a href="{{ route('dashboard.landings.show', [$p]) }}"
                class="nav-item nav-link {{ $p == $custom_page ? 'active' : '' }}"
            >{{ $p }}</a>
        @endforeach

        <a href="{{ route('dashboard.landings.custom.show', ['registro-qdplay-empresas']) }}"
            class="nav-item nav-link {{ "registro-qdplay-empresas" == $custom_page ? 'active' : '' }}">
            Registro QD Play Empresas
        </a>
        <a href="{{ route('dashboard.landings.custom.show', ['registro-qdplay-personas-fisicas']) }}"
            class="nav-item nav-link {{ "registro-qdplay-personas-fisicas" == $custom_page ? 'active' : '' }}">
            Registro QD Play Personas Fis..
        </a>
        <a href="{{ route('dashboard.landings.custom.show', ['finanzas-personales-para-empleados']) }}"
            class="nav-item nav-link {{ "finanzas-personales-para-empleados" == $custom_page ? 'active' : '' }}">
            Curso Finanzas Personales
        </a>
        <a href="{{ route('dashboard.landings.custom.show', ['finanzas-empleados']) }}"
            class="nav-item nav-link {{ "finanzas-empleados" == $custom_page ? 'active' : '' }}">
            Curso Finanzas Personales #2
        </a>
        <a href="{{ route('dashboard.landings.custom.show', ['inversiones-colaboradores']) }}"
            class="nav-item nav-link {{ "inversiones-colaboradores" == $custom_page ? 'active' : '' }}">
            Curso Inversiones Colaboradores
        </a>
    </ul>

    <div class="table-responsive">
        @if ($getLanding)
            <div class="text-right">
                @if ($getLanding->form == "finanzas-personales-para-empleados")
                    <a class="btn btn-info" href="{{ url("talleres/finanzas-personales-para-empleados") }}" target="_blank">
                        Ver Landing
                    </a>
                @elseif ($getLanding->form == "inversiones-colaboradores")
                    <a class="btn btn-info" href="{{ url("talleres/inversiones-colaboradores") }}" target="_blank">
                        Ver Landing
                    </a>
                @else
                    <a class="btn btn-info" href="{{ url("talleres/finanzas-empleados") }}" target="_blank">
                        Ver Landing
                    </a>
                @endif
                <a class="btn btn-success" href="{{ route('dashboard.landings.export.results', [$custom_page]) }}">
                    Exportar resultados Excel
                </a>
                <br>
            </div>

        @endif
        <br>
        <table class="table table-hover table-bordered" data-order='[[ 0, "asc" ]]'>
            <thead>
                <tr>
                    <th>Num</th>
                    @if($custom_page != "registro-qdplay-personas-fisicas")
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Email Empresarial</th>
                        <th>Celular</th>
                        <th>Empresa</th>
                    @else
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email Personal</th>
                    @endif

                    <th>Fecha de registro</th>
                    <th>Intereses</th>
                </tr>
            </thead>

            <tbody>
                @php $count = 1; @endphp
                @foreach($leads as $lead)
                    <tr>
                        <td>{{ $count++ }}</td>
                        @if($custom_page != "registro-qdplay-personas-fisicas")
                            <td class="small">{{ $lead->name}}</td>
                            <td class="small">{{ $lead->last_name}}</td>
                            <td class="small">{{ $lead->mail_corporate }}</td>
                            <td class="small">{{ $lead->movil }}</td>
                            <td class="small">{{ $lead->company }}</td>
                        @else
                            <td class="small">{{ $lead->name}}</td>
                            <td class="small">{{ $lead->last_name}} </td>
                            <td class="small">{{ $lead->mail_personal }}</td>
                        @endif
                        <td class="small">
                            {{-- getCustomDateHuman($lead->created_at) --}}
                            {{ $lead->created_at }}
                        </td>
                        <td class="small">{{ $lead->interests }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection