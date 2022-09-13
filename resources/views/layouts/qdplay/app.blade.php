@extends('layouts.base')

@section('base')

<div id="app" style="padding-top: 0">

    @yield('content')

</div>

@include('partials.main.scripts')
@include('partials.main.messages')

@endsection
