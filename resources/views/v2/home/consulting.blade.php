@extends('layouts.v2.app')

<title>Consultoría | Querido Dinero</title>

@section('content')

<section>
    @include('v2.home.consulting.__banner')
</section>

<section>
    @include('v2.home.consulting.benefits')
</section>

<section>
    @include('v2.home.consulting.form')
</section>

<section>
    @include('v2.home.consulting.products')
</section>

@endsection
