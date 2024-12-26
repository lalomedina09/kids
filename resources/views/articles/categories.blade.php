{{--@extends('layouts.app')--}}
@extends('layouts.v2.app')
@section('content')

<div class="container pt-4">
    @include('partials.main.blog')

    <div class="my-5">
        @include('partials.search.bar')
    </div>

    <h1 class="home__title home__title--secondary my-4">{{ $category->present()->name }}</h1>

    <div class="row mb-4">
        @foreach($articles as $article)
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 mb-5">
                @include('partials.articles.card', ['article' => $article])
            </div>
        @endforeach
    </div>
</div>

@endsection
