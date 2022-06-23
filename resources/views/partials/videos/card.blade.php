<div style="position:relative;">
    @include('partials.main.interactions', ['interactable' => $media, 'share_route' => route('videos.show', [$media->slug])])

    <a href="{{ $media->present()->url }}" class="d-block">
        <img src="{{ $media->present()->featured_image }}" class="image--article" alt="Article">
    </a>

    <a href="{{ route('podcasts.category.index', $media->category()->slug) }}">
        <p><span class="article__category text-danger">{{ $media->present()->category }}</span></p>
    </a>

    <a href="{{ $media->present()->url }}" class="d-block">
        <h3 class="article__title m-0">{{ $media->present()->title }}</h3>
    </a>
</div>
