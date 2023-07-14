@extends('layouts.dashboard.admin')

@section('dashboard-content')

    <div class="row mb-5">
        <div class="col-12">
            <h3>Landing Pages</h3>
        </div>
    </div>

    <ul class="nav nav-tabs mb-4">

        @foreach ($pages as $p)
            <a href="{{ route('dashboard.landings.show', [$p]) }}"
                class="nav-item nav-link"
            >{{ $p }}</a>
        @endforeach

        <a href="{{ route('dashboard.landings.custom.show', ['registro-qdplay-empresas']) }}"
            class="nav-item nav-link">
            Registro QD Play Empresas
        </a>
        <a href="{{ route('dashboard.landings.custom.show', ['registro-qdplay-personas-fisicas']) }}"
            class="nav-item nav-link">
            Registro QD Play Personas Fis..
        </a>
        <a href="{{ route('dashboard.landings.custom.show', ['finanzas-personales-para-empleados']) }}"
            class="nav-item nav-link">
            Curso Finanzas Personales
        </a>
        <a href="{{ route('dashboard.landings.custom.show', ['finanzas-empleados']) }}"
            class="nav-item nav-link">
            Curso Finanzas Personales #2
        </a>
        <a href="{{ route('dashboard.landings.custom.show', ['inversiones-colaboradores']) }}"
            class="nav-item nav-link">
            Curso Inversiones Colaboradores
        </a>
    </ul>

    <div class="alert alert-default">
        Selecciona una página para ver los resultados
    </div>

@endsection
