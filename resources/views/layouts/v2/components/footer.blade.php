<style>
    .social-icon-v2 {
        font-size: 2em;
    }
    .btn-border-r-1{
        border-radius: 1px;
    }
    .fw-bold{
        font-weight: bold;
    }
</style>
<footer class="element">
    <div class="container" style="background-color: #000000;">
        <br><br><br>
        <div class="row justify-content-center text-center social-row">
            <div class="col-2 col-md-2 text-center">
                <a href="{{ config('money.url.facebook') }}" class="link-social" target="_blank">
                    <img src="{{ asset('version-2/images/redesfooter/facebook.png') }}" alt="icono-facebook">
                </a>
            </div>
            <div class="col-2 col-md-2 text-center">
                <a href="{{ config('money.url.twitter') }}" class="link-social" target="_blank">
                    <img src="{{ asset('version-2/images/redesfooter/twitter.png') }}" alt="icono-twitter">
                </a>
            </div>
            <div class="col-2 col-md-2 text-center">
                <a href="{{ config('money.url.instagram') }}" class="link-social" target="_blank">
                    <i class="lni lni-instagram social-icon-v2"></i>
                </a>
            </div>
            <div class="col-2 col-md-2 text-center">
                <a href="{{ config('money.url.youtube') }}" class="link-social" target="_blank">
                    <i class="lni lni-youtube social-icon-v2"></i>
                </a>
            </div>
            <div class="col-2 col-md-2 text-center">
                <a href="https://mx.linkedin.com/company/querido-dinero" class="link-social" target="_blank">
                    <img src="{{ asset('version-2/images/redesfooter/linkedin.png') }}" alt="icono-linkedin">
                </a>
            </div>
            <div class="col-2 col-md-2 text-center">
                <a href="https://www.tiktok.com/@querido_dinero" class="link-social" target="_blank">
                    <i class="lni lni-tiktok-alt social-icon-v2"></i>
                </a>
            </div>
        </div>

        <br><br><br>
        <div>
            <div class="row align-items-center bg-white mt-4 mb-4"> <!-- sobre-nosotros -->
                <div class="col-md-5 text-md-right text-center mt-3 mt-md-0">
                    <br><br>
                    <div class="subscribe-title text-dark text-left text-md-left text-center" style="margin-top: 15px;">
                        Suscríbete a nuestros newsletters
                    </div>
                    <br><br>
                </div>

                <div class="col-md-7 d-flex justify-content-center justify-content-md-end">
                    <!-- Este div se muestra solo en dispositivos móviles -->

                    @include('layouts.v2.components.newsletter.movil')

                    <!-- Este div se oculta en dispositivos móviles y se muestra en pantallas más grandes -->
                    @include('layouts.v2.components.newsletter.desktop')
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
                <a href="{{ route('contact')}}" class="btn btn-white btn-susbcribe d-none d-md-block justify-content-center p-2">
                    Contáctanos
                </a>
            </div>

            <!-- Columna que se oculta en dispositivos móviles -->
            <div class="col-md-3 d-none d-md-block">
            </div>

            <!-- Columna "Nosotros" que se oculta en dispositivos móviles -->
            <div class="col-md-2 d-none d-md-block">
                <div class="footer-title">Nosotros</div>
                <p class="footer-links text-white">
                    <a href="{{ route('contact')}}" class="text-white text-decoration-none">
                        Sobre Nosotros
                    </a><br />
                    <a href="{{ route('contact')}}" class="text-white text-decoration-none">
                        Contacto
                    </a><br />
                    <a href="https://queridodinero.myflodesk.com/comunidad" class="text-white text-decoration-none">
                        Newsletter
                    </a><br />
                    <a href="{{ route('podcasts.index') }}" class="text-white text-decoration-none">
                        Podcast
                    </a><br />
                    <a href="{{ config('money.url.store') }}" class="text-white text-decoration-none">
                        Libro
                    </a><br />
                    <a href="enlace-a-colaboraciones" class="text-white text-decoration-none">
                        Colaboraciones
                    </a><br />
                    <a href="{{ env('APP_STORE', 'https://apps.apple.com/mx/app/qd-play/id6445823679') }}" class="text-white text-decoration-none">
                        QD Play en iOS
                    </a><br />
                    <a href="{{ env('PLAY_STORE', 'https://play.google.com/store/apps/details?id=com.queridodinero.qdplay') }}" class="text-white text-decoration-none">
                        QD Play en Android
                    </a>
                </p>
            </div>

            <!-- Columna "Secciones" que se oculta en dispositivos móviles -->
            <div class="col-md-2 d-none d-md-block">
                <div class="footer-title">Secciones</div>
                <p class="footer-links">
                    <a href="{{ route('qdplay.business') }}" class="text-white text-decoration-none">
                        Empresas
                    </a><br />
                    <a href="{{ route('blog') }}" class="text-white text-decoration-none">
                        Editorial
                    </a><br />
                    <a href="{{ url('qdplay') }}" class="text-white text-decoration-none">
                        Cursos Online
                    </a><br />
                    <a href="{{ route('qdplay.individual-plans') }}" class="text-white text-decoration-none">
                        Planes QD Play
                    </a><br />
                    <a href="{{ route('qdplay.learning-paths.start', ['principal'])}}" class="text-white text-decoration-none">
                        Rutas de Aprendizaje
                    </a><br />
                    <a href="{{ route('courses.index') }}" class="text-white text-decoration-none">
                        Talleres en vivo
                    </a><br />
                    <a href="{{ route('qd.advice.advisors.index') }}" class="text-white text-decoration-none">
                        Mentorías
                    </a>
                </p>
            </div>
        </div>
        <br>
        <div class="footer-line mt-4"></div>
        <p class="footer-text mt-4">©<span id="current-year"></span>
            QUERIDO DINERO S.A. DE C.V. TODOS LOS DERECHOS RESERVADOS
        </p>
        <br>
    </div>
</footer>

<!----->
