@extends('layouts.app')

@section('content')

    @include('home/index/hero-banner')


    @include('home/index/about')

    <!-- benefiios para tu escuela--->
    @include('home/index/about-activities')

    <!---que incluye el programa-->
    @include('home/index/work-process')

    <!-- ciclos escolares-->
    @include('home/index/program')

    <!-- implementar--->
    @include('home/index/implement')

    <!-- quieres ver como funciona-->
    @include('home/index/cta-section')

    <!--- Conoce nuestros artículos--->
    @include('home/index/news')

    <!--- Newsletter--->
    @include('home/index/main-cta')

    <!-- Solicita tu demo--->
    @include('home/index/ct-action')

@endsection
