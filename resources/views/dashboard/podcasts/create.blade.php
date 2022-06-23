@extends('layouts.dashboard.blog')

@section('dashboard-content')

    @include('dashboard.podcasts.partials._header', ['subtitle' => 'Podcasts » Nuevo'])

    @include('partials.dashboard.messages')

    @include('dashboard.podcasts.partials._form')

@endsection
