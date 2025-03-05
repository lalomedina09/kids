@extends('layouts.app-v2-redesign')

<title>Home | Querido Dinero</title>

@section('content')

<section style="background-color: #000;">
    @include('v2.home.index.content')
</section>

@include('v2.home.blog.styles')

<section>
    <div class="container">
        @include('v2.home.blog.search')
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            @include('v2.home.blog.9')

            @include('v2.home.blog.3')
        </div>
    </div>
</section>

@include('v2.components.loading')
@endsection
