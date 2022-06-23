@extends('layouts.dashboard.base')

@section('dashboard-nav')

    @can('blog.articles.index')
        <a href="{{ route('dashboard.articles.index') }}"
            class="nav-link {{ active_class('dashboard/blog/articles*') }}">
            Artículos
        </a>
    @endcan

    @can('blog.podcasts.index')
        <a href="{{ route('dashboard.podcasts.index') }}"
            class="nav-link {{ active_class('dashboard/blog/podcasts*') }}">
            Podcasts
        </a>
    @endcan

    @can('blog.videos.index')
        <a href="{{ route('dashboard.videos.index') }}"
            class="nav-link {{ active_class('dashboard/blog/videos*') }}">
            Videos
        </a>
    @endcan

    @can('blog.covers.index')
        <a href="{{ route('dashboard.covers.index') }}"
            class="nav-link {{ active_class('dashboard/blog/covers*') }}">
            Cubiertas
        </a>
    @endcan

    @can('blog.quotes.index')
        <a href="{{ route('dashboard.quotes.index') }}"
            class="nav-link {{ active_class('dashboard/blog/quotes*') }}">
            Citas
        </a>
    @endcan

@endsection
