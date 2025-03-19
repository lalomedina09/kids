@extends('layouts.app-v2-redesign')

<title>Home | Querido Dinero</title>

@section('content')

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

{{--<section style="background-color: #000;">
    @include('v2.home.index.content')
</section>--}}

@include('v2.home.blog.styles')

@include('v2.home.blog.articles.bar-tags-search')

@include('v2.home.blog.articles.data-article')

@include('v2.home.blog.articles.article-header')

@include('v2.components.modals.login', ['source' => 'blog', 'channel' => 'article'])
@include('v2.components.modals.sign-up', ['source' => 'blog', 'channel' => 'article'])

@include('v2.components.loading')
@endsection
