@extends('layouts.dashboard.base')

@section('dashboard-nav')

    @can('blog.users.index')
        <a href="{{ route('dashboard.users.index') }}"
            class="nav-link {{ active_class('dashboard/administration/users*') }}">
            Usuarios
        </a>
    @endcan

    @can('blog.authorization.index')
        <a href="{{ route('dashboard.authorization.index') }}"
            class="nav-link {{ active_class('dashboard/administration/authorization*') }}">
            Autorización
        </a>
    @endcan

    @can('blog.reports.index')
        <a href="{{ route('dashboard.reports.index') }}"
            class="nav-link {{ active_class('dashboard/administration/reports*') }}">
            Reportes
        </a>
    @endcan

    @can('blog.pages.index')
        <a href="{{ route('dashboard.pages.index') }}"
            class="nav-link {{ active_class('dashboard/administration/pages*') }}">
            Páginas
        </a>
    @endcan

    @can('blog.downloads.index')
        <a href="{{ route('dashboard.downloads.index') }}"
            class="nav-link {{ active_class('dashboard/administration/downloads*') }}">
            Descargas
        </a>
    @endcan

    @can('blog.landings.index')
        <a href="{{ route('dashboard.landings.index') }}"
            class="nav-link {{ active_class('dashboard/administration/landings*') }}">
            Landing Pages
        </a>
    @endcan

    @can('blog.categories.index')
        <a href="{{ route('dashboard.categories.index') }}"
            class="nav-link {{ active_class('dashboard/administration/categories*') }}">
            Categorías
        </a>
    @endif

@endsection
