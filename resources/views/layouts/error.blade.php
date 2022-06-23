@extends('layouts.app')

@section('content')

<div class="container error">
    @include('partials.search.bar')

    <h1 class="error__title text-danger">@yield('code')</h1>

    <div class="text-center">
        <p class="text-bold text-uppercase error__subtitle">
            @yield('message')
        </p>

        <a href="{{ route('home') }}" class="btn btn-dark my-4">@lang('Go to the main page')</a>
    </div>
</div>

@endsection
