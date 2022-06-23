@extends('layouts.app')

@section('content')

<div class="container pt-4">
    @include('partials.main.blog')

    <div class="my-5">
        @include('partials.search.bar')
    </div>

    <div class="col-12 my-5">
        <ul class="list-unstyled list-inline videos__list text-center mb-5 {{ active_media('videos*') }}" id="menu_video_content">
            <li class="list-inline-item">
                <a href="{{ route('videos.index') }}" class="text-dark {{ active_class('videos') }}">Todos</a>
            </li>
            @foreach($categories as $category)
                <li class="list-inline-item">
                    <a href="{{ route('videos.category.index', $category) }}" class="text-dark {{ active_class('videos/'.$category->present()->slug) }}">{{ $category->present()->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>

    <div id="div_video_content" class="{{ active_media('videos*') }}">
        @include('partials.videos.carousel', ['featured' => $featured, 'type' => 'video'])

        <hr>

        @include('partials.videos.list', ['list' => $videos, 'type' => 'video'])
    </div>
</div>

@endsection
