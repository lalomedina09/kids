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
                                    <img src="{{ $article->owner->present()->profile_photo }}" class="rounded-circle"
                                        width="60" height="60"
                                        alt="{{ $article->owner->present()->profile_photo }}">&nbsp;
                                </a>
                            </div>
                            <div class="float-left ml-2">
                                @if ($article->isGuestContent())
                                <p class="small mb-0">{{ $article->owner->full_name }} por:</p>
                                @endif
                                <a href="{{ route('authors.show', [$article->author->profile_key]) }}">
                                    <p class="small mb-0 {{ !$article->isGuestContent() ? 'mt-2' : '' }}">
                                        <span class="text-bold text-danger">{{ $article->author->full_name }}</span>
                                    </p>
                                </a>
                                <p class="small text-muted">{{ $article->present()->published_at }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" style="position: relative;">
                        <div class="d-flex justify-content-end gap-2" style="position: absolute; bottom: 0; right: 0;">
                            <!-- Botón de menú para pantallas pequeñas -->
                            <button class="btn btn-sm btn-dark font-akshar btn-reaction d-block d-md-none" title="Acciones"
                                style="margin-right: 10px;" onclick="toggleReactionMenu()">
                                <i class="fas fa-ellipsis-v"></i> <!-- Icono de menú (puedes cambiarlo) -->
                            </button>

                            <!-- Menú desplegable para pantallas pequeñas -->
                            <div id="reaction-menu" class="reaction-menu d-none"
                                style="position: absolute; bottom: 40px; right: 10px; background: #fff; border: 1px solid #ccc; border-radius: 5px; box-shadow: 0 2px 5px rgba(0,0,0,0.2); z-index: 1000;">
                                <button class="btn btn-sm btn-dark font-akshar btn-share w-100 text-left" title="Compartir"
                                    style="border-radius: 0;">
                                    <i class="fas fa-share-alt"></i> Compartir
                                </button>
                                <button class="btn btn-sm btn-dark font-akshar btn-like w-100 text-left" data-article-id="{{ $article->id }}"
                                    title="Me gusta" @guest data-toggle="modal" data-target="#modalLogin" @endguest>
                                    <i class="fas fa-heart"></i>
                                    @if ($isLiked)
                                        Te gusta
                                    @else
                                        Me gusta
                                    @endif
                                </button>
                                <button class="btn btn-sm btn-dark font-akshar btn-bookmark w-100 text-left"
                                    data-article-id="{{ $article->id }}" title="Guardar" @guest data-toggle="modal" data-target="#modalLogin"
                                    @endguest>
                                    <i class="fas fa-bookmark"></i>
                                    @if ($isBookmarked)
                                        Guardado
                                    @else
                                        Guardar
                                    @endif
                                </button>
                            </div>

                            <!-- Botones originales para pantallas medianas y grandes -->
                            <div class="d-none d-md-flex gap-2">
                                <!-- Botón de compartir -->
                                <button class="btn btn-sm btn-dark font-akshar btn-share" title="Compartir" style="margin-right: 10px;">
                                    <i class="fas fa-share-alt"></i>
                                    <span class="d-none d-sm-inline"> Compartir</span>
                                </button>

                                <!-- Botón de me gusta -->
                                <button class="btn btn-sm btn-dark font-akshar btn-like" data-article-id="{{ $article->id }}" title="Me gusta"
                                    style="margin-right: 10px;" @guest data-toggle="modal" data-target="#modalLogin" @endguest>
                                    <i class="fas fa-heart"></i>
                                    <span class="d-none d-sm-inline">
                                        @if ($isLiked)
                                            Te gusta
                                        @else
                                            Me gusta
                                        @endif
                                    </span>
                                </button>

                                <!-- Botón de guardar -->
                                <button class="btn btn-sm btn-dark font-akshar btn-bookmark" data-article-id="{{ $article->id }}"
                                    title="Guardar" @guest data-toggle="modal" data-target="#modalLogin" @endguest>
                                    <i class="fas fa-bookmark"></i>
                                    <span class="d-none d-sm-inline">
                                        @if ($isBookmarked)
                                            Guardado
                                        @else
                                            Guardar
                                        @endif
                                    </span>
                                </button>
                            </div>
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


<script src="{{ asset('js/article-interactions.js') }}"></script>

<style>
    /* Ajustes opcionales */
    .btn-dark {
        background-color: #000;
        /* Negro puro */
        border-color: #000;
    }

    .btn-dark:hover {
        background-color: #333;
        /* Gris oscuro al pasar el ratón */
        border-color: #333;
    }

    .btn-sm i {
        font-size: 14px;
        /* Tamaño del ícono */
    }

    .text-category {
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

<!-- CSS para el menú desplegable -->
<style>
    .reaction-menu {
        min-width: 150px;
    }

    .reaction-menu button {
        display: block;
        padding: 10px;
        border-bottom: 1px solid #eee;
    }

    .reaction-menu button:last-child {
        border-bottom: none;
    }

    .reaction-menu button:hover {
        background-color: #f8f9fa;
    }
</style>

<script>
    $(document).ready(function() {
        @auth
        // Función para manejar el botón "Guardar"
        $('.btn-bookmark').on('click', function() {
            const articleId = $(this).data('article-id');
            const button = $(this);

            $.ajax({
                url: `/articulos/${articleId}/guardar`,
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    // Cambiar el estado del botón
                    if (data.is_bookmarked) {
                        button.html('<i class="fas fa-bookmark"></i> Guardado');
                        button.removeClass('btn-dark').addClass('btn-success');
                    } else {
                        button.html('<i class="fas fa-bookmark"></i> Guardar');
                        button.removeClass('btn-success').addClass('btn-dark');
                    }

                    // Mostrar mensaje con SweetAlert
                    Swal.fire({
                        icon: 'success',
                        title: data.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Ocurrió un error al guardar el artículo.',
                    });
                }
            });
        });

        // Función para manejar el botón "Me gusta"
        $('.btn-like').on('click', function() {
            const articleId = $(this).data('article-id');
            const button = $(this);

            $.ajax({
                url: `/articulos/${articleId}/me-gusta`,
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    // Cambiar el estado del botón
                    if (data.is_liked) {
                        button.html('<i class="fas fa-heart"></i> Te gusta');
                        button.removeClass('btn-dark').addClass('btn-danger');
                    } else {
                        button.html('<i class="fas fa-heart"></i> Me gusta');
                        button.removeClass('btn-danger').addClass('btn-dark');
                    }

                    // Mostrar mensaje con SweetAlert
                    Swal.fire({
                        icon: 'success',
                        title: data.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Ocurrió un error al dar "Me gusta".',
                    });
                }
            });
        });
        @endauth

        // Función para manejar el botón "Compartir"
        $('.btn-share').on('click', function() {
            const articleUrl = window.location.href; // Obtener la URL actual del artículo
            const articleTitle = "{{ $article->present()->title }}"; // Obtener el título del artículo

            Swal.fire({
                title: '<span class="font-akshar">Compartir artículo</span>',
                html: `
                    <div class="text-left">
                        <p class="font-akshar">Compartir en redes sociales:</p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(articleUrl)}" target="_blank" class="btn btn-primary btn-sm mx-2">
                                <i class="fab fa-facebook"></i> Facebook
                            </a>
                            <a href="https://twitter.com/intent/tweet?url=${encodeURIComponent(articleUrl)}&text=${encodeURIComponent(articleTitle)}" target="_blank" class="btn btn-info btn-sm mx-2">
                                <i class="fab fa-twitter"></i> Twitter
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?url=${encodeURIComponent(articleUrl)}&title=${encodeURIComponent(articleTitle)}" target="_blank" class="btn btn-secondary btn-sm mx-2">
                                <i class="fab fa-linkedin"></i> LinkedIn
                            </a>
                        </div>
                        <hr>
                        <p class="font-akshar">Compartir por correo electrónico:</p>
                        <a href="mailto:?subject=${encodeURIComponent(articleTitle)}&body=${encodeURIComponent(articleUrl)}" class="btn btn-danger btn-sm font-akshar">
                            <i class="fas fa-envelope"></i> Correo electrónico
                        </a>
                        <hr>
                        <p class="font-akshar">Copiar enlace:</p>
                        <div class="input-group">
                            <input type="text" id="share-url" class="form-control font-akshar" value="${articleUrl}" readonly>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary font-akshar" onclick="copyToClipboard()">
                                    <i class="fas fa-copy"></i> Copiar
                                </button>
                            </div>
                        </div>
                    </div>
                `,
                showCloseButton: true,
                showConfirmButton: false,
                width: '600px'
            });
        });

        // Función para copiar la URL al portapapeles
        window.copyToClipboard = function() {
            const copyText = document.getElementById("share-url");
            navigator.clipboard.writeText(copyText.value).then(function() {
                console.log('Enlace copiado correctamente:', copyText.value);
                Swal.fire({
                    icon: 'success',
                    title: 'Enlace copiado',
                    showConfirmButton: false,
                    timer: 1500
                });
            }, function(err) {
                console.error('Error al copiar el enlace:', err);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se pudo copiar el enlace.',
                });
            });
        }
    });
</script>

<!-- JavaScript para togglear el menú -->
<script>
    function toggleReactionMenu() {
        const menu = document.getElementById('reaction-menu');
        menu.classList.toggle('d-none');
    }

    // Cerrar el menú si se hace clic fuera de él
    document.addEventListener('click', function(event) {
        const menu = document.getElementById('reaction-menu');
        const button = document.querySelector('.btn-reaction');
        if (!menu.contains(event.target) && !button.contains(event.target)) {
            menu.classList.add('d-none');
        }
    });
</script>
