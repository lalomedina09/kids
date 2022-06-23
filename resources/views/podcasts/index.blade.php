@extends('layouts.app')

@section('content')

<div class="container pt-4">
    @include('partials.main.blog')

    <div class="my-5">
        @include('partials.search.bar')
    </div>

    <div class="col-12 my-5">
        <ul class="list-unstyled list-inline videos__list text-center mb-5 {{ active_media('podcast*') }}" id="menu_podcast_content">
            <li class="list-inline-item">
                <a href="{{ route('podcasts.index') }}" class="text-dark {{ active_class('podcast') }}">Todos</a>
            </li>
            @foreach($categories as $category)
                <li class="list-inline-item">
                    <a href="{{ route('podcasts.category.index', $category) }}" class="text-dark {{ active_class('podcast/'.$category->present()->slug) }}">{{ $category->present()->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>

    <div id="div_podcast_content" class="{{ active_media('podcast*') }}">
        @include('partials.videos.carousel', ['featured' => $featured, 'type' => 'podcast'])

        <hr>

        @include('partials.videos.list', ['list' => $podcasts, 'type' => 'podcast'])
    </div>
</div>

@endsection
