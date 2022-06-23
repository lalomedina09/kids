@extends('layouts.dashboard.admin')

@section('dashboard-content')

    @include('dashboard.downloads.partials._header', ['subtitle' => 'Descargas » Nuevo'])

    @include('partials.dashboard.messages')

    @include('dashboard.downloads.partials._form', ['route' => route('dashboard.downloads.store')])

@endsection
