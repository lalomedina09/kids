<style>
    #searchResults {
        max-height: 180px;
        overflow-y: auto;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        width: 100%;
        z-index: 1000;
    }

    #searchResults a {
        color: #333;
        text-decoration: none;
    }

    #searchResults a:hover {
        background-color: #f8f9fa;
    }

    #searchResults .fw-bold {
        font-size: 14px;
        color: #333;
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
        font-size: 16px;
    }

    .search-container {
        display: flex;
        align-items: center;
        width: 100%;
        gap: inherit;
    }

    .custom-select {
        width: 200px;
    }

    .custom-input {
        flex-grow: 1;
        min-width: 0;
    }

    .custom-btn {
        width: 100px;
    }

    @media (max-width: 767px) {
        .search-container {
            flex-direction: column;
            align-items: stretch;
        }

        .custom-select,
        .custom-input,
        .custom-btn {
            width: 100%;
            margin-bottom: 10px;
        }

        #searchResults {
            top: calc(100% + 10px);
        }
    }

    @media (min-width: 768px) {
        #searchResults {
            top: calc(100% + 5px);
        }
    }
</style>

<div class="row my-4">
    <form action="{{ route('articles.search.full') }}" method="POST" class="w-100" id="searchForm">
        @csrf
        <div class="col-12 mt-4 mb-4 search-container position-relative">
            <!-- Select de categorías -->
            <select class="form-select custom-select font-akshar" name="slug">
                <option class="font-akshar" value="" disabled {{ old('slug', $selectedCategory ?? '' )=='' ? 'selected'
                    : '' }}>Categorías
                </option>
                @foreach ($categories as $category)
                <option class="font-akshar" value="{{ $category->slug }}" {{ old('slug', $selectedCategory ?? ''
                    )==$category->slug ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
            <!-- Input de búsqueda -->
            <input type="text" id="searchInput" class="form-control custom-input font-akshar" name="words"
                placeholder="Explora nuestros artículos..." value="{{ old('words', $words ?? '') }}" autocomplete="off">
            <!-- Botón de búsqueda -->
            <button class="btn custom-btn font-akshar" type="submit" id="searchButton">
                Buscar
                <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"
                    id="loadingSpinner"></span>
            </button>
            <!-- Lista de resultados -->
            <div id="searchResults" class="position-absolute bg-white border mt-1 w-100 font-akshar"
                style="display: none;">
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
                        searchLoading.classList.add('d-none');
                        searchResults.innerHTML = '';

                        if (data.length > 0) {
                            const header = document.createElement('div');
                            header.classList.add('p-2', 'fw-bold', 'bg-light', 'border-bottom');
                            header.textContent = `Resultados encontrados (${data.length})`;
                            searchResults.appendChild(header);

                            data.forEach(item => {
                                const resultItem = document.createElement('a');
                                resultItem.href = `/articulos/${item.slug}`;
                                resultItem.classList.add('dropdown-item', 'd-block', 'p-2', 'my-2');
                                resultItem.textContent = item.title;
                                resultItem.setAttribute('title', 'Ir al artículo');
                                searchResults.appendChild(resultItem);
                            });
                        } else {
                            searchResults.innerHTML = '<div class="p-2 text-muted">No se encontraron resultados</div>';
                        }
                    })
                    .catch(error => {
                        searchLoading.classList.add('d-none');
                        console.error('Error al obtener los resultados de la búsqueda:', error);
                        searchResults.innerHTML = '<div class="p-2 text-danger">Error al buscar</div>';
                    });
            } else {
                searchResults.style.display = 'none';
                searchLoading.classList.add('d-none');
            }
        });

        document.addEventListener('click', function(event) {
            if (!searchInput.contains(event.target) && !searchResults.contains(event.target)) {
                searchResults.style.display = 'none';
            }
        });

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
