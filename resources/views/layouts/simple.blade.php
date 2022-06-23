@extends('layouts.base')

@section('base')

    <nav class="navbar bg-white">
        <a href="{{ route('home') }}" class="mx-auto">
            <img src="{{ asset('images/logo.svg') }}" alt="Querido Dinero" width="250">
        </a>
    </nav>

    @yield('content')

    @include('partials.main.scripts')
    @include('partials.main.messages')

@endsection
