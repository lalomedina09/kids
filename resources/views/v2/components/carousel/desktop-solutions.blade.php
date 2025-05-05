<!-- Columnas para pantallas grandes y medianas -->
<div class="row justify-content-center d-none d-md-flex soluciones-home">
    <div class="col-lg-3 col-md-6 col-sm-6 mb-4 d-flex">
        <a href="{{ route('agency') }}" class="w-100">
            <div class="frame-4 h-100 d-flex flex-column align-items-center justify-content-between text-center">
                <img class="untitled-artwork img-fluid"
                    src="{{ asset('version-2/images/imgsoluciones/untitled-artwork-1-1.gif') }}" />
                <div class="agencia-creativa-de subtitle-solution">
                    Agencia creativa<br />de nicho financiero
                </div>
                <div class="arrow-right"></div>
            </div>
        </a>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 mb-4 d-flex">
        <a href="{{ route('consulting') }}" class="w-100">
            <div class="frame-5 h-100 d-flex flex-column align-items-center justify-content-between text-center">
                <img class="rompecabezas img-fluid"
                    src="{{ asset('version-2/images/imgsoluciones/rompecabezas-2.gif') }}" />
                <p class="consultor-a-de subtitle-solution">
                    Consultoría<br />de bienestar financiero<br />en las empresas
                </p>
            </div>
        </a>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 mb-4 d-flex">
        <a href="{{ route('blog') }}" class="w-100">
            <div class="frame-6 h-100 d-flex flex-column align-items-center justify-content-between text-center">
                <img class="editorial img-fluid"
                    src="{{ asset('version-2/images/imgsoluciones/editorial-1.gif') }}" />
                <div class="contenidos subtitle-solution">
                    Contenidos editoriales<br />de Finanzas Personales
                </div>
                <div class="arrow-right-2"></div>
            </div>
        </a>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 mb-4 d-flex">
        <a href="{{ url('qdplay') }}" class="w-100">
            <div class="frame-7 h-100 d-flex flex-column align-items-center justify-content-between text-center">
                <img class="computadora img-fluid"
                    src="{{ asset('version-2/images/imgsoluciones/computadora-1.gif') }}" />
                <p class="academia-online subtitle-solution">
                    Academia online<br />learning a la medida
                </p>
                <div class="arrow-right-3"></div>
            </div>
        </a>
    </div>
</div>
