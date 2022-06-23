@extends('layouts.base')

@section('base')

<div id="app">
    <div class="header-wrapper-b" style="
    background-image: url({{ asset('/images/landing/empresas/izq-top.png') }}), 
    url({{ asset('/images/landing/empresas/der-top.png') }});
    background-position: left bottom, right top;
    background-repeat: no-repeat, no-repeat;
    background-size: auto 100px, auto 100px;">
        <header class="container navbar header">
            <div class="text-center mx-auto">
                <img src="{{ asset('/images/landing/empresas/logo-top.png') }}"
                    class="my-1"
                    height="80px" alt="Querido Dinero">
            </div>
        </header>
    </div>
    @yield('content')

</div>

@include('partials.main.modals')
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
