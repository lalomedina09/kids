<style>
    .social-icon-v2 {
        font-size: 2em;
    }
</style>
<footer class="element">
    <div class="container" style="background-color: #000000;">
        <br><br><br>
        <div class="row justify-content-center text-center social-row">
            <div class="col-2 col-md-2 text-center">
                <a href="#" class="link-social">
                    <img src="{{ asset('version-2/images/redesfooter/facebook.png') }}" alt="icono-facebook">
                </a>
            </div>
            <div class="col-2 col-md-2 text-center">
                <a href="#" class="link-social">
                    <img src="{{ asset('version-2/images/redesfooter/twitter.png') }}" alt="icono-twitter">
                </a>
            </div>
            <div class="col-2 col-md-2 text-center">
                <a href="#" class="link-social">
                    <i class="lni lni-instagram social-icon-v2"></i>
                </a>
            </div>
            <div class="col-2 col-md-2 text-center">
                <a href="#" class="link-social">
                    <i class="lni lni-youtube social-icon-v2"></i>
                </a>
            </div>
            <div class="col-2 col-md-2 text-center">
                <a href="#" class="link-social">
                    <img src="{{ asset('version-2/images/redesfooter/linkedin.png') }}" alt="icono-linkedin">
                </a>
            </div>
            <div class="col-2 col-md-2 text-center">
                <a href="#" class="link-social">
                    <i class="lni lni-tiktok-alt social-icon-v2"></i>
                </a>
            </div>
        </div>

        <br><br><br>
        <div>
            <div class="row align-items-center bg-white mt-4 mb-4 sobre-nosotros">
                <div class="col-md-5 text-md-right text-center mt-3 mt-md-0">
                    <br><br>
                    <div class="subscribe-title text-dark text-left text-md-left text-center" style="margin-top: 15px;">
                        Suscríbete a nuestros newsletters
                    </div>
                    <br><br>
                </div>

                <div class="col-md-7 d-flex justify-content-center justify-content-md-end">
                    <!-- Este div se muestra solo en dispositivos móviles -->
                    <div class="input-group no-gap d-md-none flex-column">
                        <input type="email" class="form-control subscribe-input mb-2" style="width: 100%; border-radius: 1px;"
                            placeholder="Correo electrónico">
                        <button class="btn btn-dark btn-susbcribe btn-susc-margin mb-2">Suscríbete</button>
                        <div class="form-check mt-2 mb-3">
                            <input type="checkbox" class="form-check-input" id="acceptTerms" style="margin-top: -.1rem;">
                            <label class="form-check-label text-dark font-akshar" for="acceptTerms">
                                Al suscribirte estás aceptando nuestros <a href="enlace-a-terminos-y-condiciones" target="_blank">Términos y
                                    Condiciones</a>
                            </label>
                        </div>
                    </div>

                    <!-- Este div se oculta en dispositivos móviles y se muestra en pantallas más grandes -->
                    <div class="input-group no-gap d-none d-md-flex">
                        <input type="email" class="form-control subscribe-input" placeholder="Correo electrónico">
                        <button class="btn btn-dark btn-susbcribe">Suscríbete</button>
                        <div class="form-check mt-2">
                            <input type="checkbox" class="form-check-input" id="acceptTerms" style="margin-top: -.1rem;">
                            <label class="form-check-label text-dark font-akshar" for="acceptTerms" >
                                Al suscribirte estás aceptando nuestros <a href="enlace-a-terminos-y-condiciones" target="_blank">Términos y
                                    Condiciones</a>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-5">
                <!-- Centrar la imagen solo en dispositivos móviles -->
                <div class="text-left text-md-left text-center mt-3">
                    <img src="{{ asset('version-2/images/imgfooter/group-3.png') }}" alt="Footer Logo" class="img-fluid"
                        style="max-width: 200px;">
                </div>
                <br>
                <p class="te-ayudamos-a">
                    Te ayudamos a fomentar una cultura financiera en tu empresa. Si te interesa llevar temas sobre
                    finanzas personales a tus colaboradores, contáctanos para hacer una presentación muestra de nuestro
                    trabajo.
                </p>
                <br>
                <a class="btn btn-white btn-susbcribe d-none d-md-block">
                    Contáctanos
                </a>
            </div>

            <!-- Columna que se oculta en dispositivos móviles -->
            <div class="col-md-3 d-none d-md-block">
            </div>

            <!-- Columna "Nosotros" que se oculta en dispositivos móviles -->
            <div class="col-md-2 d-none d-md-block">
                <div class="footer-title">Nosotros</div>
                <p class="footer-links">
                    Sobre Nosotros<br />
                    Contacto<br />
                    Newsletter<br />
                    Podcast<br />
                    Libro<br />
                    Colaboraciones<br />
                    QD Play en iOS<br />
                    QD Play en Android
                </p>
            </div>

            <!-- Columna "Secciones" que se oculta en dispositivos móviles -->
            <div class="col-md-2 d-none d-md-block">
                <div class="footer-title">Secciones</div>
                <p class="footer-links">
                    Empresas<br />
                    Editorial<br />
                    Cursos Online<br />
                    Planes QD Play<br />
                    Rutas de Aprendizaje<br />
                    Talleres en vivo<br />
                    Mentorías
                </p>
            </div>
        </div>
        <br><br><br>
        <div class="footer-line mt-4"></div>
        <p class="footer-text mt-4">©<span id="current-year"></span> QUERIDO DINERO S.A. DE C.V. TODOS LOS DERECHOS
            RESERVADOS</p>

    </div>
</footer>

<!----->
