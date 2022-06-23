@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="text-center my-4">
            <img src="{{ asset('images/logo.svg') }}" class="image--logo animated fadeInDown">
        </div>

        <div class="mt-5">
            @yield('page')
        </div>
    </div>

@endsection
