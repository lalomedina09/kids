<style>    
    #img-service-consulting-desktop {
    transition: opacity 0.3s ease; /* Transición suave */
    }
    
    /* Cambiar la imagen en hover */
    #img-service-consulting-desktop:hover {
    content: url('{{ asset("version-2/images/services/hover/color-consultoria.png") }}');
    max-width: 100%;
    height: auto;
    }
</style>
<div class="container" style="margin-bottom: 100px; margin-top: 30px;">
    <div class="row mb-4">
        <div class="col-md-6 d-flex align-items-center justify-content-center">
            <div class="stackview">
                <div class="view bg-light"></div>
                <img src="{{ asset('version-2/images/services/black-consultoria.png') }}" alt="Imagefortyeight"
                    class="img-fluid imagefortyeight d-none d-lg-block" width="100%"
                    id="img-service-consulting-desktop" />

                <img src="{{ asset('version-2/images/services/color-consultoria.png') }}" alt="Imagefortyeight" class="img-fluid imagefortyeight d-lg-none" />
            </div>
        </div>
        <div class="col-md-6 d-flex flex-column justify-content-center">
            <div class="columnprice text-md-left text-center mt-3 mt-md-0">
                <p class="price ui text size-text2xl" style="color: #C5481C;">
                    CONSULTORÍA EMPRESARIAL
                </p><br>
                <h2 class="finanzassanas ui heading size-text3xl text-dark">
                    Finanzas Sanas<br />en las empresas
                </h2><br>
                <p class="description-2 ui text size-text2xl text-dark">
                    Ayudamos a los líderes empresariales a mejorar la relación con sus colaboradores, incrementar la
                    productividad, reducir ausencias y generar un impacto positivo para su negocio a través de la educación
                    financiera.
                </p>
                <button class="btn btn-dark mt-3 btn-learn-more">Conoce más</button>
            </div>
        </div>
    </div>
</div>
