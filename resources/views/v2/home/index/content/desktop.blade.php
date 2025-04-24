@php
    // Asignar elementos específicos para cada columna
    $leftColumnItems = [
            [
                'type' => 'article',
                'data' => $previousArticles->first() // Primer artículo
            ],
            [
                'type' => 'course',
                'data' => $randomCourses->first() // Primer curso
            ]
        ];

    $rightColumnItems = [
        [
            'type' => 'course',
            'data' => $randomCourses->last() // Segundo curso
        ],
        [
            'type' => 'article',
            'data' => $previousArticles->last() // Segundo artículo
        ]
    ];
@endphp

<div class="row ml-2 mr-2 d-none d-lg-flex">
    <!-- Columna izquierda -->
    <div class="col-md-3 col-lg-3">
        <div class="row">
            @foreach($leftColumnItems as $item)
            <div class="col-md-12 col-lg-12 mb-4">
                @if($item['type'] === 'article')
                <!-- Mostrar artículo -->
                <a target="_blank" href="{{ route('articles.show', [$item['data']->slug]) }}" class="link-content">
                    <img class="image-3 img-content-cover-lateral"
                        src="{{ $item['data']->present()->featured_image }}" alt="{{ $item['data']->title }}">
                    <div class="text-wrapper-24 mt-2">
                        Artículo
                    </div>
                    <p class="text-wrapper-23 quote-content mt-2">
                        {{ $item['data']->title }}
                    </p>
                </a>
                @elseif($item['type'] === 'course')
                <!-- Mostrar curso -->
                <a target="_blank" href="{{ route('qdplay.watch', [$item['data']->public_id]) }}" class="link-content">
                    <img class="image-2 img-content-cover-lateral"
                        src="{{ asset('storage/' . $item['data']->thumbnail) }}" alt="{{ $item['data']->name }}">
                    <div class="text-wrapper-22 mt-2">
                        Curso online
                    </div>
                    <p class="tarjetas-de-cr-dito quote-content mt-2">
                        {{ $item['data']->name }}
                    </p>
                </a>
                @endif
            </div>
            @endforeach
        </div>
    </div>

    <!-- Columna central (Artículo más reciente) -->
    <div class="col-md-6 col-lg-6">
        <div class="row">
            <div class="col-12">
                <!-- Artículo más reciente -->
                <a target="_blank" href="{{ route('articles.show', [$latestArticle->slug]) }}"
                    class="link-content-main">
                    <img class="estres-financiero img-fluid" src="{{ $latestArticle->present()->featured_image }}"
                        alt="{{ $latestArticle->title }}" style="height: 350px;">
                    <div class="text-wrapper-28 mt-3">
                        Artículo
                    </div>
                    <div class="text-wrapper-27 mt-4">
                        {{ $latestArticle->title }}
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Columna derecha -->
    <div class="col-md-3 col-lg-3">
        <div class="row">
            @foreach($rightColumnItems as $item)
            <div class="col-md-12 col-lg-12 mb-4">
                @if($item['type'] === 'article')
                <!-- Mostrar artículo -->
                <a target="_blank" href="{{ route('articles.show', [$item['data']->slug]) }}" class="link-content">
                    <img class="image-3 img-content-cover-lateral"
                        src="{{ $item['data']->present()->featured_image }}" alt="{{ $item['data']->title }}">
                    <div class="text-wrapper-24 mt-2">
                        Artículo
                    </div>
                    <p class="text-wrapper-23 quote-content mt-2">
                        {{ $item['data']->title }}
                    </p>
                </a>
                @elseif($item['type'] === 'course')
                <!-- Mostrar curso -->
                <a target="_blank" href="{{ route('qdplay.watch', [$item['data']->public_id]) }}" class="link-content">
                    <img class="image-2 img-content-cover-lateral"
                        src="{{ asset('storage/' . $item['data']->thumbnail) }}" alt="{{ $item['data']->name }}">
                    <div class="text-wrapper-22 mt-2">
                        Curso online
                    </div>
                    <p class="tarjetas-de-cr-dito quote-content mt-2">
                        {{ $item['data']->name }}
                    </p>
                </a>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>
