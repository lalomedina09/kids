@extends('layouts.app-v2-redesign')

<title>Servicios | Querido Dinero</title>

@section('content')

    @include('v2.home.services.banner')

    {{--@include('v2.home.services.section-info-1')--}}

    <section style="background-color: #F3F3F3;">
        <!-- Sección A -->
        @include('v2.home.services.rows.consultancy')

        <!-- Sección B con Manchas Rojas -->
        <div class="position-relative">
            <div class="red-blur"></div>
            <div class="red-blur-secondary d-none d-md-block"></div>
            @include('v2.home.services.rows.numbers-qd')
        </div>

        <!-- Sección C -->
        @include('v2.home.services.rows.agency')
    </section>

    <section class="section-logos">
        <div class="container">
            @include('v2.home.index.clients')
            <br><br>
        </div>
    </section>

    {{--
    <section>
        @include('v2.home.services.section-info-2')
    </section>
    --}}

    <section style="background-color: #F5F5F5;">
        <!-- Sección C -->
        @include('v2.home.services.rows.digital')

        <div class="position-relative">
            <div class="blue-blur"></div>
            <div class="blue-blur-secondary d-none d-md-block"></div>
            @include('v2.home.services.rows.numbers-qdplay')
        </div>

        <!-- Sección C -->
        @include('v2.home.services.rows.qdplay')
    </section>
@endsection
