<!doctype html>
<html itemscope itemtype="http://schema.org/Article" lang="{{ config('app.locale') }}">
    <head>
        <title>{{ $metadata->title }}</title>
        @include('partials.main.favicon')
        @include('partials.main.meta')
        @include('partials.main.styles')
    </head>

    <body>
        @yield('base')
    </body>
</html>
