<div class="container position-relative mt-5">
    <div class="row mx-0">
        <!-- Ajuste de margen horizontal para mayor responsividad -->
        <div class="col-12 col-md-7 d-flex flex-column justify-content-center">
            <h2 class="para-todos ml-md-4 ml-4 text-md-left text-center">
                Educación financiera <br> para todos
            </h2> <!-- Ajuste de margen para móvil -->
            <div class="text-md-left text-center mt-4 mt-md-5 ml-4">
                <p class="queremos-que-todos d-none d-md-block text-md-left text-center">
                    Queremos que todos
                    <span class="f-weight-500">mejoren sus finanzas personales.</span><br />
                    Por eso apoyamos a empresas e individuos con herramientas, servicios y contenidos que los ayudan a
                    llegar al siguiente nivel.
                </p>
                <p class="queremos-que-todos d-block d-md-none text-md-left text-center">
                    Herramientas, servicios y contenidos que te ayudan a llegar al siguiente nivel.
                </p>
            </div>

            <div class="row mt-4 margen-boton">
                <div class="col-md-12 ml-4">
                    <div class="text-md-left text-center mt-3 w-100">
                        <a href="{{ route('services') }}" class="btn btn-dark boton-conoce-servicios">Conoce nuestros servicios</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-12 col-md-5 position-relative ajustarcirculos">
            <div class="bg-container">
                <div class="gradent mx-auto"></div>
                <div class="d-flex justify-content-center align-items-center"><!--removi esta clase position-relative-->
                    <div class="ellipse"></div>
                    <div class="ellipse-2"></div>
                    <div class="ellipse-3"></div>
                </div>
            </div>
            <div class="text-center mt-5 position-relative">
                <img class="personajes img-banner-main-random img-fluid" src="{{ asset('version-2/images/personajes/1.png') }}" alt="Personajes" />
            </div>
        </div>
    </div>
</div>


<script>
    // Función para intercambiar colores entre elipses
    function swapColors() {
        const ellipse1 = document.querySelector('.ellipse');
        const ellipse2 = document.querySelector('.ellipse-2');
        const ellipse3 = document.querySelector('.ellipse-3');

        // Obtener los colores actuales
        const color1 = window.getComputedStyle(ellipse1).backgroundColor;
        const color2 = window.getComputedStyle(ellipse2).backgroundColor;
        const color3 = window.getComputedStyle(ellipse3).backgroundColor;

        // Intercambiar colores para crear el efecto de movimiento
        ellipse1.style.backgroundColor = color3; // color de la derecha
        ellipse2.style.backgroundColor = color1; // color del centro
        ellipse3.style.backgroundColor = color2; // color de la izquierda
    }

    // Función para agregar el efecto de movimiento aleatorio
    function addRandomMovement() {
        const ellipses = document.querySelectorAll('.ellipse, .ellipse-2, .ellipse-3');
        ellipses.forEach((ellipse) => {
            // Generar un movimiento aleatorio pequeño
            const movementX = (Math.random() - 0.5) * 10; // Valor entre -5 y 5
            const movementY = (Math.random() - 0.5) * 10; // Valor entre -5 y 5

            // Mantener el centrado original y agregar el movimiento aleatorio
            ellipse.style.transform = `translate(-30%, -30%) translate(${movementX}px, ${movementY}px)`;
        });
    }

    // Intercambiar colores y agregar movimiento cada 2 segundos
    setInterval(() => {
        //swapColors();
        //addRandomMovement();
    }, 2000);
</script>

<script>
    $(document).ready(function() {
        // Array de rutas de las imágenes
        var images = [
            'version-2/images/personajes/1.png',
            'version-2/images/personajes/2.png',
            'version-2/images/personajes/3.png',
            'version-2/images/personajes/4.png',
            'version-2/images/personajes/5.png',
            'version-2/images/personajes/6.png',
            'version-2/images/personajes/7.png'
        ];

        // Índice inicial
        var currentIndex = 0;
        // Función para cambiar la imagen
        function changeImage() {
            // Incrementar el índice y reiniciarlo si es necesario
            currentIndex = (currentIndex + 1) % images.length;

            // Cambiar la fuente de la imagen usando jQuery
            $('.img-banner-main-random').attr('src', images[currentIndex]);
        }

        // Cambiar la imagen cada 2 segundos (2000 milisegundos)
        setInterval(changeImage, 2000);
    });
</script>
