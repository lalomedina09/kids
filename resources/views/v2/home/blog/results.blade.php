@extends('layouts.app-v2-redesign')

<title>Resultados | Querido Dinero</title>

@section('content')

@include('v2.home.blog.styles')

<section>
    <div class="container">
        @include('v2.home.blog.search')
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <h2 class="font-akshar fw-bold" style="font-size: 2rem;">
                {{ count($articles) }} Artículos encontrados
                Basados en
                "
                @if ($category)
                    {{ $category->name }} -
                @endif
                {{ $words }}
                "
            </h2>
        </div>
        <div class="row my-4">
            @foreach ($articles as $article)
            <div class="col-md-12 mb-3 shadow rounded">
                <a href="{{ route('articles.show', [$article->slug]) }}" style="text-decoration: none;"
                    title="Ir al articulo {{ $article->title }}">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="{{ $article->present()->featured_image }}" alt="{{ $article->title }}"
                                style="width: 150px; height: 100px; object-fit: cover; border-radius: 10px; margin-top: 15;
                                margin-bottom: 15;">
                        </div>
                        <div class="col-md-10">
                            <h3 class="font-akshar fw-bold text-dark mt-4 mb-2">
                                {{ $article->title }}
                            </h3>
                            <p class="font-akshar text-dark">
                                {{ Str::limit($article->excerpt, 250) }}
                            </p>
                            <br>
                            <p class="font-akshar text-muted" style="font-size: .9rem;">
                                Publicado: {{ $article->present()->published_at }}
                            </p>
                        </div>
                    </div>

                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>



@endsection
