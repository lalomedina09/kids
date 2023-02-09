@extends('layouts.app')

@if (app()->environment() === 'production')
    @push('scripts-inline')
        <script id="fbq-track-ViewContent">
            fbq('track', 'ViewContent', {
                content_ids: ['{{ $podcast->id }}'],
                content_category: '{{ $podcast->category()->present()->name }}',
                content_name: '{{ $podcast->present()->title }}',
                content_type: 'podcast'
            });
            document.getElementById('fbq-track-ViewContent').remove();
        </script>
    @endpush
@endif

@section('content')

    <section class="container single px-lg-5">
        {!! $podcast->present()->iframe !!}

        <article class="single__wrapper">
            <div class="pos-rel">
                <ul class="list-unstyled single__social">
                    @if ($podcast->author->hasMeta('blog', 'facebook'))
                        <li class="single__social-item">
                            <a href="{{ $podcast->author->getMeta('blog', 'facebook') }}" class="text-danger" target="_blank" rel="noopener noreferrer">
                                <span class="fa fa-2x fa-facebook"></span>
                            </a>
                        </li>
                    @endif
                    @if ($podcast->author->hasMeta('blog', 'twitter'))
                        <li class="single__social-item">
                            <a href="{{ $podcast->author->getMeta('blog', 'twitter') }}" class="text-danger" target="_blank" rel="noopener noreferrer">
                                <span class="fa fa-2x fa-twitter"></span>
                            </a>
                        </li>
                    @endif
                    @if ($podcast->author->hasMeta('blog', 'instagram'))
                        <li class="single__social-item">
                            <a href="{{ $podcast->author->getMeta('blog', 'instagram') }}" class="text-danger" target="_blank" rel="noopener noreferrer">
                                <span class="fa fa-2x fa-instagram"></span>
                            </a>
                        </li>
                    @endif
                    @if ($podcast->author->hasMeta('blog', 'youtube'))
                        <li class="single__social-item">
                            <a href="{{ $podcast->author->getMeta('blog', 'youtube') }}" class="text-danger" target="_blank" rel="noopener noreferrer">
                                <span class="fa fa-2x fa-youtube-play"></span>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>

            <div class="single__featured">
                <a href="{{ $podcast->present()->urlCategory }}" class="article__category single__category">
                    {{ $podcast->present()->category }}
                </a>

                <h1 class="single-featured__title">{{ $podcast->present()->title }}</h1>

                <div class="article__author">
                    <div class="float-left">
                        <a href="{{ route('authors.show', [$podcast->owner->profile_key]) }}">
                            <img src="{{ $podcast->owner->present()->profile_photo }}" class="rounded-circle" alt="{{ $podcast->owner->present()->profile_photo }}" width="60" height="60">
                        </a>
                    </div>

                    <div class="float-left ml-2">
                        @if ($podcast->isGuestContent())
                            <p class="small mb-0">{{ $podcast->owner->full_name }} por:</p>
                        @endif
                        <a href="{{ route('authors.show', [$podcast->author->profile_key]) }}">
                            <p class="small mb-0 {{ (!$podcast->isGuestContent()) ? 'mt-2' : '' }}">
                                <span class="text-bold text-danger">{{ $podcast->author->full_name }}</span>
                            </p>
                        </a>
                        <p class="small text-muted">{{ $podcast->present()->published_at }}</p>
                    </div>
                </div>
            </div>

            <div class="single__content mt-4">
                {!! $podcast->present()->body !!}
            </div>

            @unless($podcast->tags->isEmpty())
                <div class="single-tags">
                    <h6 class="single-tags__headline">Etiquetas:</h6>
                    @foreach($podcast->tags as $tag)
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
            <div class="col-12 text-center" @auth data-interactable="{{ $podcast->interactable_code }}" @endauth>
                <h4 class="mt-5 mb-4">Dale like o guárdalo para verlo más tarde</h4>
                <a href="#" class="like-interactable--trigger mr-5">
                    <span class="fa fa-2x {{ ($podcast->likedBy(auth()->user())) ? 'fa-heart text-danger' : 'fa-heart-o' }}"></span>
                </a>
                <a href="#" class="bookmark-interactable--trigger">
                    <span class="fa fa-2x {{ ($podcast->bookmarkedBy(auth()->user())) ? 'fa-bookmark text-danger' : 'fa-bookmark-o' }}"></span>
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
                        @foreach($popular as $podcast)
                            <div class="col-md-4 col-sm-12 videos--item">
                                <a href="{{ $podcast->present()->url }}" class="d-block">
                                    <img src="{{ $podcast->present()->featured_image }}" class="image--article" alt="Article">
                                </a>
                                <a href="{{ $podcast->present()->urlCategory }}" class="d-block">
                                    <p><span class="article__category text-danger">{{ $podcast->present()->category }}</span></p>
                                </a>
                                <a href="{{ $podcast->present()->url }}" class="d-block">
                                    <h3 class="article__title m-0">{{ $podcast->present()->title }}</h3>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </article>

@endsection
