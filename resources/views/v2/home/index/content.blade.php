<div class="articulos container">
    <div class="overlap-5 pt-5">
        <div class="text-wrapper-21 mb-5">Contenidos destacados</div>

        <!-- Carrusel para dispositivos móviles -->
        @include('v2.home.index.content.movil')

        <!-- Columnas originales para pantallas más grandes -->
        @include('v2.home.index.content.desktop')

    </div>
</div>

<style>
    .link-content:hover .text-wrapper-24,
    .link-content:hover .text-wrapper-25,
    .link-content:hover .text-wrapper-22,
    .link-content-main:hover .text-wrapper-28 {
        color: inherit; /* Mantiene el color original del título */
    }

    .link-content:hover .text-wrapper-27,
    .link-content:hover .text-wrapper-23,
    .link-content:hover p,
    .link-content-main:hover .text-wrapper-27,
    .link-content-main:hover p {
        color: #DFC674; /* Cambia esto por el color que desees */
    }

    .text-wrapper-24,
    .text-wrapper-25,
    .text-wrapper-22,
    .text-wrapper-28 {
        color: #ffffff !important; /* Color blanco */
    }
</style>

