@extends('layouts.app')

@section('content')

    <section class="home pt-5">
        <div class="container">
            <div class="mb-4">
                @include('partials.search.bar')
            </div>

            <article class="featured box">
                <div class="pos-rel">
                    <ul class="list-unstyled single__social">
                        <li class="single__social-item">
                            <a href="{{ config('money.url.facebook') }}" target="_blank" rel="noopener noreferrer">
                                <img src="{{ asset('images/facebook.svg') }}" alt="Facebook" class="single__social-logo animated slideInLeft">
                            </a>
                        </li>
                        <li class="single__social-item">
                            <a href="{{ config('money.url.twitter') }}" target="_blank" rel="noopener noreferrer">
                                <img src="{{ asset('images/twitter.svg') }}" alt="Twitter" class="single__social-logo animated slideInLeft">
                            </a>
                        </li>
                        <li class="single__social-item">
                            <a href="{{ config('money.url.instagram') }}" target="_blank" rel="noopener noreferrer">
                                <img src="{{ asset('images/instagram.svg') }}" alt="Instagram" class="single__social-logo animated slideInLeft">
                            </a>
                        </li>
                        <li class="single__social-item">
                            <a href="{{ config('money.url.youtube') }}" target="_blank" rel="noopener noreferrer">
                                <img src="{{ asset('images/youtube.svg') }}" alt="Youtube" class="single__social-logo animated slideInLeft">
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="row featured__container">
                    @foreach($covers as $cover)
                        @include('partials.home.cover', ['loop' => $loop, 'cover' => $cover])
                    @endforeach
                </div>
            </article>

            @include('partials.main.blog')

            <article class="articles box">
                <div class="row">
                    <div class="col-lg-9">
                        @include('partials.articles.slider', ['articles' => $recommended, 'slider_title' => 'Te recomendamos leer', 'slider_title_url' => route('articles.index')])

                        @include('partials.articles.slider', ['articles' => $latest, 'slider_title' => 'Últimos artículos', 'slider_title_url' => route('articles.index')])
                    </div>

                    <div class="col-lg-3">
                        <h3 class="text-center text-uppercase mb-4 title--underline">
                            <span class="underline" data-animate="visible" data-animation="rubberBand"></span>
                            Trending
                        </h3>

                        <div class="trending__container">
                            <span class="arrow" data-animate="visibleOnce" data-animation="fadeInDown"></span>
                            @foreach($trending as $article)
                                <div class="row trending__item">
                                    <div class="col d-flex">
                                        <div class="trending__item--number">
                                            <h3 class="trending--count">{{ $loop->iteration }}</h3>
                                        </div>
                                        <div class="pos-rel trending__item--container" @auth data-interactable="{{ $article->interactable_code }}" @endauth>
                                            <a href="#" class="bookmark-interactable--trigger link--trending">
                                                <span class="fa {{ ($article->bookmarkedBy(auth()->user())) ? 'fa-bookmark text-danger' : 'fa-bookmark-o' }}"></span>
                                            </a>
                                            <a href="{{ route('articles.show', $article) }}" class="d-block trending--title">{{ $article->present()->title }}</a>
                                            <a href="{{ route('articles.category.index', $article->category()->slug) }}">
                                                <p class="trending--category"><span class="article__category text-danger">{{ $article->category()->present()->name }}</span></p>
                                            </a>
                                            <p class="article--date">{{ $article->present()->published_at }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </article>

            <article class="videos box mt-xs-3 pt-md-0">
                @include('partials.videos.slider', ['videos' => $videos, 'type' => 'video', 'slider_title' => 'Videos', 'slider_title_url' => route('videos.index')])

                @include('partials.videos.slider', ['videos' => $radio, 'type' => 'podcast', 'slider_title' => 'Podcast', 'slider_title_url' => route('podcasts.index')])
            </article>
        </div>

        @isset($quote)
            <article class="quote box box-secondary">
                <div class="quote__container text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 offset-md-0 col-lg-8 offset-lg-2">
                                <p class="mb-4"><strong class="text-uppercase">#quote</strong></p>
                                {!! $quote->body !!}
                                <p class="m-0 text-bold">
                                    <span class="text-dark text-uppercase title--underline">
                                        <span class="underline" data-animate="visible" data-animation="rubberBand"></span>
                                        {{ $quote->title }}
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        @endisset

        <article class="subscribe box box-danger">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-xl-4 col-lg-6">
                        <h2 class="text-white">Suscríbete a nuestro</h2>
                        <h2 class="text-dark mb-3">Newsletter</h2>
                        <p class="text-white m-0">Toda nuestra buena onda financiera directito a tu correo además de noticias, eventos y contenidos especiales.</p>
                    </div>
                    <div class="col-xl-6 offset-xl-2 col-lg-6 offset-lg-0 text-center mt-4">
                        <p class="mb-2"><strong class="text-dark">¡Únete a la comunidad Querido Dinero!</strong></p>

                        <button class="btn btn-pill btn-dark mb-2" data-toggle="modal" data-target="#newsletter-modal">Suscribirme al newsletter</button>

                        <p class="mb-2">
                            <a href="{{ route('privacy') }}" class="text-underline text-dark text-small">Consulta nuestro aviso de privacidad</a>
                        </p>
                    </div>
                </div>
            </div>
        </article>
    </section>

@endsection
