@extends('layouts.dashboard.admin')

@section('dashboard-content')

    <div class="row mb-5">
        <div class="col-12">
            <h3>
                <a href="{{ route('dashboard.reports.index') }}">Reportes</a>
                » Ejercicios
            </h3>
        </div>
    </div>

    <ul class="nav nav-tabs mb-4">
        <a href="{{ route('dashboard.reports.exercises.debt.show') }}"
            class="nav-item nav-link"
        >@lang('Debt')</a>
    </ul>

@endsection
