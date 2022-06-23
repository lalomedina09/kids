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
    </ul>

    <div class="alert alert-default">
        Selecciona una página para ver los resultados
    </div>

@endsection
