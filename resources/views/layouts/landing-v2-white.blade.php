@extends('layouts.base')

@section('base')
<style>
    .header-wrapper {
    background-color: #C0C0C0;
    position: absolute;

    }
    #app{
        background-color: #C0C0C0;
    }
</style>
<div id="app">
    <div class="header-wrapper">
        <header class="container navbar header">
            <div class="text-center mx-auto">
                <img src="{{ asset('images/logo_dark.svg') }}" class="my-1" height="50px" alt="Querido Dinero">
            </div>
        </header>
    </div>

    @yield('content')

</div>

{{--@include('partials.main.modals')--}}
@include('partials.main.scripts')
@include('partials.main.messages')

@endsection

@push('scripts-inline')
<script>
    FB.CustomerChat.hide();
</script>
@endpush
@push('styles')
<link href="{{ url('css/landing.css') }}" rel="stylesheet">
@endpush
