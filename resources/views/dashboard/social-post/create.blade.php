@extends('layouts.dashboard.blog')

@section('dashboard-content')

    @include('dashboard.social-post.components._header', ['subtitle' => 'Social Post » Nuevo'])

    @include('partials.dashboard.messages')

    @include('dashboard.social-post.components._form')

@endsection
