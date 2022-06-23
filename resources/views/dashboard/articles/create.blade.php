@extends('layouts.dashboard.blog')

@section('dashboard-content')

    @include('dashboard.articles.partials._header', ['subtitle' => 'Artículos » Nuevo'])

    @include('partials.dashboard.messages')

    @include('dashboard.articles.partials._form')

@endsection
