<section>
    <div class="container-fluid position-relative stackcapaone">
        <!-- Capa para la mancha azul -->
        <div class="manchas-azul"></div>

        <!-- Contenido central -->
        <div class="row " style="background-color: #F2F2F2;">
            <div class="col-12 col-md-12 text-center justify-content-center align-items-center h-100" style="position: relative; z-index: 2;">
                <div class="position-relative d-flex justify-content-center align-items-center">
                    <!--<img src="{{ asset('version-2/images/img_capa_1.png') }}" alt="Capa Imagen Izquierda"
                        class="img-fluid capaone_one pigeon-secondary-left">-->

                    <img src="{{ asset('version-2/images/services/banner-service.png') }}" alt="Paloma Principal"
                        class="img-fluid main-pigeon">

                    <!--<img src="{{ asset('version-2/images/img_capa_1.png') }}" alt="Capa Imagen Derecha"
                        class="img-fluid capaone_two pigeon-secondary-right">-->
                </div>

                <!-- Título principal -->
                <h1 class="lasolucin banner-title-main mt-2">La solución integral <br>de Educación Financiera</h1>

                <!-- Descripción para escritorio -->
                <p class="description-1 mt-3 d-none d-lg-block">
                    Creemos en el poder de las Finanzas Personales para mejorar <br>
                    la vida de las personas, el ambiente en los espacios de trabajo <br>
                    y la cultura del dinero en México.
                </p>

                <!-- Descripción para móvil -->
                <p class="description-1 mt-3 d-lg-none">
                    Finanzas personales para mejorar <br>
                    la calidad de vida, el ambiente laboral <br>
                    y la cultura del dinero en México
                </p>

                <!-- Botón de contáctanos -->
                <a href="{{ route('contact') }}" class="btn btn-dark mt-4 btn-learn-more">Contáctanos</a>
            </div>

            <div class="col-12 col-md-12 text-center">
                @include('v2.home.services.solutions')
            </div>
        </div>
</section>
