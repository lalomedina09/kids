<style>
    #searchResults {
        max-height: 200px;
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
</style>
<div class="row my-4">
    <form action="{{ route('articles.search.full') }}" method="POST" class="d-flex w-100">
        @csrf
        <div class="col-md-12 mt-4 mb-4 d-flex align-items-center position-relative">
            <!-- Select de categorías -->
            <select class="form-select custom-select me-2 font-akshar" style="width: 200px;" name="slug">
                <option class="font-akshar" value="" disabled {{ old('slug', $selectedCategory ?? '') == '' ? 'selected' : '' }}>Categorías</option>
                @foreach($categories as $category)
                    <option class="font-akshar" value="{{ $category->slug }}" {{ old('slug', $selectedCategory ?? '') == $category->slug ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <!-- Input de búsqueda -->
            <input type="text" id="searchInput" class="form-control custom-input me-2 font-akshar" name="words"
                placeholder="Explora nuestros artículos..." value="{{ old('words', $words ?? '') }}">
            <!-- Botón de búsqueda -->
            <button class="btn custom-btn" style="height: 43px;" type="submit">
                <i class="fas fa-search"></i>
            </button>
            <!-- Lista de resultados -->
            <div id="searchResults" class="position-absolute bg-white border mt-1 w-100 font-akshar"
                style="top: 100%; z-index: 1000; display: none;"></div>
        </div>
    </form>
</div>



<script>
    document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('searchInput');
                const searchResults = document.getElementById('searchResults');

                searchInput.addEventListener('input', function() {
                    const query = this.value.trim();
                    if (query.length >= 2) { // Solo buscar si el usuario ha escrito al menos 2 caracteres
                        fetch(`/articles/search?query=${encodeURIComponent(query)}`)
                            .then(response => response.json())
                            .then(data => {
                                // Limpiar resultados anteriores
                                searchResults.innerHTML = '';

                                if (data.length > 0) {
                                    // Mostrar resultados
                                    data.forEach(item => {
                                        const resultItem = document.createElement('a');
                                        resultItem.href = `/articulos/${item.slug}`; // Enlace al artículo
                                        resultItem.classList.add('dropdown-item', 'd-block', 'p-2');
                                        resultItem.textContent = item.title;
                                        resultItem.setAttribute('title', 'Ir al artículo');
                                        searchResults.appendChild(resultItem);
                                    });

                                    searchResults.style.display = 'block'; // Mostrar la lista
                                } else {
                                    searchResults.style.display = 'none'; // Ocultar si no hay resultados
                                }
                            })
                            .catch(error => {
                                console.error('Error al obtener los resultados de la búsqueda:', error);
                            });
                    } else {
                        searchResults.style.display = 'none'; // Ocultar si el input está vacío
                    }
                });

                // Ocultar resultados al hacer clic fuera
                document.addEventListener('click', function(event) {
                        if (!searchInput.contains(event.target) && !searchResults.contains(event.target)) {
                                searchResults.style.display = 'none';
                            }
                        });
                });
</script>
