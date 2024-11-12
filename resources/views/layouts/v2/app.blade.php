@extends('layouts.v2.base')

@section('base')

<div id="app">
    @include('layouts.v2.components.header')
    {{--@include('partials.main.header')--}}

    @yield('content')

    @include('layouts.v2.components.footer')

    @include('v2.components.modals.login')
    @include('v2.components.modals.sign-up')
</div>

{{--
    @include('partials.main.scripts')
    @include('partials.main.messages')
    @include('partials.modals.adviceStatus')
--}}

@endsection
