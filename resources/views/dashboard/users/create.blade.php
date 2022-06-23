@extends('layouts.dashboard.admin')

@section('dashboard-content')

    @include('dashboard.users.partials._header', ['subtitle' => 'Usuarios » Nuevo'])

    @include('partials.dashboard.messages')

    @include('dashboard.users.partials._form')

@endsection
