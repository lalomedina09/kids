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
        font-size: 14px;
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

    @media (max-width: 800px) {
        .text-unlock-header{
            display: none;
        }
    }
    @auth
        .header-wrapper{
            background-color: #7a68eb;
        }
    @endauth
</style>
<div id="app">
    <div class="header-wrapper">
        <header class="container navbar header" style="padding:10px 20px">
            <div class="text-left">
                <img src="{{ asset('images/qdplay/academia-bravo/logo-bravo.png') }}" class="my-1" height="50px" alt="QD Play">
            </div>
            <div class="text-right">
                @auth

                    <ul class="nav">
                        <li class="nav-item dropdown">

                            <a href="#" class="nav-link dropdown-toggle header__buttons header__buttons--last"
                                data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">

                                @if($user)
                                    <span class="font-akshar" style="color: #ffffff;">
                                        {{ $user->name }} <i class="lni lni-crown" style="font-size: initial;"></i>
                                    </span>
                                @endif
                            </a>

                            <div class="dropdown-menu header__dropdown">
                                @auth
                                    <div class="dropdown-divider header__dropdown-divider"></div>
                                    <a href="{{ route('profile.edit') }}" class="dropdown-item header__buttons header__dropdown-buttons show-loading">
                                       Mi Perfil
                                    </a>
                                    @if($user->id == 33599 || $user->id == 33600 || $user->id == 14542)
                                        <div class="dropdown-divider header__dropdown-divider"></div>
                                        <a href="{{route('qdplay.landing.academy-bravo.admin')}}"
                                            class="dropdown-item header__buttons header__dropdown-buttons show-loading">
                                            Panel Admin
                                        </a>
                                    @endif

                                    <div class="dropdown-divider header__dropdown-divider"></div>

                                    <a href="{{ route('logout') }}" class="dropdown-item header__buttons header__dropdown-buttons">
                                        Cerrar sesión
                                    </a>
                                @endauth
                            </div>
                        </li>
                    </ul>
                @else
                    <span class="text-white font-akshar text-unlock-header font-size-p">
                        Desbloquea más cursos, suscríbete hoy a Querido Dinero Play
                    </span>
                    <a class="btn-subscribe font-size-p" href="#" data-toggle="modal" data-target="#modalLogin">
                        Entrar
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
