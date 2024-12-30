<div class="bg-black text-center" style="margin-bottom: 100px;">
    <div class="container">
        <div class="row text-center mb-4 mt-4">
            <!-- Columna 1 -->
            <div class="col-md-1 mb-4 mt-4">
            </div>

            <!-- Columna 2 -->
            <div class="col-md-3 mb-4 mt-4">
                <h4 class="text-white font-weight-bold mt-4 text-family-akshar number-font-size" id="dynamic-number-qdplay">+40</h4>
                <p class="h5 text-white mb-4 text-family-akshar" id="dynamic-text-qdplay">Especialistas</p>
            </div>
            <!------------|||||||||||||||||||||||||||||||||||||---------->
            <!--<div class="col-md-3 text-family-akshar" id="div-variable-qdplay">
                <h4 class="text-white font-weight-bold number-font-size" >120</h4>
                <p class="h5 text-white" >Talleres impartidos</p>
            </div>-->
            <!------------|||||||||||||||||||||||||||||||||||||---------->
            <!-- Columna 3 -->
            <div class="col-md-3 mb-4 mt-4 d-none d-md-block">
                <h5 class="text-white font-weight-bold mt-4 text-family-akshar number-font-size">100</h5>
                <p class="h5 text-white mb-4 text-family-akshar">Cursos Online</p>
            </div>

            <!-- Columna 4 -->
            <div class="col-md-3 mb-4 mt-4 d-none d-md-block">
                <h6 class="text-white font-weight-bold mt-4">
                    <span class="text-family-akshar number-font-size">40</span>
                </h6>
                <p class="h5 text-white mb-4 text-family-akshar">Minutos Promedio</p>
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
    const dataQdplay = [
        { number: '120', text: 'Talleres impartidos' },
        { number: '100', text: 'Cursos Online' },
        { number: '690', text: 'Mentorías' },
        { number: '400K', text: 'Seguidores' }
    ];

    // Índice para recorrer los datos
    let currentIndexQdplay = 0;

    // Referencias a los elementos dinámicos
    const dynamicNumberQdplay = document.getElementById('dynamic-number-qdplay');
    const dynamicTextQdplay = document.getElementById('dynamic-text-qdplay');

    // Función para actualizar dinámicamente el contenido
    function updateContentQdplay() {
        if (isMobile()) {
            // Actualizar número y texto
            dynamicNumberQdplay.textContent = dataQdplay[currentIndexQdplay].number;
            dynamicTextQdplay.textContent = dataQdplay[currentIndexQdplay].text;

            // Incrementar el índice y reiniciarlo si es necesario
            currentIndexQdplay = (currentIndexQdplay + 1) % dataQdplay.length;
        }
    }

    // Iniciar el ciclo de actualización
    function startDynamicContentQdplay() {
        if (isMobile()) {
            // Cambiar contenido cada 3 segundos
            setInterval(updateContentQdplay, 2000);
        }
    }

    // Verificar cuando la página carga si es móvil
    document.addEventListener('DOMContentLoaded', startDynamicContentQdplay);
</script>