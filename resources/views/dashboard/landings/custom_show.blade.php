@extends('layouts.dashboard.admin')

@section('dashboard-content')

    <div class="row mb-5">
        <div class="col-12">
            <h3>Paginas » {{ $custom_page }}</h3>
        </div>
    </div>
    @php $pageCustom = "registro-qdplay-empresas" @endphp
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
    </ul>

    <div class="table-responsive">
        <div class="text-right">
            <a class="btn btn-success" href="{{ route('dashboard.landings.export.results', [$pageCustom]) }}">
                Exportar resultados Excel
            </a>
            <br>
        </div>
        <br>
        <table class="table table-hover table-bordered" data-order='[[ 2, "desc" ]]'>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email Empresarial</th>
                    <th>Celular</th>

                    <th>Empresa</th>
                    <th>Intereses</th>
                    <th>Fecha de registro</th>
                </tr>
            </thead>
            <!--<tfoot>
                <tr>
                    <th>Nombre</th>
                    <th>Email Empresarial</th>
                    <th>Celular</th>

                    <th>Empresa</th>
                    <th>Intereses</th>
                    <th>Fecha de registro</th>
                </tr>
            </tfoot>-->
            <tbody>
                @foreach($leads as $lead)
                    <tr>
                        <td class="small"> {{ $lead->name}} {{ $lead->last_name}} </td>
                        <td class="small">{{ $lead->mail_corporate }}</td>
                        <td class="small">{{ $lead->movil }}</td>
                        <td class="small">{{ $lead->company }}</td>
                        <td class="small">{{ $lead->interests }}</td>

                        <td class="small" data-order="">{{ getCustomDateHuman($lead->created_at) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection


