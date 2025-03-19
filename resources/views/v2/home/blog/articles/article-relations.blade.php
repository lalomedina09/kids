<section style="background-color: #eeeeee;">
    <div class="container">
        <div class="row">
            <div class="col-12 my-4">
                <h2 class="title-section font-beley text-center mb-4" style="font-size: 3rem;">
                    Artículos relacionados
                </h2>
            </div>
            @foreach ($related as $relatedArticle)
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="{{ route('articles.show', ['slug' => $relatedArticle->slug]) }}">
                        <img src="{{ $relatedArticle->present()->featured_image }}" class="card-img-top" alt="{{ $relatedArticle->present()->title }}" style="height: 200px; object-fit: cover;">
                    </a>

                    <p class="small text-muted">{{ $relatedArticle->present()->published_at }}</p>

                    <a href="{{ route('articles.category.index', $relatedArticle->category()->slug) }}"
                        class="article__category single__category text-category " style="font-weight: normal;">
                        {{ $relatedArticle->category()->present()->name }}
                    </a>

                    <a href="{{ route('articles.show', ['slug' => $relatedArticle->slug]) }}">
                        <h6 class="card-title font-beley" style="font-weight: 500;"><em>{{ $relatedArticle->present()->title }}</em></h6>
                    </a>
                </div>
            @endforeach
        </div>
        <br><br>
    </div>
</section>
