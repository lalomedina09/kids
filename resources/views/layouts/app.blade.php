{{--
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
--}}

@extends('layouts.base')

@section('base')

<div id="app">

    @include('layouts.v2.components.header')
    {{--@include('partials.main.header')--}}

    @yield('content')

    @include('layouts.v2.components.footer')

    @if(isset($source) && isset($channel))
    @include('v2.components.modals.login')
    @include('v2.components.modals.sign-up')
    @endif

</div>

{{--@include('partials.main.scripts')---}}
@include('layouts.v2.components.messages')
@include('layouts.v2.components.scripts')

@endsection
