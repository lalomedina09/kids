@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="text-center my-4">
            <img src="{{ asset('images/qdplay/logo/oficial.png') }}" class="animated fadeInDown" width="12%">
        </div>

        <div class="mt-5">
            @yield('page')
        </div>
    </div>

@endsection
