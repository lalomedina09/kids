<style>
    /*
    #img-service-qdplay-desktop {
        transition: opacity 0.3s ease;
    }
    #img-service-qdplay-desktop:hover {
        content: url('{{ asset("version-2/images/services/hover/color-academia.png") }}');
        max-width: 100%;
        height: auto;
    }*/
</style>
<div class="container" style="margin-bottom: 0px;">
    <div class="row mb-4">
        <!-- Columna que aparece primero en móviles y después en pantallas grandes -->
        <div class="col-md-6 d-flex align-items-center justify-content-center order-1 order-md-2">
            <div class="stackview">
                <div class="view bg-light"></div>
                <img src="{{ asset('version-2/images/services/color-academia.png') }}" id="img-service-qdplay-desktop" alt="Imagefortyeight" class="img-fluid imagefortyeight" />
                <!----<img src="{{ asset('version-2/images/services/color-academia.png') }}" alt="Imagefortyeight" class="img-fluid imagefortyeight d-lg-none" />--->
            </div>
        </div>

        <!-- Columna que aparece después en móviles y primero en pantallas grandes -->
        <div class="col-md-6 d-flex flex-column justify-content-center text-right order-2 order-md-1">
            <div class="columnprice text-md-left text-center mt-3 mt-md-0">
                <p class="price ui text size-text2xl" style="color: #C5481C;">
                    ONLINE LEARNING
                </p><br>
                <h2 class="finanzassanas ui heading size-text3xl" style="color: #000000">
                    Academia online de <br> educación financiera
                </h2><br>
                <p class="description-2 ui text size-text2xl" style="color: #000000">
                    Utiliza nuestra plataforma online, o crea
                    tu propia academia con nosotros. Sumamos fuerzas con las empresas comprometidas para llevar la educación a sus usuarios
                    a través del aprendizaje en línea.
                </p>
                <a href="{{ url('qdplay') }}" class="btn btn-dark mt-3 btn-learn-more mt-4">Conoce más</a>
            </div>
        </div>
    </div>
</div>
