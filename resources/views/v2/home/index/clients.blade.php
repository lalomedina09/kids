<div class="logos">
    <div class="row" style="margin-left: 5%; margin-right: 5%;">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12 mt-4 mb-4">
                    <br>
                    <br>
                    <p class="marcas-que-han">Nos gusta trabajar con los mejores</p>

                </div>
            </div>
            <!-- Va hacer visible para pantallas pequeñas -->
            <div class="row d-md-none">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img class="logotipos--" src="{{ asset('version-2/images/clients/fiat.png') }}" style="width: 50%;" />
                        </div>
                        <div class="swiper-slide">
                            <img class="--logotipos-2" src="{{ asset('version-2/images/clients/banorte.png') }}" style="width:80%;" />
                        </div>
                        <div class="swiper-slide">
                            <img class="--logotipos-3" src="{{ asset('version-2/images/clients/vector.png') }}" style="width: 80%;" />
                        </div>
                        <div class="swiper-slide">
                            <img class="--logotipos-4" src="{{ asset('version-2/images/clients/home-depot.png') }}" style="width: 50%;" />
                        </div>
                        <div class="swiper-slide">
                            <img class="--logotipos-5" src="{{ asset('version-2/images/clients/amis.png') }}" style="width: 80%;" />
                        </div>
                        <div class="swiper-slide">
                            <img class="--logotipos-6" src="{{ asset('version-2/images/clients/hir-casa.png') }}" style="width: 80%;" />
                        </div>
                    </div>
                    <br><br><br>
                    <!-- Dots (Puntos de navegación) -->
                    <div class="mt-3 swiper-pagination"></div>
                </div>
            </div>

            <!-- Mostrar el layout original en pantallas más grandes -->
            <div class="row d-none d-md-flex d-flex justify-content-center align-items-center d-xs-none">
                <div class="col-md-2 d-flex justify-content-center align-items-center">
                    <img class="logotipos--" src="{{ asset('version-2/images/clients/fiat.png') }}" style="width: 50%"/>
                </div>
                <div class="col-md-2">
                    <img class="--logotipos-2" src="{{ asset('version-2/images/clients/banorte.png') }}" style="width: 100%;" />
                </div>
                <div class="col-md-2">
                    <img class="--logotipos-3" src="{{ asset('version-2/images/clients/vector.png') }}" style="width: 80%;" />
                </div>
                <div class="col-md-2">
                    <img class="--logotipos-4" src="{{ asset('version-2/images/clients/home-depot.png') }}" style="width: 50%;" />
                </div>
                <div class="col-md-2">
                    <img class="--logotipos-5" src="{{ asset('version-2/images/clients/amis.png') }}" style="width: 80%;" />
                </div>
                <div class="col-md-2">
                    <img class="--logotipos-6" src="{{ asset('version-2/images/clients/hir-casa.png') }}" style="width: 80%;" />
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
            // cuando el ancho de la ventana es >= 576px
            400: {
                slidesPerView: 2,
                spaceBetween: 10
            },
            // cuando el ancho de la ventana es >= 576px
            576: {
                slidesPerView: 2,
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
