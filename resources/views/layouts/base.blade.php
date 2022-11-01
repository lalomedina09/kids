<!doctype html>
<html itemscope itemtype="http://schema.org/Article" lang="{{ config('app.locale') }}">
    <head>
        <title>{{ $metadata->title }}</title>
        @include('partials.main.favicon')
        @include('partials.main.meta')
        @include('partials.main.styles')
        @include('partials.main.script-head')
    </head>

    <body>
        @include('partials.main.script-body')
        @yield('base')
    </body>
</html>
