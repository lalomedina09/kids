<section style="background-color: #E2E2E2;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Menú interno del blog -->
                <div class="row align-items-center my-2">
                    <!-- 10 columnas para los tags -->
                    <div class="col-md-9">
                        <ul class="nav flex-row flex-wrap">
                            @foreach ($topTags as $tag)
                            <li class="nav-item">
                                <a href="{{ route('articles.by.tag', $tag['slug']) }}"
                                    class="nav-link px-2 mt-2 font-akshar text-decoration-none"
                                    style="font-size: 1rem;"
                                    title="Ver artículos de {{ $tag['name'] }}">
                                    {{ $tag['name'] }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- 2 columnas para el buscador -->
                    <div class="col-md-3">
                        <form action="{{ route('articles.search.full') }}" method="POST" class="d-flex align-items-center" id="searchForm">
                            @csrf
                            <input type="text" name="words" class="form-control me-2 mt-2 font-akshar" placeholder="Buscar artículos"
                                aria-label="Buscar">
                            <button type="submit" class="btn btn-dark mt-2">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Ajustes para el menú */
    .nav-link {
        color: #333;
        /* Color de los enlaces */
        text-decoration: none;
    }

    .nav-link:hover {
        color: #000000;
        font-weight: 500;
        /* Color al pasar el ratón */
    }

    /* Ajustes responsivos */
    @media (max-width: 767px) {
        .nav.flex-row {
            flex-direction: column;
            /* Apilar tags en móviles */
        }

        .nav-item {
            margin-bottom: 10px;
            /* Espacio entre tags en móviles */
        }

        .col-md-10,
        .col-md-2 {
            width: 100%;
            /* Ocupar todo el ancho en móviles */
        }

        .col-md-2 form {
            margin-top: 15px;
            /* Espacio entre tags y buscador en móviles */
        }
    }
</style>
