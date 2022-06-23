@extends('layouts.app')

@if (app()->environment() === 'production')
    @push('scripts-inline')
        <script id="fbq-track-Search">
            fbq('track', 'Search', {
                search_string: "{{ $search['q'] }}"
            });
            document.getElementById('fbq-track-Search').remove();
        </script>
    @endpush
@endif

@section('content')

    <div class="container pt-5">
        <div class="row">
            <div class="col-12">
                @include('partials.search.bar')
            </div>
        </div>

        @unless ($articles->isEmpty())
            @foreach($articles as $key => $category)
                <h3 class="mt-5 mb-4 home__title home__title--danger">
                    <a href="{{ route('articles.category.index', $category->slug) }}">{{ $category->present()->name }}</a>
                </h3>

                <div class="row">
                    <div class="col flexslider slider">
                        <ul class="slides">
                            @foreach($category->articles as $article)
                                <li class="home__link--hover">
                                    @include('partials.articles.card', ['article' => $article])
                                </li>
                            @endforeach
                        </ul>

                        <div class="slider-item">
                            <a href="#" class="flex-prev slider-item__prev">
                                <img src="{{ asset('images/arrow-left.png') }}" alt="Prev">
                            </a>
                            <div class="d-none d-md-flex slider-item__bullets" data-delay="{{ ++$key * 500 }}"></div>
                            <a href="#" class="flex-next slider-item__next">
                                <img src="{{ asset('images/arrow-right.png') }}" alt="Next">
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="text-center">
                <h1 class="my-5 text-muted">@lang('Results not found')</h1>
            </div>
        @endunless

        @if(!$videos->isEmpty())
            <h3 class="mt-5 mb-4 home__title home__title--danger">
                @lang('Videos')
            </h3>

            <div class="row videos--items">
                @foreach($videos as $video)
                    <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
                        @include('partials.videos.card', ['media' => $video, 'type' => 'video'])
                    </div>
                @endforeach
            </div>
        @endif

        @if(!$podcasts->isEmpty())
            <h3 class="mt-5 mb-4 home__title home__title--danger">
                @lang('Podcasts')
            </h3>

            <div class="row videos--items">
                @foreach($podcasts as $podcast)
                    <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
                        @include('partials.videos.card', ['media' => $podcast, 'type' => 'podcast'])
                    </div>
                @endforeach
            </div>
        @endif

        @if(!$courses->isEmpty())
            <h3 class="mt-5 home__title home__title--danger">
                @lang('Workshops')
            </h3>

            @foreach($courses as $course)
                @include('partials.courses.card', ['course' => $course])
            @endforeach
        @endif
    </div>

@endsection
