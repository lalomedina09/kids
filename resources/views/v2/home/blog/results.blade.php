@extends('layouts.app-v2-redesign')

<title>Resultados | Querido Dinero</title>

@section('content')

@include('v2.home.blog.styles')

<section>
    <div class="container">
        @include('v2.home.blog.search')
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="font-akshar fw-bold" style="font-size: 2rem;">
                    {{ count($articles) }} Artículos encontrados
                    Basados en
                    <span class="d-block d-md-inline">
                        "
                        @if ($category)
                        {{ $category->name }} -
                        @endif
                        {{ $words }}
                        "
                    </span>
                </h2>
            </div>
        </div>
        <div class="row my-4">
            @foreach ($articles as $article)
            <div class="col-md-12 mb-5 shadow-sm rounded mx-md-0 mx-4" style="border-left: solid;">
                <a href="{{ route('articles.show', [$article->slug]) }}" style="text-decoration: none;"
                    title="Ir al articulo {{ $article->title }}">
                    <div class="row">
                        <div class="col-md-2 d-none d-lg-block">
                            <img src="{{ $article->present()->featured_image }}" alt="{{ $article->title }}"
                                style="width: 150px; height: 100px; object-fit: cover; border-radius: 10px; margin-top: 15px; margin-bottom: 15px;">
                        </div>
                        <div class="col-md-10">
                            <h3 class="font-akshar fw-bold text-dark mt-4 mb-2 article-title"
                                data-text="{{ $article->title }}">
                                {{ $article->title }}
                            </h3>
                            <p class="font-akshar text-dark article-excerpt"
                                data-text="{{ Str::limit($article->excerpt, 250) }}">
                                {{ Str::limit($article->excerpt, 250) }}
                            </p>
                            <br>
                            <p class="font-akshar text-muted mb-3" style="font-size: .9rem;">
                                Publicado: {{ $article->present()->published_at }}
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    .highlight {
        background-color: yellow;
        color: black;
        padding: 2px 0;
        border-radius: 2px;
        display: inline-block;
        line-height: 1.2;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Obtener las palabras buscadas desde una variable PHP
        const searchWords = "{{ $words }}".split(' ').filter(word => word.length > 0);

        // Seleccionar todos los títulos y extractos
        const titles = document.querySelectorAll('.article-title');
        const excerpts = document.querySelectorAll('.article-excerpt');

        // Función para normalizar texto y eliminar acentos
        function removeAccents(str) {
            return str.normalize('NFD').replace(/[\u0300-\u036f]/g, '');
        }

        // Función para resaltar palabras ignorando acentos
        function highlightText(element, words) {
            let text = element.getAttribute('data-text');
            if (!text || words.length === 0) return;

            // Normalizar el texto original y las palabras buscadas
            const normalizedText = removeAccents(text);
            const normalizedWords = words.map(word => removeAccents(word));

            // Crear una expresión regular con las palabras normalizadas (insensible a mayúsculas/minúsculas)
            const regex = new RegExp(`\\b(${normalizedWords.map(word => word.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&')).join('|')})\\b`, 'gi');

            // Encontrar coincidencias en el texto normalizado
            let match;
            let highlightedText = text;
            while ((match = regex.exec(normalizedText)) !== null) {
                const start = match.index;
                const end = start + match[0].length;
                const originalMatch = text.substring(start, end); // Usar el texto original para conservar acentos
                highlightedText = highlightedText.replace(originalMatch, `<span class="highlight">${originalMatch}</span>`);
            }

            // Actualizar el contenido del elemento
            element.innerHTML = highlightedText;
        }

        // Aplicar resaltado a cada título y extracto
        titles.forEach(title => highlightText(title, searchWords));
        excerpts.forEach(excerpt => highlightText(excerpt, searchWords));
    });
</script>


@include('v2.components.loading')
@endsection
