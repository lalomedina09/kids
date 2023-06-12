<div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-12 text-center">
    <a href="{{ route('authors.show', [$author->profile_key]) }}" class="d-block">
        <img src="{{ $author->present()->author_photo }}" class="image--article" style="border-radius: 250px; width: 210px;" alt="{{ $author->present()->fullname }}">
    </a>

    <a href="{{ route('authors.show', [$author->profile_key]) }}"
        class="d-block mb-1">
        <h3 class="article__title m-0">{{ $author->present()->fullname }}</h3>
    </a>
</div>
