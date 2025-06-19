<!doctype html>
<html itemscope itemtype="http://schema.org/Article" lang="{{ config('app.locale') }}">

<head>
    <title>QD Kids</title>

    @include('layouts.components.main.preloader')

    @include('layouts.components.main.off-canvas-info')

    <div class="offcanvas__overlay"></div>

    @include('layouts.components.main.header-top')

    @include('layouts.components.main.meta')

    @include('layouts.components.main.favicon')

    @include('layouts.components.main.styles')

    @include('layouts.components.main.script-head')

</head>

<body>

    @include('layouts.components.main.script-body')

    @yield('base')

    @include('layouts.components.main.footer-scripts')
</body>

</html>
