@extends('layouts.v2.app')

<title>Consultoría | Querido Dinero</title>

@section('content')


@include('v2.home.services.banner')

@include('v2.home.services.section-info-1')

<section class="section-logos">
    <div class="container">
        @include('v2.home.index.clients')
        <br><br>
    </div>
</section>

<section>
    @include('v2.home.services.section-info-2')
</section>

@endsection
