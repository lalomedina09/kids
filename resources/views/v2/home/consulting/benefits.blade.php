<section class="about-us bg-benefits-desktop">
    <div class="container-fluid position-relative stack-section-aboutus" style="height: 60rem;">
        <!-- Marcas decorativas -->
        <!--<div class="blue-mark-aboutus"></div>
        <div class="red-mark-aboutus"></div>-->

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <!-- Título y descripción -->
                    <div class="text-wrapper-5 margin-title-about-us font-besley">
                        <!-- Título original -->
                        <p class="original-title-aboutus d-none d-lg-block">
                            El valor de la <br> Educación Financiera
                        </p>

                        <!-- Título alternativo para pantallas pequeñas -->
                        <p class="alternative-title-aboutus d-lg-none">
                            El valor de <br> la Educación <br> Financiera
                        </p>
                    </div>

                    <p class="description-aboutus mt-3 d-none d-lg-block">
                        La educación financiera trae varios beneficios para las empresas, es deducible de impuestos,
                        <br>
                        Las ayuda a cumplir con la NOM 035 y aumenta la productividad, por mencionar algunos. <br>
                    </p>

                    <a href="#" class="btn btn-dark mt-4 btn-learn">Contáctanos</a>

                    <!-- Sección tarjetas -->

                    @include('v2.home.consulting.benefits.desktop')

                    @include('v2.home.consulting.benefits.movil')
                </div>
            </div>
        </div>
</section>
