@php
    // Combinar los datos intercalando artículos y cursos
    $carouselItems = collect([]);

    // Agregar el artículo más reciente primero
    $carouselItems->push([
    'type' => 'article',
    'data' => $latestArticle
    ]);

    // Intercalar cursos y artículos
    for ($i = 0; $i < max($randomCourses->count(), $previousArticles->count()); $i++) {
        if ($i < $randomCourses->count()) {
            $carouselItems->push([
                'type' => 'course',
                'data' => $randomCourses[$i]
            ]);
            }
            if ($i < $previousArticles->count()) {
                $carouselItems->push([
                    'type' => 'article',
                    'data' => $previousArticles[$i]
                ]);
                }
            }
@endphp
<div id="contentCarousel" class="carousel slide d-md-none" data-ride="carousel">
    <!-- Indicadores del carrusel -->
    <ol class="carousel-indicators">
        @foreach($carouselItems as $index => $item)
        <li data-target="#contentCarousel" data-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"></li>
        @endforeach
    </ol>

    <!-- Contenido del carrusel -->
    <div class="carousel-inner">
        @foreach($carouselItems as $index => $item)
        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
            @if($item['type'] === 'article')
            <!-- Mostrar artículo -->
            <a target="_blank" href="{{ route('articles.show', [$item['data']->slug]) }}" class="link-content">
                <img class="image-3 img-fluid" src="{{ $item['data']->present()->featured_image }}"
                    alt="{{ $item['data']->title }}">
                <div class="text-wrapper-24 mt-2">
                    Artículo
                </div>
                <br>
                <div class="text-wrapper-27 mt-4">
                    {{ $item['data']->title }}
                </div>
                <br><br>
                <div>
                    <a class="btn-link-content">Ver más</a>
                </div>
                <br><br>
            </a>
            @elseif($item['type'] === 'course')
            <!-- Mostrar curso -->
            <a target="_blank" href="{{ route('qdplay.watch', [$item['data']->public_id]) }}" class="link-content">
                <img class="image-5 img-fluid" src="{{ asset('storage/' . $item['data']->thumbnail) }}" alt="{{ $item['data']->name }}">
                <div class="text-wrapper-24 mt-2">
                    Curso online
                </div>
                <br>
                <div class="text-wrapper-27 mt-4">
                    {{ $item['data']->name }}
                </div>
                <br><br>
                <div>
                    <a class="btn-link-content">Ver más</a>
                </div>
                <br><br>
            </a>
            @endif
        </div>
        @endforeach
    </div>
</div>
