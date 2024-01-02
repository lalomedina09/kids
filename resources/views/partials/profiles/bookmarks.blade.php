<div id="{{ str_slug(__('My bookmarks')) }}" class="tab-pane">

    @include('partials.profiles.components.btn-blog')
    <hr>

    <h5 class="text-danger text-uppercase mb-5">@lang('My bookmarks')</h5>

    <div class="row">
        @forelse($user->bookmarks as $bookmark)
            <div class="col-xl-4 col-lg-4 col-md-6 col-12 videos--item mb-3" @auth data-interactable="{{ $bookmark->bookmarkable->interactable_code }}" @endauth>
                <a href="{{ $bookmark->bookmarkable->present()->url }}"
                    class="d-block">
                    <img src="{{ $bookmark->bookmarkable->present()->featured_image }}" class="image--article" alt="Article">
                </a>

                <a href="{{ route('articles.category.index', [$bookmark->bookmarkable->category()->slug]) }}"
                    class="d-block">
                    <p class="article__category text-danger">{{ $bookmark->bookmarkable->category()->present()->name }}</p>
                </a>

                <a href="{{ $bookmark->bookmarkable->present()->url }}"
                    class="d-block">
                    <h3 class="article__title">{{ $bookmark->bookmarkable->present()->title }}</h3>
                </a>

                <a href="#" class="bookmark-delete--trigger text-center d-block">
                    <span class="text-danger text-uppercase">
                        <span class="fa fa-trash mr-1"></span>
                    </span>
                </a>
            </div>
        @empty
            <div class="col-12">
                <p class="text-muted">No hay articulos guardados</p>
            </div>
        @endforelse
    </div>
</div>
