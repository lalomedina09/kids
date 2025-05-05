<style>
    #searchResults {
        max-height: 300px;
        overflow-y: auto;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    #searchResults a {
        color: #333;
        text-decoration: none;
    }

    #searchResults a:hover {
        background-color: #f8f9fa;
    }

    #searchResults {
        max-height: 180px;
        overflow-y: auto;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    #searchResults a {
        color: #333;
        text-decoration: none;
    }

    #searchResults .fw-bold {
        font-size: 14px;
        color: #333;
    }

    #searchResults a:hover {
        background-color: #f8f9fa;
    }

    #searchLoading {
        color: #666;
    }

    #searchLoading .spinner-border {
        margin-right: 8px;
    }

    .custom-btn:disabled {
        opacity: 0.7;
        cursor: not-allowed;
    }

    .spinner-border {
        vertical-align: middle;
    }

    .custom-select,
    .custom-input,
    .custom-btn {
        height: 43px;
    }

    @media (max-width: 767px) {
        .custom-select {
            margin-bottom: 10px;
            width: 100%;
        }

        .custom-input {
            margin-bottom: 10px;
            width: 100%;
        }

        .custom-btn {
            width: 100%;
        }

        #searchResults {
            width: 100%;
            top: calc(100% + 10px);
        }
    }


    @media (min-width: 768px) {
        .custom-select {
            max-width: 220px;
        }

        .custom-input {
            flex-grow: 1;
        }
    }
</style>

<div class="row my-4">
    <form action="{{ route('articles.search.full') }}" method="POST" class="d-flex w-100" id="searchForm">
        @csrf
        <div class="col-12 mt-4 mb-4 d-flex align-items-center position-relative flex-wrap">
            <!-- Select de categorías -->
            <select class="form-select custom-select me-2 font-akshar col-12 col-md-4" name="slug">
                <option class="font-akshar" value="" disabled
                    {{ old('slug', $selectedCategory ?? '') == '' ? 'selected' : '' }}>Categorías
                </option>
                @foreach ($categories as $category)
                    <option class="font-akshar" value="{{ $category->slug }}"
                        {{ old('slug', $selectedCategory ?? '') == $category->slug ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <!-- Input de búsqueda -->
            <input type="text" id="searchInput" class="form-control custom-input me-2 font-akshar col-12 col-md-7"
                name="words" placeholder="Explora nuestros artículos..." value="{{ old('words', $words ?? '') }}"
                autocomplete="off">
            <!-- Botón de búsqueda -->
            <button class="btn custom-btn col-auto font-akshar" style="height: 43px;" type="submit" id="searchButton">
                Buscar &nbsp;&nbsp; <i class="fas fa-search"></i>
                <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"
                    id="loadingSpinner"></span>
            </button>
            <!-- Lista de resultados -->
            <div id="searchResults" class="position-absolute bg-white border mt-1 w-100 font-akshar"
                style="top: 100%; z-index: 1000; display: none;">

                <div id="searchLoading" class="text-center p-2 d-none">
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    <span>Cargando...</span>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const searchResults = document.getElementById('searchResults');
        const searchLoading = document.getElementById('searchLoading');

        searchInput.addEventListener('input', function() {
        const query = this.value.trim();
        if (query.length >= 2) {

        searchResults.style.display = 'block';
        searchLoading.classList.remove('d-none');
        searchResults.innerHTML = '';
        searchResults.appendChild(searchLoading);

        fetch(`/articles/search?query=${encodeURIComponent(query)}`)
        .then(response => response.json())
        .then(data => {
        // Ocultar el spinner
        searchLoading.classList.add('d-none');

        // Limpiar resultados anteriores
        searchResults.innerHTML = '';

        if (data.length > 0) {
        // Crear el título/header
        const header = document.createElement('div');
        header.classList.add('p-2', 'fw-bold', 'bg-light', 'border-bottom');
        header.textContent = `Resultados encontrados (${data.length})`;
        searchResults.appendChild(header);

        // Mostrar resultados debajo del título
        data.forEach(item => {
        const resultItem = document.createElement('a');
        resultItem.href = `/articulos/${item.slug}`;
        resultItem.classList.add('dropdown-item', 'd-block', 'p-2', 'my-2');
        resultItem.textContent = item.title;
        resultItem.setAttribute('title', 'Ir al artículo');
        searchResults.appendChild(resultItem);
        });
        } else {
        // Si no hay resultados, mostrar mensaje
        searchResults.innerHTML = '<div class="p-2 text-muted">No se encontraron resultados</div>';
        }
        })
        .catch(error => {
        // Ocultar el spinner en caso de error
        searchLoading.classList.add('d-none');
        console.error('Error al obtener los resultados de la búsqueda:', error);
        searchResults.innerHTML = '<div class="p-2 text-danger">Error al buscar</div>';
        });
        } else {
        searchResults.style.display = 'none';
        searchLoading.classList.add('d-none');
        }
        });

        // Ocultar resultados al hacer clic fuera
        document.addEventListener('click', function(event) {
            if (!searchInput.contains(event.target) && !searchResults.contains(event.target)) {
                searchResults.style.display = 'none';
            }
        });

        // Script para animación de spinner en el submit del formulario
        document.getElementById('searchForm').addEventListener('submit', function() {
            const button = document.getElementById('searchButton');
            const searchIcon = button.querySelector('.fas.fa-search');
            const spinner = document.getElementById('loadingSpinner');

            button.disabled = true;
            searchIcon.classList.add('d-none');
            spinner.classList.remove('d-none');
        });
    });
</script>
