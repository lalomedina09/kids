@extends('layouts.dashboard.education')

@section('dashboard-content')

    @include('dashboard.courses.partials._header', ['subtitle' => 'Cursos » Editar', 'link' => true])

    @include('partials.dashboard.messages')

    @include('dashboard.courses.partials._form', ['update' => true])

@endsection
