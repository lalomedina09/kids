{{--
<div class="container">
    <div class="row bg-banner-consulting">
        <div class="col-12 col-md-12 text-center justify-content-center align-items-center h-100"
            style="position: relative; z-index: 2;">

            <div class="cultura-mobil-container">
                <img src="{{ asset("version-2/images/consulting/imgbanner/cultura-mobil1.png") }}"
                    alt="imagen centro arriba" class="cultura-mobil">
                <img src="{{ asset("version-2/images/consulting/imgbanner/cultura-mobil.png") }}" alt="imagen centro"
                    class="cultura-mobil">
            </div>

            <img src="{{ asset("version-2/images/consulting/imgbanner/cultura-der.png") }}" alt="der" class="cultura-der">
            <img src="{{ asset("version-2/images/consulting/imgbanner/cultura-izq.png") }}" alt="izq" class="cultura-izq">

            <!---
                <img src="{{ asset("version-2/images/consulting/imgbanner/cultura.png") }}" alt="cultura" class="cultura-img">
                --->
            <h1 class="culturaf main-solution-title">Cultura financiera <br>en tu empresa</h1>


            <p class="description-tx mt-3 d-none d-lg-block original-paragraph">
                Empoderamiento financiero para el talento más importante. <br>
                Mejora la productividad en tu empresa y el bienestar general <br>
                de tus colaboradores a través de la educación financiera.
            </p>

            <p class="description-tx mt-3 d-lg-none alternative-paragraph">
                Empoderamiento financiero <br>
                para el talento más importante
            </p>

            <a href="#" class="btn btn-dark mt-4 btn-learn">Contáctanos</a>
            <br><br><br>
        </div>
    </div>
</div>
--}}

<style>
    /* Imágenes flotantes */
    .cofre-img {
        width: 170px;
        max-width: 100%;
    }

    .floating-element {
        position: absolute;
        animation: float 1.5s ease-in-out infinite;
    }

    .moneda1 {
        top: 30px;
        left: -150px;
        width: 100px;
    }

    .moneda2 {
        top: 44px;
        right: -130px;
        width: 100px;
    }

    .tapa {
        top: -10px;
        left: 15%;
        transform: translateX(-50%);
        width: 180px;
    }

    /* Efecto de "zumbido" */
    @keyframes float {
        0%, 100% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(-10px);
        }
    }
</style>
<!-- Contenedor principal -->
<div class="bg-banner-consulting-v2">
    <div class="container text-center py-5">
        <!-- Caja principal con imágenes -->
        <div class="position-relative d-inline-block" style="margin-top: 60px;">
            <br><br>
            <!-- Cofre principal -->
            <img src="{{ asset("version-2/images/consulting/imgbanner/cultura-mobil.png") }}" alt="Cofre" class="cofre-img">

            <!-- Elementos flotantes -->
            <img src="{{ asset("version-2/images/consulting/imgbanner/cultura-der.png") }}" alt="Moneda 1" class="floating-element moneda1">
            <img src="{{ asset("version-2/images/consulting/imgbanner/cultura-izq.png") }}" alt="Moneda 2" class="floating-element moneda2">
            <img src="{{ asset("version-2/images/consulting/imgbanner/cultura-mobil1.png") }}" alt="Tapa" class="floating-element tapa">
        </div>

        <!-- Título -->
        <!---<h1 class="font-weight-bold mb-3">Cultura financiera en tu empresa</h1>-->
        <h1 class="culturaf main-solution-title">Cultura financiera <br>en tu empresa</h1>
        <!-- Descripción -->
        <!--<p class="font-weight-normal mb-4">
            <strong>Empoderamiento financiero para el talento más importante.</strong><br>
            Mejora la productividad en tu empresa y el bienestar general de tus colaboradores a través de la educación
            financiera.
        </p>-->
        <p class="description-tx mt-3 d-none d-lg-block original-paragraph">
            Empoderamiento financiero para el talento más importante. <br>
            Mejora la productividad en tu empresa y el bienestar general <br>
            de tus colaboradores a través de la educación financiera.
        </p>

        <p class="description-tx mt-3 d-lg-none alternative-paragraph">
            Empoderamiento financiero <br>
            para el talento más importante
        </p>

        <!-- Botón -->
        <div class="mt-4">
            <!--<a href="#" class="btn btn-dark px-4 py-2">Contáctanos</a>-->
            <a href="#" class="btn btn-dark mt-4 btn-learn">Contáctanos</a>
            <br><br><br>
        </div>
    </div>
</div>
