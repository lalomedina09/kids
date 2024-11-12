@extends('layouts.v2.app')

@section('content')

<section style="background-color: #f2f2f2;">
    @include('v2.home.index.banner')
</section>

<section style="margin-left: 10%; margin-right: 10%;">
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
