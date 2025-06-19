<!doctype html>
<html itemscope itemtype="http://schema.org/Article" lang="{{ config('app.locale') }}">

{{-- @extends('layouts.app') --}}

{{-- @section('base') --}}

{{-- @endsection --}}

{{-- @section('content') --}}

{{-- @endsection --}}
<head>
    <title>QD Kids</title>
    {{--
    @include('layouts.components.main.favicon')
    @include('layouts.components.main.meta')
    @include('layouts.components.main.styles')

    @php $urlQdplayCompany = Route::currentRouteName();@endphp



    @include('layouts.components.main.script-head')
    --}}

</head>

<body>
    {{--@include('layouts.components.main.script-body')--}}
    @yield('base')
</body>

</html>
