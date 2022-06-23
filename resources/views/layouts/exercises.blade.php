@extends('layouts.base')

@push('scripts-inline')
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endpush

@section('base')

    <nav class="navbar fixed-top navbar-dark bg-dark pt-3 pb-1 px-0">
        <div class="container">
            <div class="d-flex w-100 justify-content-between">
                <a href="@yield('exercise-back', route('exercises.index'))"
                    class="text-white">
                    <span class="fa fa-chevron-left mr-2"></span>
                    @lang('Back')
                </a>

                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/logo_light.svg') }}" alt="Querido Dinero" width="150">
                </a>
            </div>
            <p class="w-100 text-uppercase text-center text-white mt-2 mb-0">@yield('exercise-title')</p>
        </div>
    </nav>

    <div id="exercises-wrapper">
        <div class="container">
            <div id="exercise-content">
                @yield('exercise-content')
            </div>
        </div>
    </div>

    <nav class="navbar fixed-bottom navbar-dark bg-dark">
        <p class="w-100 text-small text-white text-center mt-3 mb-1">Guarda los cambios para actualizar la información</p>
    </nav>

    @yield('exercise-action')

    @include('partials.main.scripts')
    @include('partials.main.messages')

@endsection
