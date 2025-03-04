<!-- Columna de 9 -->
<div class="col-md-9">
    <!-- Sección: Lo más reciente -->
    <div class="row mb-4">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <h2 class="section-title font-akshar">Lo más reciente</h2>
            <a href="#" class="red-link">Ver más</a>
        </div>
    </div>
    <div class="row mb-4">
        @foreach ($recents as $recent)
            <div class="col-md-4">
                <a href="{{ route('articles.show', [$recent->slug]) }}" style="text-decoration: none;">
                    <div>
                        <img src="{{ $recent->present()->featured_image }}"
                            class="img-fluid mb-2 mt-2" alt="{{ $recent->title }}">
                    </div>
                    <p class="article-title text-dark">
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
            <a href="#" class="red-link">Ver más</a>
        </div>
    </div>
    <div class="row mb-4">
        <!-- Artículo 1 -->
        @foreach ($mostViewedArticles as $read)
        <div class="col-md-4">
            <a href="{{ route('articles.show', [$read->slug]) }}" style="text-decoration: none;">
                <div>
                    <img src="{{ $read->present()->featured_image }}" class="img-fluid mb-2 mt-2" alt="{{ $read->title }}">
                </div>
                <p class="article-title text-dark">
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
            <a href="#" class="red-link">Ver más</a>
        </div>
    </div>
    <div class="row mb-4">
        <!-- Artículo 1 -->
        @foreach ($seasonalArticles as $seasonal)
        <div class="col-md-4">
            <a href="{{ route('articles.show', [$seasonal->slug]) }}" style="text-decoration: none;">
                <div title="{{ $seasonal->title }} - Pub: {{ \Carbon\Carbon::parse($seasonal->published_at)->format('M Y') }}">
                    <img src="{{ $seasonal->present()->featured_image }}" class="img-fluid mb-2 mt-2" alt="{{ $seasonal->title }} - Pub: {{ \Carbon\Carbon::parse($seasonal->published_at)->format('M Y') }}">
                </div>
                <p class="article-title text-dark">
                    {{ $seasonal->title }}
                </p>
            </a>
        </div>
        @endforeach
    </div>
</div>
