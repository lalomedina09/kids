@extends('layouts.dashboard.admin')

@section('dashboard-content')

    <div class="row mb-5">
        <div class="col-12">
            <h3>Reportes</h3>
        </div>
    </div>

    <ul class="nav nav-tabs mb-4">
        <a href="{{ route('dashboard.reports.exercises.index') }}"
            class="nav-item nav-link"
        >@lang('Exercises')</a>
    </ul>

@endsection
