@extends('layouts.dashboard.blog')

@section('dashboard-content')

    @include('dashboard.podcasts.partials._header', ['subtitle' => 'Podcasts » Editar', 'link' => true])

    @include('partials.dashboard.messages')

    @include('dashboard.podcasts.partials._form', ['update' => true])

@stop
