@extends('layouts.v2.app')

<title>Consultoria Cultura | Querido Dinero</title>

@section('content')

<section>
    @include('v2.home.consulting.banner')
</section>

<section>
    @include('v2.home.consulting.method')
</section>

<section class="solutions">
    @include('v2.home.consulting.solutions')
</section>

<section>
    @include('v2.home.consulting.benefits')
</section>

<section>
    @include('v2.home.consulting.form')
</section>
{{--
<section>
    @include('v2.home.consulting.products')
</section>
--}}

@endsection
