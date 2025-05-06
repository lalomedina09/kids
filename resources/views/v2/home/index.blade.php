@extends('layouts.app-v2-redesign')

<title>Home | Querido Dinero</title>

@section('content')

    <section style="background-color: #f2f2f2;">
        @include('v2.home.index.banner')
    </section>

    <section>
        @include('v2.home.index.solutions')
    </section>

    <section style="background-color: #000;">
        @include('v2.home.index.content')
    </section>

    <section>
        @include('v2.home.index.services')
    </section>

    <section>
        <div class="container">
            @include('v2.home.index.about-us')
        </div>
    </section>

    <section class="section-logos">
        <div class="container">
            @include('v2.home.index.clients')
            <br><br>
        </div>
    </section>

@endsection
