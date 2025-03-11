<section>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('articles.category.index', $article->category()->slug) }}"
                        class="article__category single__category text-category">
                        {{ $article->category()->present()->name }}
                </a>

                <h1 class="single-featured__title">{{ $article->present()->title }}</h1>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="article__author">
                            <div class="float-left">
                                <a href="{{ route('authors.show', [$article->owner->profile_key]) }}">
                                    <img src="{{ $article->owner->present()->profile_photo }}" class="rounded-circle" width="60"
                                        height="60" alt="{{ $article->owner->present()->profile_photo }}">&nbsp;
                                </a>
                            </div>
                            <div class="float-left ml-2">
                                @if ($article->isGuestContent())
                                    <p class="small mb-0">{{ $article->owner->full_name }} por:</p>
                                @endif
                                <a href="{{ route('authors.show', [$article->author->profile_key]) }}">
                                    <p class="small mb-0 {{ (!$article->isGuestContent()) ? 'mt-2' : '' }}">
                                        <span class="text-bold text-danger">{{ $article->author->full_name }}</span>
                                    </p>
                                </a>
                                <p class="small text-muted">{{ $article->present()->published_at }}</p>                            
                            </div>
                        </div>  
                    </div>
                    <div class="col-md-6" style="position: relative;">
                        <div class="d-flex justify-content-end gap-2" style="position: absolute; bottom: 0; right: 0;">
                            <!-- Botón de compartir -->
                            <button class="btn btn-sm btn-dark font-akshar" title="Compartir" style="margin-right: 10px;">
                                <i class="fas fa-share-alt"></i> Compartir
                            </button>

                            <!-- Botón de me gusta -->
                            <button class="btn btn-sm btn-dark font-akshar" title="Me gusta" style="margin-right: 10px;">
                                <i class="fas fa-heart"></i> Me gusta
                            </button>

                            <!-- Botón de guardar -->
                            <button class="btn btn-sm btn-dark font-akshar" title="Guardar">
                                <i class="fas fa-bookmark"></i> Guardar
                            </button>
                        </div>
                    </div>
                </div>                
            </div>
            <div class="col-md-12 mt-3 mb-4">
                <img src="{{ $article->present()->featured_image }}" alt="{{ $article->present()->title }}"
                    class="single-featured__image" width="100%">
            </div>
        </div>
    </div>
</section>

<style>
    /* Ajustes opcionales */
    .btn-dark {
        background-color: #000; /* Negro puro */
        border-color: #000;
    }

    .btn-dark:hover {
        background-color: #333; /* Gris oscuro al pasar el ratón */
        border-color: #333;
    }

    .btn-sm i {
        font-size: 14px; /* Tamaño del ícono */
    }

    .text-category{
        color: #D51500;
        font-weight: bold;
    }
    .text-muted {
        font-size: 1rem;
    }
    .article__author {
        overflow: hidden;
    }
</style>