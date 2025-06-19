@extends('layouts.base')

@section('base')

    @include('layouts.components.main.header')

    @yield('content')

    @include('layouts.components.main.footer')

    @include('layouts.components.main.modals')

    @include('layouts.components.main.messages')

@endsection
