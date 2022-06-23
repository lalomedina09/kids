@extends('layouts.dashboard.blog')

@section('dashboard-content')

    @include('dashboard.videos.partials._header', ['subtitle' => 'Videos » Editar', 'link' => true])

    @include('partials.dashboard.messages')

    @include('dashboard.videos.partials._form', ['update' => true])

@endsection
