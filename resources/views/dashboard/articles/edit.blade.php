@extends('layouts.dashboard.blog')

@section('dashboard-content')

    @include('dashboard.articles.partials._header', ['subtitle' => 'Artículos » Editar', 'link' => true])

    @include('partials.dashboard.messages')

    @include('dashboard.articles.partials._form', ['update' => true])

@endsection
