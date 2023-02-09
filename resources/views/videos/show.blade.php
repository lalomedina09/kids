@extends('layouts.app')

@if (app()->environment() === 'production')
    @push('scripts-inline')
        <script id="fbq-track-ViewContent">
            fbq('track', 'ViewContent', {
                content_ids: ['{{ $video->id }}'],
                content_category: '{{ $video->category()->present()->name }}',
                content_name: '{{ $video->present()->title }}',
                content_type: 'video'
            });
            document.getElementById('fbq-track-ViewContent').remove();
        </script>
    @endpush
@endif

@section('content')

    <section class="container single px-lg-5">
        {!! $video->present()->iframe !!}

        <article class="single__wrapper">
            <div class="pos-rel">
                <ul class="list-unstyled single__social">
                    @if ($video->author->hasMeta('blog', 'facebook'))
                        <li class="single__social-item">
                            <a href="{{ $video->author->getMeta('blog', 'facebook') }}" class="text-danger" target="_blank" rel="noopener noreferrer">
                                <span class="fa fa-2x fa-facebook"></span>
                            </a>
                        </li>
                    @endif
                    @if ($video->author->hasMeta('blog', 'twitter'))
                        <li class="single__social-item">
                            <a href="{{ $video->author->getMeta('blog', 'twitter') }}" class="text-danger" target="_blank" rel="noopener noreferrer">
                                <span class="fa fa-2x fa-twitter"></span>
                            </a>
                        </li>
                    @endif
                    @if ($video->author->hasMeta('blog', 'instagram'))
                        <li class="single__social-item">
                            <a href="{{ $video->author->getMeta('blog', 'instagram') }}" class="text-danger" target="_blank" rel="noopener noreferrer">
                                <span class="fa fa-2x fa-instagram"></span>
                            </a>
                        </li>
                    @endif
                    @if ($video->author->hasMeta('blog', 'youtube'))
                        <li class="single__social-item">
                            <a href="{{ $video->author->getMeta('blog', 'youtube') }}" class="text-danger" target="_blank" rel="noopener noreferrer">
                                <span class="fa fa-2x fa-youtube-play"></span>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>

            <div class="single__featured">
                <a href="{{ $video->present()->urlCategory }}" class="article__category single__category">
                    {{ $video->present()->category }}
                </a>

                <h1 class="single-featured__title">{{ $video->present()->title }}</h1>

                <div class="article__author">
                    <div class="float-left">
                        <a href="{{ route('authors.show', [$video->owner->profile_key]) }}">
                            <img src="{{ $video->owner->present()->profile_photo }}" class="rounded-circle" alt="{{ $video->owner->present()->profile_photo }}" width="60" height="60">
                        </a>
                    </div>

                    <div class="float-left ml-2">
                        @if ($video->isGuestContent())
                            <p class="small mb-0">{{ $video->owner->full_name }} por:</p>
                        @endif
                        <a href="{{ route('authors.show', [$video->author->profile_key]) }}">
                            <p class="small mb-0 {{ (!$video->isGuestContent()) ? 'mt-2' : '' }}">
                                <span class="text-bold text-danger">{{ $video->author->full_name }}</span>
                            </p>
                        </a>
                        <p class="small text-muted">{{ $video->present()->published_at }}</p>
                    </div>
                </div>
            </div>

            <div class="single__content mt-4">
                {!! $video->present()->body !!}
            </div>

            @unless($video->tags->isEmpty())
                <div class="single-tags">
                    <h6 class="single-tags__headline">Etiquetas:</h6>
                    @foreach($video->tags as $tag)
                        <a href="{{ route('videos.tags.index', $tag) }}" class="single-tags__item">{{ $tag->present()->name }}</a>
                    @endforeach
                </div>
            @endunless
        </article>
    </section>

    <section class="container pt-0">
        <div class="row">
            <div class="col-12 text-center">
                <h4 class="mb-4">¿Te gustó el artículo? ¡Dale share!</h4>
                <div id="share-two" class="bottom__social"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center" @auth data-interactable="{{ $video->interactable_code }}" @endauth>
                <h4 class="mt-5 mb-4">Dale like o guárdalo para verlo más tarde</h4>
                <a href="#" class="like-interactable--trigger mr-5">
                    <span class="fa fa-2x {{ ($video->likedBy(auth()->user())) ? 'fa-heart text-danger' : 'fa-heart-o' }}"></span>
                </a>
                <a href="#" class="bookmark-interactable--trigger">
                    <span class="fa fa-2x {{ ($video->bookmarkedBy(auth()->user())) ? 'fa-bookmark text-danger' : 'fa-bookmark-o' }}"></span>
                </a>
            </div>
        </div>
    </section>

    <article class="videos box mt-2 mb-3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col">
                            <h3 class="home__title home__title--danger">Te recomendamos ver</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 text-center">
                    <div class="row">
                        @foreach($popular as $video)
                            <div class="col-md-4 col-sm-12 videos--item">
                                <a href="{{ $video->present()->url }}" class="d-block">
                                    <img src="{{ $video->present()->featured_image }}" class="image--article" alt="Article">
                                </a>
                                <a href="{{ $video->present()->urlCategory }}" class="d-block">
                                    <p><span class="article__category text-danger">{{ $video->present()->category }}</span></p>
                                </a>
                                <a href="{{ $video->present()->url }}" class="d-block">
                                    <h3 class="article__title m-0">{{ $video->present()->title }}</h3>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </article>

@endsection
