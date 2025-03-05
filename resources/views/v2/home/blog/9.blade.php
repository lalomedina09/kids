<!-- Columna de 9 -->
<div class="col-md-9">
    <!-- Sección: Lo más reciente -->
    <div class="row mb-4">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <h2 class="section-title font-akshar">Lo más reciente</h2>
            <a href="{{ route('articles.by.word',['recent'])}}" class="red-link">Ver más</a>
        </div>
    </div>

    <div class="row mb-4">
        @foreach ($recents as $recent)
        <div class="col-md-4">
            <a href="{{ route('articles.show', [$recent->slug]) }}" style="text-decoration: none;">
                <div
                    style="height: 180px; background-image: url('{{ $recent->present()->featured_image }}'); background-size: cover; background-position: center;">
                </div>
                <p class="article-title text-dark mt-2">
                    {{ $recent->title }}
                </p>
            </a>
        </div>
        @endforeach
    </div>


    <!-- Sección: Lo más leído -->
    <div class="row mb-4 mt-4">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <h2 class="section-title font-akshar">Lo más leído</h2>
            <a href="{{ route('articles.by.word',['vieweds'])}}" class="red-link">Ver más</a>
        </div>
    </div>
    <div class="row mb-4">
        <!-- Artículo 1 -->
        @foreach ($mostViewedArticles as $read)
        <div class="col-md-4">
            <a href="{{ route('articles.show', [$read->slug]) }}" style="text-decoration: none;">
                <div
                    style="height: 180px; background-image: url('{{ $read->present()->featured_image }}'); background-size: cover; background-position: center;">
                </div>
                <p class="article-title text-dark mt-2">
                    {{ $read->title }}
                </p>
            </a>
        </div>
        @endforeach
    </div>

    <!-- Sección: De temporada -->
    <div class="row mb-4">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <h2 class="section-title font-akshar">De temporada</h2>
            <a href="{{ route('articles.by.word',['seasonal'])}}" class="red-link">Ver más</a>
        </div>
    </div>
    <div class="row mb-4">
        <!-- Artículo 1 -->
        @foreach ($seasonalArticles as $seasonal)
        <div class="col-md-4">
            <a href="{{ route('articles.show', [$seasonal->slug]) }}" style="text-decoration: none;">
                <div
                    style="height: 180px; background-image: url('{{ $seasonal->present()->featured_image }}'); background-size: cover; background-position: center;">
                </div>
                <p class="article-title text-dark mt-2">
                    {{ $seasonal->title }}
                </p>
            </a>
        </div>
        @endforeach
    </div>
</div>
