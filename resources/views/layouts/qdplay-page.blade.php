@extends('layouts.qdplay.app')

@section('content')

@include('layouts.qdplay.style-login')

<div class="line-curve-top">
    <div class="container">
        <div class="text-center my-4">
            <img src="{{ asset('images/qdplay/logo/logo.png') }}" class="animated fadeInDown logo-qdplay" width="12%">
        </div>
        <div class="mt-5">
            @yield('page')
        </div>
    </div>
</div>
<div class="line-curve-bottom">

</div>
@endsection
