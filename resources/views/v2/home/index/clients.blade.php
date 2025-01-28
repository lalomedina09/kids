<style>
    .mySwiper {
    display: flex;
    justify-content: center; /* Centra el contenedor Swiper */
    align-items: center; /* Alinea los elementos verticalmente */
    width: 100%; /* Asegúrate de que el carrusel ocupe todo el ancho */
    }

    .swiper-slide {
        display: flex;
        justify-content: center; /* Centra el contenido de cada slide */
        align-items: center; /* Alinea verticalmente el contenido */
        text-align: center; /* Asegura que el texto también esté centrado */
    }
    /* Cambiar los dots a líneas horizontales */
    .swiper-pagination-bullet {
        width: 30px; /* Ancho de la línea */
        height: 4px; /* Alto de la línea */
        background-color: #ccc; /* Color inicial */
        border-radius: 0; /* Eliminar bordes redondeados */
        margin: 5px; /* Espaciado entre líneas */
        transition: background-color 0.3s ease, transform 0.3s ease; /* Animación */
    }

    /* Línea activa */
    .swiper-pagination-bullet-active {
        background-color: #ffffff; /* Color activo */
        transform: scale(1.2); /* Aumentar ligeramente el tamaño */
    }

    .break-mobile {
        display: none; /* Oculta el salto de línea por defecto */
    }

    @media (max-width: 768px) { /* Aplica en pantallas móviles */
        .break-mobile {
            display: inline;
        }
    }
</style>
<div class="logos">
    <div class="row" style="margin-left: 5%; margin-right: 5%;">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12 mt-4 mb-4">
                    <br>
                    <br>
                    <p class="marcas-que-han">
                        Nos gusta trabajar
                        <span class="break-mobile"><br></span>
                        con los mejores
                    </p>
                </div>
            </div>
            <!-- Va hacer visible para pantallas pequeñas -->
            <div class="row d-md-none">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img class="logotipos--" src="{{ asset('version-2/images/clients/google.png') }}" style="width: 50%;" />
                        </div>
                        <div class="swiper-slide">
                            <img class="--logotipos-2" src="{{ asset('version-2/images/clients/quickbooks.png') }}" style="width:80%;" />
                        </div>
                        <div class="swiper-slide">
                            <img class="--logotipos-3" src="{{ asset('version-2/images/clients/profuturo.png') }}" style="width: 80%;" />
                        </div>
                        <div class="swiper-slide">
                            <img class="--logotipos-4" src="{{ asset('version-2/images/clients/vector.png') }}" style="width: 50%;" />
                        </div>
                        <div class="swiper-slide">
                            <img class="--logotipos-5" src="{{ asset('version-2/images/clients/moneyfest.png') }}" style="width: 60%;" />
                        </div>
                        <div class="swiper-slide">
                            <img class="--logotipos-6" src="{{ asset('version-2/images/clients/home-depot.png') }}" style="width: 40%;" />
                        </div>
                    </div>
                    <br><br><br>
                    <!-- Dots (Puntos de navegación) -->
                    <div class="mt-3 swiper-pagination"></div>
                </div>
            </div>

            <!-- Mostrar el layout original en pantallas más grandes -->
            <div class="row d-none d-md-flex d-flex justify-content-center align-items-center d-xs-none">
                <div class="col-md-2 d-flex justify-content-center align-items-center text-center">
                    <img class="logotipos--" src="{{ asset('version-2/images/clients/google.png') }}" style="width: 80%;margin-left: -10rem;"/>
                </div>
                <div class="col-md-2 d-flex justify-content-center align-items-center text-center">
                    <img class="--logotipos-2" src="{{ asset('version-2/images/clients/quickbooks.png') }}" style="width: 100%;margin-left: -5rem;"/>
                </div>
                <div class="col-md-2 d-flex justify-content-center align-items-center text-center">
                    <img class="--logotipos-3" src="{{ asset('version-2/images/clients/profuturo.png') }}" style="width: 100%;margin-left: -1rem;"/>
                </div>
                <div class="col-md-2 d-flex justify-content-center align-items-center text-center">
                    <img class="--logotipos-4" src="{{ asset('version-2/images/clients/vector.png') }}" style="width: 72%;margin-left: -5rem;"/>
                </div>" />
                </div>
                <div class="col-md-2 d-flex justify-content-center align-items-center text-center">
                    <img class="--logotipos-5" src="{{ asset('version-2/images/clients/moneyfest.png') }}" style="width: 100%;margin-left: -8rem;"/>
                </div>
                <div class="col-md-2 d-flex justify-content-center align-items-center text-center">
                    <img class="--logotipos-6" src="{{ asset('version-2/images/clients/home-depot.png') }}" style="width: 53%;margin-left: -11rem;"/>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Iniciar Swiper sin restricciones de tamaño de pantalla
    var swiper = new Swiper('.mySwiper', {
        slidesPerView: 2, // Configuración por defecto
        spaceBetween: 10,
        loop: true,
        centeredSlides: true, // Centrar los slides
        autoplay: {
            delay: 1000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        // Configuración de breakpoints para diferentes tamaños de pantalla
        breakpoints: {
            // cuando el ancho de la ventana es >= 350px
            350: {
                slidesPerView: 1,
                spaceBetween: 10
            },
            // cuando el ancho de la ventana es >= 400px
            400: {
                slidesPerView: 1,
                spaceBetween: 10
            },
            // cuando el ancho de la ventana es >= 576px
            576: {
                slidesPerView: 1,
                spaceBetween: 10
            },
            // cuando el ancho de la ventana es >= 768px
            768: {
                slidesPerView: 3,
                spaceBetween: 15
            },
            // cuando el ancho de la ventana es >= 992px
            992: {
                slidesPerView: 4,
                spaceBetween: 20
            },
            // cuando el ancho de la ventana es >= 1200px
            1200: {
                slidesPerView: 5,
                spaceBetween: 30
            },
            // cuando el ancho de la ventana es >= 1200px
            1900: {
                slidesPerView: 4,
                spaceBetween: 40
            }
        }
    });
</script>
