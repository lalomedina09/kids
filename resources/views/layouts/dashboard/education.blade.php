@extends('layouts.dashboard.base')

@section('dashboard-nav')

    @can('blog.courses.index')
        <a href="{{ route('dashboard.courses.index') }}"
            class="nav-link {{ active_class('dashboard/education/courses*') }}">
            Cursos
        </a>
    @endcan

    @can('blog.speakers.index')
        <a href="{{ route('dashboard.speakers.index') }}"
            class="nav-link {{ active_class('dashboard/education/speakers*') }}">
            Expositores
        </a>
    @endcan


@endsection
