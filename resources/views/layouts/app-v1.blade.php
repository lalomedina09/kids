@extends('layouts.base')

@section('base')

<div id="app">
    @include('partials.main.header')

    @yield('content')

    @include('partials.main.footer')

    @include('partials.main.modals')
</div>

@include('partials.main.scripts')
@include('partials.main.messages')
@include('partials.modals.adviceStatus')
@endsection
