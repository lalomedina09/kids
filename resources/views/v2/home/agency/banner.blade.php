<section>
    <div class="container-fluid position-relative stackcapaone">
        <!-- Capa para la mancha azul -->
        <div class="manchas-azul"></div>

        <!-- Contenido central -->
        <div class="row ">
            <div class="col-12 col-md-12 text-center justify-content-center align-items-center h-100"
                style="position: relative; z-index: 2; margin-bottom: 10rem;" >
                <div class="position-relative d-flex justify-content-center align-items-center">
                    <img src="{{ asset('version-2/images/img_capa_1.png') }}" alt="Capa Imagen Izquierda"
                        class="img-fluid capaone_one pigeon-secondary-left">

                    <img src="{{ asset('version-2/images/paloma-principal.png') }}" alt="Paloma Principal"
                        class="img-fluid main-pigeon">

                    <img src="{{ asset('version-2/images/img_capa_1.png') }}" alt="Capa Imagen Derecha"
                        class="img-fluid capaone_two pigeon-secondary-right">
                </div>

                <!-- Título principal -->
                <h1 class="lasolucin banner-title-main mt-2">Creatividad financiera <br>a la medida</h1>

                <!-- Descripción para escritorio -->
                <p class="description-1 mt-3 d-none d-lg-block">
                    Creamos estrategias de comunicación y proyectos especiales
                    de marca blanca para empresas del nicho financiero
                </p>

                <!-- Descripción para móvil -->
                <p class="description-1 mt-3 d-lg-none">
                    Creamos estrategias de comunicación y proyectos especiales
                    de marca blanca para empresas del nicho financiero
                </p>

                <!-- Botón de contáctanos -->
                <a href="{{ route('contact') }}" class="btn btn-dark mt-4 btn-learn-more">Contáctanos</a>
            </div>
        </div>
</section>
