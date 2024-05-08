@extends('layouts.base')

@section('base')

<div id="app">
    <div class="header-wrapper">
        <!--<header class="container navbar header">
            <div class="text-center mx-auto">
                <img src="{{ asset('images/qdplay/logo/logo-color-y-blanco.png') }}"
                    class="my-1"
                    height="35px" alt="QD Play">
            </div>
        </header>-->
    </div>

    @yield('content')

    <!-------------------------->
    {{--<footer class="footer box bg-white">
        <div class="container">

            <div class="row text-center">
                <div class="col-12">
                    <span>Para más información:</span>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <span>
                        <a href="mailto:{{ config('money.email') }}" class="text-danger">
                            <img src="{{ asset('images/contact/email.png') }}" width="40" title="email"> {{ config('money.email') }}
                        </a>
                    </span>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span>
                        <a href="tel:{{ config('money.phone.mty') }}" class="text-danger">
                            <img src="{{ asset('images/contact/phone.png') }}" width="40" title="phone"> {{ config('money.phone.mty') }}
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </footer>--}}
    <footer class="footer box text-center text-white font-akshar" style="background: #000000; font-weight: lighter;"
        style="padding: 0px 0;">
        <span>Powered by</span>
        <span> <a style="text-decoration:none; color:white; text-decoration: underline white;"
                href="http://queridodinero.com/" target="_blank"> Querido Dinero </a> </span>
    </footer>
    <!-------------------------->
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
