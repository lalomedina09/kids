<div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-12 text-center">
    <a href="{{ route('exhibitors.show', [$author->profile_key]) }}" class="d-block">
        <img src="{{ $author->present()->author_photo }}" class="image--article custom-filter-gray" alt="{{ $author->present()->fullname }}">
    </a>

    <a href="{{ route('exhibitors.show', [$author->profile_key]) }}"
        class="d-block mb-1">
        <h3 class="article__title m-0">{{ $author->present()->fullname }}</h3>
    </a>
</div>
