<!doctype html>
<html itemscope itemtype="http://schema.org/Article" lang="{{ config('app.locale') }}">
    <head>
        <title>{{ $metadata->title }}</title>
        @include('partials.main.favicon')
        @include('partials.main.meta')
        @include('partials.main.styles')

        @php $urlQdplayCompany = Route::currentRouteName();@endphp

        @if ($urlQdplayCompany == "register.qdplay.show")
        @include('partials.main.custom.script-head-qdplay-empresas')
        @else
            @include('partials.main.script-head')
        @endif
    </head>

    <body>
        @if ($urlQdplayCompany == "register.qdplay.show")
            @include('partials.main.custom.script-body-qdplay-empresas')
        @else
            @include('partials.main.script-body')
        @endif
        @yield('base')
    </body>
</html>
