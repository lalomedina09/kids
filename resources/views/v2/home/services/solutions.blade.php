<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="text-wrapper-5 margin-title-solution">Nuestras soluciones</div>
            <img class="a-mano-para-notas" src="{{ asset('version-2/images/paranotas/a-mano-para-notas-2.png') }}" />
        </div>
    </div>

    <!-- Carrusel para dispositivos móviles -->
    @include('v2.components.carousel.mobile-solutions')

    <!-- Columnas para pantallas más grandes -->
    @include('v2.components.carousel.desktop-solutions')
    <br><br><br>
</div>
