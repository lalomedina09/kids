@extends('layouts.app')

@section('content')

<div class="container pt-4">
    @include('partials.main.blog')

    <div class="my-5">
        <h1 class="text-center">Articulos</h1>
        <br><br>
        @include('partials.search.bar')
    </div>

    <div id="articles-carousel" class="carousel slide mb-5 article-carousel" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            @foreach($featured as $article)
                <div class="carousel-item{{ $loop->first ? ' active' : '' }}">
                    @include('partials.main.interactions', ['interactable' => $article, 'share_route' => $article->present()->url])
                    <div class="row">
                        <div class="image-background col-lg-6 col-md-6 col-sm-12 col-12" style="background-image: url('{{ $article->present()->thumbnail }}');"></div>
                        <div class="box-secondary col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="articles__featured-content">
                                <p class="text-uppercase small">{{ $article->category()->present()->name }}</p>
                                <h2 class="text-white py-3 mb-0 article--arrow">{{ $article->present()->title }}</h2>
                                <p class="text-primary py-2">{!! $article->present()->excerpt !!}</p>
                                <a href="{{ route('articles.show', $article) }}"">
                                    <span class="text-primary text-uppercase small">
                                        <u>
                                            Leer más
                                            <span class="fa fa-lg fa-arrow-right text-white ml-2"></span>
                                        </u>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <a class="carousel-control-prev" href="#articles-carousel" role="button" data-slide="prev">
            <img src="/images/arrow-left.png" alt="Arrow left">
            <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#articles-carousel" role="button" data-slide="next">
            <img src="/images/arrow-right.png" alt="Arrow rigth">
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="articles">
        @foreach($articles as $key => $c)
            @unless($c->articles->isEmpty())
                @include('partials.articles.slider', ['articles' => $c->articles, 'slider_title' => $c->present()->name, 'slider_title_url' => route('articles.category.index', [$c->slug])])
            @endif
        @endforeach
    </div>
</div>

@endsection
