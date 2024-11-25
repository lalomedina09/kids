
<!doctype html>
<html itemscope itemtype="http://schema.org/Article" lang="{{ config('app.locale') }}">

<head>
    <title>{{ $metadata->title }}</title>
    <meta charset="utf-8" />
    {{--<title>Home | Querido Dinero</title>--}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @include('partials.main.favicon')
    @include('partials.main.meta')
    {{--@include('partials.main.styles')--}}
    @include('layouts.v2.components.styles')

    @php //$urlQdplayCompany = Route::currentRouteName(); @endphp

    {{--
    @if ($urlQdplayCompany == "register.qdplay.showww")
    @include('partials.main.custom.script-head-qdplay-empresas')
    @else
    @include('partials.main.script-head')
    @endif
    --}}

    @include('partials.main.script-head')

    {{-- desactive de forma temporal el script de new relic para comprobar que no afecte a tag de facebook--}}
    {{--@include('partials.main.script-head-newrelic')--}}
</head>

<body>
    {{--
    @if ($urlQdplayCompany == "register.qdplay.showww")
    @include('partials.main.custom.script-body-qdplay-empresas')
    @else
    @include('partials.main.script-body')
    @endif
    --}}

    @include('partials.main.script-body')

    @yield('base')
</body>

</html>
