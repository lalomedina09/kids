@extends('layouts.base')

@section('base')

<div id="app">
    {{--@include('layouts.components.main.header')--}}

    @yield('content')

    {{--@include('layouts.components.main.footer')--}}

    {{--@include('layouts.components.main.modals')--}}
</div>

{{--@include('layouts.components.main.scripts')
@include('layouts.components.main.messages')--}}

@endsection
