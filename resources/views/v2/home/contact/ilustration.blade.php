<div class="container mt-5">
    <div class="row mx-0">
        <!-- Ajuste de margen horizontal para mayor responsividad -->
        <div class="col-12 col-md-12 d-flex flex-column mb-5">
            <p class="parrafo-banner">
                Si quieres que colaboremos juntos, si tienes alguna duda, comentario o sugerencia,<br>
                <span class="negrita-parrafo-banner">¡contáctanos y tendrás noticias nuestras muy pronto!</span>
            </p>
            <p class="parrafo-movil">
                Si quieres que colaboremos juntos, si tienes alguna duda, comentario o sugerencia <br>
                <span class="negrita-parrafo-movil">¡contáctanos y tendrás noticias nuestras muy pronto!</span>
            </p>
        </div>
        <div class="col-md-6">
            <div class="img-banner-contacto">
                <img class="imagen-mobil img-ilus-contact" src="{{ asset('version-2/images/contacto/ilustration.png')}}" alt="imagen-contacto">
            </div>
        </div>
        <div class="col-md-6">
            @include('v2.home.contact.form')
        </div>
    </div>
</div>


