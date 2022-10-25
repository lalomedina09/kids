@extends('layouts.dashboard.blog')

@section('dashboard-content')

    @include('dashboard.social-post.components._header', ['subtitle' => 'Social Post » Editar', 'link' => true])

    @include('partials.dashboard.messages')

    @include('dashboard.social-post.components._form', ['update' => true])

@endsection
