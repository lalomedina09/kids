@extends('layouts.dashboard.education')

@section('dashboard-content')

    @include('dashboard.courses.partials._header', ['subtitle' => 'Cursos » Nuevo'])

    @include('partials.dashboard.messages')

    @include('dashboard.courses.partials._form')

@endsection
