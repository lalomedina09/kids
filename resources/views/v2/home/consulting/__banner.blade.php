<div class="responsive-container">
    <!-- Imagen a la izquierda -->
    <div class="yellow-mark"></div>
    <div class="container">
        <!-- Contenido central original -->
        @include('v2.home.consulting.banner')

        @include('v2.home.consulting.method')


        <!-- Nuevo contenedor para el texto alineado a la izquierda debajo de la imagen -->
        <div class="left-content">
            <!-- Descripción para móvil duplicada -->
            <p class="description-tx mt-3 alternative-paragraph">
                Analizamos la situación <br>
                específica de los colaboradores <br>
                y generamos soluciones
            </p>
        </div>

        <!-- Imagen a la derecha -->
        <div class="red-mark"></div>

        <!-- Contenido adicional -->
        <div class="col-12 col-md-12 text-center">
            @include('v2.home.consulting.solutions')
        </div>
    </div>
</div>
