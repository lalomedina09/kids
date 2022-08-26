<div style='position:relative;'>
    @include('partials.main.interactions', ['interactable' => $article, 'share_route' => route('articles.show', $article)])

    <a href="{{ route('articles.show', [$article]) }}" class="d-block">
        <img src="{{ $article->present()->featured_image }}" class="image--article" alt="Article">
        <p class="article--date mb-3">
            {{-- $article->present()->published_at --}} {{ $article->present()->updated_at }} | @if ($article->isGuestContent()) {{ $article->owner->full_name }} por: @endif {{ $article->author->full_name }}
        </p>
    </a>

    <a href="{{ route('articles.category.index', [$article->category()->slug]) }}" class="d-block">
        <p class="article__category text-danger">{{ $article->category()->name }}</p>
    </a>

    <a href="{{ route('articles.show', [$article]) }}" class="d-block">
        <h3 class="article__title m-0">{{ $article->present()->title }}</h3>
    </a>
</div>
