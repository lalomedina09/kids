<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="content-language" content="es-MX">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">
        @if(request()->getSession())
            <meta name="jwt-token" content="{{ request()->session()->get('qd-jwt') }}">
        @endif

        <title>{{ config('app.name') }} - @yield('page-title')</title>

        @include('partials.main.favicon')

        <link rel="stylesheet" href="{{ mix('css/dashboard.css') }}">
        <link rel="stylesheet" href="{{ mix('css/vendor/datetimepicker.css') }}">
        <link rel="stylesheet" href="{{ mix('css/vendor/datatables.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">

        @stack('styles')
        @stack('styles-inline')
    </head>

    <body>
        <nav id="header" class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('images/logo_light.svg') }}" alt="Querido Dinero" width="150">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    @if (config()->has('money.modules'))
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item {{ active_class('dashboard') }}">
                                <a class="nav-link" href="{{ route('dashboard.index') }}">@lang('Start')</a>
                            </li>

                            @foreach (config()->get('money.modules') as $module)
                                @can($module['permission'])
                                    <li class="nav-item {{ active_class($module['pattern']) }}">
                                        <a class="nav-link" href="{{ route($module['route']) }}">@lang($module['name'])</a>
                                    </li>
                                @endcan
                            @endforeach

                            @can('blog.courses.index')
                                <li class="nav-item {{ active_class('dashboard/education*') }}">
                                    <a class="nav-link" href="{{ route('dashboard.courses.index') }}">@lang('Education')</a>
                                </li>
                            @endcan

                            @can('blog.users.index')
                                <li class="nav-item {{ active_class('dashboard/admin*') }}">
                                    <a class="nav-link" href="{{ route('dashboard.users.index') }}">@lang('Administration')</a>
                                </li>
                            @endcan
                            @can('parameters.prices.rating')
                                <li class="nav-item {{ active_class('dashboard/parameters*') }}">
                                    <a class="nav-link" href="{{ route('dashboard.parameters.prices.rating') }}">
                                        @lang('Parameters')</a>
                                </li>
                            @endcan
                            <li class="nav-item {{ active_class('dashboard/qdplay*') }}">
                                <a class="nav-link" href="{{ route('dashboard.qdplay') }}">
                                @lang('QD Play')</a>
                            </li>
                        </ul>
                    @endif
                </div>
            </div>
        </nav>

        <div class="nav-scroller bg-white shadow-sm">
            <div class="container">
                <nav class="nav nav-underline">
                     @yield('dashboard-nav')
                     <br><br>
                </nav>
            </div>
        </div>

        <div class="container shadow rounded" id="app">
            @yield('dashboard-content')
        </div>

        <input type="hidden" name="_token" id="token" value="{{ csrf_token()}}">
        <script type="text/javascript" src="{{ asset('i18n?v='.config('money.app.subversion')) }}"></script>
        <script type="text/javascript" src="{{ mix('js/manifest.js') }}"></script>
        <script type="text/javascript" src="{{ mix('js/vendor.js') }}"></script>
        <script type="text/javascript" src="{{ mix('js/dashboard.js') }}"></script>

        <script type="text/javascript" src="{{ mix('js/vendor/editor/editor.js') }}"></script>
        <script type="text/javascript" src="{{ mix('js/vendor/moment.js') }}"></script>
        <script type="text/javascript" src="{{ mix('js/vendor/datetimepicker.js') }}"></script>
        <script type="text/javascript" src="{{ mix('js/vendor/datatables.js') }}"></script>
        <script type="text/javascript" src="{{ mix('js/vendor/validator.js') }}"></script>

        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>-->
        <!--<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>-->
        @stack('scripts')
        @stack('scripts-inline')
    </body>
</html>
