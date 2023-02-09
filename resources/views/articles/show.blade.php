@extends('layouts.app')

@if (app()->environment() === 'production')
    @push('scripts-inline')
        <script id="fbq-track-ViewContent">
            fbq('track', 'ViewContent', {
                content_ids: ['{{ $article->id }}'],
                content_category: '{{ $article->category()->present()->name }}',
                content_name: '{{ $article->present()->title }}',
                content_type: 'article'
            });
            document.getElementById('fbq-track-ViewContent').remove();
        </script>
    @endpush
@endif

@section('content')

    <div class="container">
        <section class="single px-lg-5">
            <img src="{{ $article->present()->featured_image }}" alt="{{ $article->present()->title }}" class="single-featured__image">

            <article class="single__wrapper">
                <div class="pos-rel">
                    <ul class="list-unstyled single__social">
                        @if ($article->author->hasMeta('blog', 'facebook'))
                            <li class="single__social-item">
                                <a href="{{ $article->author->getMeta('blog', 'facebook') }}" class="text-danger" target="_blank" rel="noopener noreferrer">
                                    <!--<span class="fa fa-2x fa-facebook"></span>-->
                                    <i class="lni lni-facebook-original" style="font-size: 2em"></i>
                                </a>
                            </li>
                        @endif
                        @if ($article->author->hasMeta('blog', 'twitter'))
                            <li class="single__social-item">
                                <a href="{{ $article->author->getMeta('blog', 'twitter') }}" class="text-danger" target="_blank" rel="noopener noreferrer">
                                    <span class="fa fa-2x fa-twitter"></span>
                                </a>
                            </li>
                        @endif
                        @if ($article->author->hasMeta('blog', 'instagram'))
                            <li class="single__social-item">
                                <a href="{{ $article->author->getMeta('blog', 'instagram') }}" class="text-danger" target="_blank" rel="noopener noreferrer">
                                    <!--<span class="fa fa-2x fa-instagram"></span>-->
                                    <i class="lni lni-instagram-filled" style="font-size: 2em"></i>
                                </a>
                            </li>
                        @endif
                        @if ($article->author->hasMeta('blog', 'tiktok'))
                            <li class="single__social-item">
                                <a href="{{ $article->author->getMeta('blog', 'tiktok') }}" class="text-danger" target="_blank" rel="noopener noreferrer">
                                    <i class="lni fa-2x lni-tiktok" style="font-size: 2em"></i>
                                </a>
                            </li>
                        @endif
                        @if ($article->author->hasMeta('blog', 'youtube'))
                            <li class="single__social-item">
                                <a href="{{ $article->author->getMeta('blog', 'youtube') }}" class="text-danger" target="_blank" rel="noopener noreferrer">
                                    <span class="fa fa-2x fa-youtube-play"></span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>

                <div class="single__featured">
                    <a href="{{ route('articles.category.index', $article->category()->slug) }}" class="article__category single__category">
                        {{ $article->category()->present()->name }}
                    </a>

                    <h1 class="single-featured__title">{{ $article->present()->title }}</h1>

                    <div class="article__author">
                        <div class="float-left">
                            <a href="{{ route('authors.show', [$article->owner->profile_key]) }}">
                                <img src="{{ $article->owner->present()->profile_photo }}" class="rounded-circle" width="60" height="60" alt="{{ $article->owner->present()->profile_photo }}" >&nbsp;
                            </a>
                        </div>

                        <div class="float-left ml-2">
                            @if ($article->isGuestContent())
                                <p class="small mb-0">{{ $article->owner->full_name }} por:</p>
                            @endif
                            <a href="{{ route('authors.show', [$article->author->profile_key]) }}">
                                <p class="small mb-0 {{ (!$article->isGuestContent()) ? 'mt-2' : '' }}">
                                    <span class="text-bold text-danger">{{ $article->author->full_name }}</span>
                                </p>
                            </a>
                            <p class="small text-muted">{{ $article->present()->published_at }}</p>
                            {{--<p class="small text-muted">{{ $article->present()->updated_at }}</p>--}}
                            <!--<p class="small text-muted">
                                {{-- getDateSpanish($article->updated_at) --}}
                            </p>-->

                        </div>
                    </div>
                </div>

                <div class="single__content mt-4">
                    {!! $article->present()->body !!}
                </div>

                @unless($article->tags->isEmpty())
                    <div class="single-tags">
                        <h6 class="single-tags__headline">Etiquetas:</h6>
                        @foreach($article->tags as $tag)
                            <a href="{{ route('articles.tags.index', $tag) }}" class="single-tags__item">{{ $tag->present()->name }}</a>
                        @endforeach
                    </div>
                @endunless
            </article>
        </section>

        <section class="my-5 px-lg-5">
            <div class="card">
                <img class="card-img-top" src="{{ asset('/images/newsletter.gif') }}" alt="Subscribe to newsletter">
                <div class="card-body bg-dark">
                    <div class="row">
                        <div class="col-xl-8 col-lg-8 col-md-8 col-12 text-justify">
                            <h3 class="text-white">¡Únete a la comunidad financiera más chida!</h3>
                            <p class="text-white m-0">Toda nuestra buena onda financiera directito a tu correo, además de noticias, eventos y contenidos especiales.</p>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4 col-12 text-center">
                            <button class="btn btn-pill btn-danger mt-3" data-toggle="modal" data-target="#newsletter-modal">Suscribirme al newsletter</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="my-5">
            <div class="text-center">
                <h4 class="mb-4">¿Te gustó el artículo? ¡Dale share!</h4>
                <div id="share-two" class="bottom__social"></div>
            </div>

            <div class="text-center" @auth data-interactable="{{ $article->interactable_code }}" @endauth>
                <h4 class="mt-5 mb-4">Dale like o guárdalo para verlo más tarde</h4>
                <a href="#" class="like-interactable--trigger mr-5">
                    <span class="fa fa-2x {{ ($article->likedBy(auth()->user())) ? 'fa-heart text-danger' : 'fa-heart-o' }}"></span>
                </a>
                <a href="#" class="bookmark-interactable--trigger">
                    <span class="fa fa-2x {{ ($article->bookmarkedBy(auth()->user())) ? 'fa-bookmark text-danger' : 'fa-bookmark-o' }}"></span>
                </a>
            </div>
        </section>

        <section class="my-5">
            <h3 class="home__title home__title--danger">Artículos relacionados</h3>
            <div class="row videos">
                @foreach($related as $article)
                    <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                        @include('partials.articles.card', ['article' => $article])
                    </div>
                @endforeach
            </div>
        </section>
    </div>

@endsection
