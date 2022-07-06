@extends('layouts.dashboard.base')

@section('dashboard-nav')

    @can('parameters.prices.rating')
        <a href="{{ route('dashboard.parameters.prices.rating') }}"
            class="nav-link {{ active_class('dashboard/parameters/prices*') }}">
            Precios
        </a>
    @endcan

    {{--@can('parameters.authorization.index')
        <a href="{{ route('dashboard.parameters.index') }}"
            class="nav-link {{ active_class('dashboard/parameters/authorization*') }}">
            Precios
        </a>
    @endcan--}}




    {{--
        @if(false)
            <a href="{{ route('dashboard.categories.index') }}"
                class="nav-link {{ active_class('dashboard/administration/categories*') }}">
                Categorías
            </a>
        @endif
    --}}
@endsection
