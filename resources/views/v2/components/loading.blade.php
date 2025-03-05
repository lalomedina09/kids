<!-- Modal de loading (pequeño y centrado) -->
<div id="loadingModal" class="modal-loading" style="display: none;">
    <div class="modal-content-loading shadow">
        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        <p class="mt-2 font-akshar">Cargando...</p>
    </div>
</div>

<style>
    .modal-loading {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        /*background-color: rgba(0, 0, 0, 0.5);*/
        /* Fondo semitransparente */
        z-index: 9999;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .modal-content-loading {
        background-color: #fff;
        /* Fondo blanco para el contenido */
        padding: 15px;
        /* Espaciado interno */
        border-radius: 8px;
        /* Bordes redondeados */
        /*box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);*/
        /* Sombra suave */
        width: 200px;
        /* Ancho pequeño */
        text-align: center;
        color: #333;
        /* Texto oscuro */
    }

    .modal-content-loading .spinner-border {
        width: 2rem;
        /* Tamaño pequeño del spinner */
        height: 2rem;
    }

    .modal-content-loading p {
        margin: 0;
        font-size: 14px;
        /* Tamaño de texto pequeño */
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const loadingModal = document.getElementById('loadingModal');

        // Asegurarse de que el modal esté oculto al cargar la página o al retroceder
        loadingModal.style.display = 'none';

        const links = document.querySelectorAll('a'); // Selecciona todos los <a> de la página
        links.forEach(link => {
            link.addEventListener('click', function(e) {
                // Verificar si el enlace tiene target="_blank"
                if (this.getAttribute('target') !== '_blank') {
                    loadingModal.style.display = 'flex';
                    setTimeout(() => {}, 300); // Pequeño retraso para visualizar el modal
                }
            });
        });

        // Escuchar el evento 'pageshow' para ocultar el modal al retroceder
        window.addEventListener('pageshow', function(event) {
            if (event.persisted) { // Verifica si la página se cargó desde la caché del historial
                loadingModal.style.display = 'none';
            }
        });
    });
</script>
