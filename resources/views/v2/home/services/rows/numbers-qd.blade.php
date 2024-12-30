<div class="bg-black text-center">
    <div class="container">
        <div class="row py-5 mb-4 mt-4">
            <!-- Div que cambia dinámicamente en móviles -->
            <div class="col-md-3 text-family-akshar" id="div-variable-qdplay">
                <h4 class="text-white font-weight-bold number-font-size" id="dynamic-number">120</h4>
                <p class="h5 text-white" id="dynamic-text">Talleres impartidos</p>
            </div>

            <!-- Columnas visibles en escritorio (contenido estático) -->
            <div class="col-md-3 text-family-akshar d-none d-md-block">
                <h4 class="text-white font-weight-bold number-font-size">100</h4>
                <p class="h5 text-white">Cursos Online</p>
            </div>
            <div class="col-md-3 text-family-akshar d-none d-md-block">
                <h4 class="text-white font-weight-bold number-font-size">690</h4>
                <p class="h5 text-white">Mentorías</p>
            </div>
            <div class="col-md-3 text-family-akshar d-none d-md-block">
                <h4 class="text-white font-weight-bold number-font-size">400K</h4>
                <p class="h5 text-white">Seguidores</p>
            </div>
        </div>
    </div>
</div>

<script>
    // Verificar si el usuario está en un dispositivo móvil
    function isMobile() {
        return window.innerWidth < 768; // Breakpoint para dispositivos móviles
    }

    // Array con los números y textos que se alternan
    const data = [
        { number: '120', text: 'Talleres impartidos' },
        { number: '100', text: 'Cursos Online' },
        { number: '690', text: 'Mentorías' },
        { number: '400K', text: 'Seguidores' }
    ];

    // Índice para recorrer los datos
    let currentIndex = 0;

    // Referencias a los elementos dinámicos
    const dynamicNumber = document.getElementById('dynamic-number');
    const dynamicText = document.getElementById('dynamic-text');

    // Función para actualizar dinámicamente el contenido
    function updateContent() {
        if (isMobile()) {
            // Actualizar número y texto
            dynamicNumber.textContent = data[currentIndex].number;
            dynamicText.textContent = data[currentIndex].text;

            // Incrementar el índice y reiniciarlo si es necesario
            currentIndex = (currentIndex + 1) % data.length;
        }
    }

    // Iniciar el ciclo de actualización
    function startDynamicContent() {
        if (isMobile()) {
            // Cambiar contenido cada 3 segundos
            setInterval(updateContent, 2000);
        }
    }

    // Verificar cuando la página carga si es móvil
    document.addEventListener('DOMContentLoaded', startDynamicContent);
</script>