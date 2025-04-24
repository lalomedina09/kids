<div id="solucionesCarousel" class="carousel slide d-md-none" data-ride="carousel">
    <!-- Indicadores (dots) -->
    <ol class="carousel-indicators">
        <li data-target="#solucionesCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#solucionesCarousel" data-slide-to="1"></li>
        <li data-target="#solucionesCarousel" data-slide-to="2"></li>
        <li data-target="#solucionesCarousel" data-slide-to="3"></li>
    </ol>

    <div class="carousel-inner">
        <div class="carousel-item active">
            <a href="{{ route('agency') }}">
                <div class="frame-4">
                    <img class="untitled-artwork img-fluid img-solution" style="height:100%;"
                        src="{{ asset('version-2/images/imgsoluciones/untitled-artwork-1-1.gif') }}" />
                    <div class="agencia-creativa-de text-center">Agencia creativa<br />de nicho financiero</div>
                    <div class="arrow-right"></div>
                </div>
            </a>
        </div>
        <div class="carousel-item">
            <a href="{{ route('consulting') }}">
                <div class="frame-5">
                    <img class="rompecabezas img-fluid img-solution" style="height:100%;"
                        src="{{ asset('version-2/images/imgsoluciones/rompecabezas-2.gif') }}" />
                    <p class="consultor-a-de text-center">Bienestar financiero<br />en las empresas</p>
                </div>
            </a>
        </div>
        <div class="carousel-item">
            <a href="{{ route('blog') }}">
                <div class="frame-6">
                    <img class="editorial img-fluid img-solution" style="height:100%;"
                        src="{{ asset('version-2/images/imgsoluciones/editorial-1.gif') }}" />
                    <div class="contenidos text-center">Contenidos de<br />Finanzas Personales</div>
                    <div class="arrow-right-2"></div>
                </div>
            </a>
        </div>
        <div class="carousel-item">
            <a href="{{ url('qdplay') }}">
                <div class="frame-7">
                    <img class="computadora img-fluid img-solution" style="height:100%;"
                        src="{{ asset('version-2/images/imgsoluciones/computadora-1.gif') }}" />
                    <p class="academia-online text-center">Academia online<br />learning a la medida</p>
                    <div class="arrow-right-3"></div>
                </div>
            </a>
        </div>
    </div>

    <!-- Controles del carrusel -->
    <!---<a class="carousel-control-prev" href="#solucionesCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#solucionesCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
        </a>---->
</div>
