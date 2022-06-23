@extends('layouts.dashboard.blog')

@section('dashboard-content')

    @include('dashboard.videos.partials._header', ['subtitle' => 'Videos » Nuevo'])

    @include('partials.dashboard.messages')

    @include('dashboard.videos.partials._form')

@endsection
