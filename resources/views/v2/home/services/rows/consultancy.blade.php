<style>

</style>
<div class="container" style="margin-bottom: 100px; margin-top: 30px;">
    <div class="row mb-4">
        <div class="col-md-6 d-flex align-items-center justify-content-center">
            <div class="stackview">
                <div class="view bg-light"></div>
                <img src="{{ asset('version-2/images/services/color-consultoria.png') }}"
                    alt="Imagefortyeight"
                    class="img-fluid imagefortyeight" width="100%"
                    id="img-service-consulting-desktop" />
            </div>
        </div>
        <div class="col-md-6 d-flex flex-column justify-content-center px-3">
            <div class="columnprice text-md-left text-center mt-3 mt-md-0">
                <p class="price ui text size-text2xl" style="color: #C5481C;">
                    CONSULTORÍA EMPRESARIAL
                </p>
                <h2 class="finanzassanas ui heading size-text3xl"; style="color: #000000">
                    Finanzas Sanas en las empresas
                </h2>

                <!-- Versión para escritorio con saltos de línea -->
                <p class="description-2 ui text size-text2xl d-none d-md-block" style="color: #000000">
                    Ayudamos a los líderes empresariales a mejorar la relación <br>
                    con sus colaboradores, incrementar la productividad, <br>
                    reducir ausencias y generar un impacto positivo para <br>
                    su negocio a través de la educación financiera.
                </p>

                <!-- Versión para móviles sin saltos de línea -->
                <p class="description-2 ui text size-text2xl d-md-none" style="color: #000000">
                    Ayudamos a los líderes empresariales a mejorar la relación con sus colaboradores,
                    incrementar la productividad, reducir ausencias y generar un impacto positivo para
                    su negocio a través de la educación financiera.
                </p>

                <a href="{{ route('consulting') }}" class="btn btn-dark mt-3 btn-learn-more">Conoce más</a>
            </div>
        </div>
    </div>
</div>


