@extends('layouts.base')
<title>Academia Bravo | Querido Dinero</title>
@section('base')
<style>
    .header-wrapper {
        /*position: absolute;*/
        position: fixed;
    }
    .btn-subscribe {
        display: inline-block;
        padding: 10px 20px;
        margin: 5px;
        border-radius: 10px;
        text-decoration: none;
        color: white;
        font-size: 16px;
        transition: background-color 0.3s;
    }

    .btn-subscribe {
        background-color: #7a68eb;
    }

    .btn-subscribe:hover {
        text-decoration: none;
        background-color: #7BE8ED;
        color: white;
    }

    @media (max-width: 414px) {
    .text-unlock-header{
        display: none;
    }
    }
</style>
<div id="app">
    <div class="header-wrapper">
        <header class="container navbar header">
            <div class="text-left">
                <img src="{{ asset('images/logo_light.svg') }}" class="my-1" height="35px" alt="QD Play">
            </div>
            <div class="text-right">
                @auth
                    @if($user)
                        <span class="font-akshar" style="color: #ffffff;">
                            Hola,
                        </span>
                        <span class="font-akshar" style="color: #7a68eb;">
                            {{ $user->name }} <i class="lni lni-crown"></i>
                        </span>
                    @endif
                @else
                    <span class="text-white font-akshar text-unlock-header">
                        Desbloquea más cursos, suscríbete hoy a Querido Dinero Play
                    </span>
                    <a class="btn-subscribe" href="#" data-toggle="modal" data-target="#modalLogin">
                        Suscribirme <i class="lni lni-crown"></i>
                    </a>
                @endauth
            </div>
        </header>
    </div>

    @yield('content')

    <footer class="footer box text-center text-white font-akshar" style="background: #000000; font-weight: lighter;"
        style="padding: 0px 0;">
        <span>Powered by</span>
        <span> <a style="text-decoration:none; color:white; text-decoration: underline white;"
                href="http://queridodinero.com/" target="_blank"> Querido Dinero </a> </span>
    </footer>
    <!-------------------------->
</div>

{{--@include('partials.main.modals')--}}
@include('partials.main.scripts-client')
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
