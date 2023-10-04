<footer class="footer box">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-12 text-center mb-4">
                <!--
                style="background: linear-gradient(to right, #90d06b, #01dacb); -webkit-background-clip: text; -webkit-text-fill-color: transparent;"
                -->
                <h3 class="text-white font-size-1x text-bold">
                    <!--Descarga la App <br>
                    y sigue aprendiendo donde sea-->
                    Descarga QD Play
                </h3>

                <a href="{{ env('APP_STORE', 'https://apps.apple.com/mx/app/qd-play/id6445823679') }}">
                    <img src="{{ asset('etapa1/stores/app-store.png') }}" alt="App Store Apple" width="200">
                </a>

                <a href="{{ env('APP_STORE', 'https://apps.apple.com/mx/app/qd-play/id6445823679') }}">
                    <img src="{{ asset('etapa1/stores/play-store.png') }}" alt="App Store Apple" width="200">
                </a>
            </div>
        </div>
        <div class="row footer__sitemap">
            <div class="col-xl-12">
               <div class="row">
                    {{--<div class="col-sm-3">
                        <h4 class="text-secondary mb-3 ml-5">Descarga QD Play</h4>
                        <ul class="list-unstyled list-inline mb-0 ml-5">
                            <li class="mb-1">
                                <a href="{{ env('APP_STORE', 'https://apps.apple.com/mx/app/qd-play/id6445823679') }}">
                                    <img src="{{ asset('etapa1/learning-paths/app-store.png') }}" alt="App Store Apple" width="150">
                                </a>
                            </li>
                            <li class="mb-1">
                                <a href="{{ env('PLAY_STORE', 'https://play.google.com/store/apps/details?id=com.queridodinero.qdplay') }}">
                                    <img src="{{ asset('etapa1/learning-paths/play-store.png') }}" alt="Play Store Google" width="150">
                                </a>
                            </li>
                            <li class="mb-1">
                                <br>
                                <a href="mailto:soporte@queridodinero.com?Subject=No%20puedo%20acceder%20a%20mi%20cuenta%20QDPlay" class="link-white">
                                <span class="text-white">
                                    ¿Necesitas ayuda para acceder a tu cuenta?
                                </span>
                                </a>
                            </li>
                        </ul>
                    </div>--}}
                    <div class="col-sm-4">
                        <h4 class="text-secondary mb-3 ml-5">Por categoría</h4>
                        <ul class="list-unstyled list-inline mb-0 ml-5">
                            {{-- Lista de categorias viene del archivo helpers.php--}}
                            @foreach(getCategoriesQD() as $category)
                                <li class="mb-1">
                                    <a href="{{ route('articles.category.index', $category) }}" class="link-white">{{ $category->present()->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-sm-4">
                        <h4 class="text-secondary mb-3 ml-5">Por sección</h4>
                        <ul class="list-unstyled list-inline mb-0 ml-5">
                            <li class="mb-1">
                                <a href="{{ route('qdplay.index') }}" class="link-white">QD Play</a>
                            </li>
                            @if (config()->has('money.modules.blog'))
                                <li class="mb-1">
                                    <a href="{{ route('blog') }}" class="text-white">Blog</a>
                                </li>
                            @endif
                            <li class="mb-1">
                                <a href="{{ route('courses.index') }}" class="link-white">Talleres</a>
                            </li>
                            @if (config()->has('money.modules.advice'))
                                <li class="mb-1">
                                    <a href="{{ route('qd.advice.advisors.index') }}" class="text-white">Mentores financieros</a>
                                </li>
                            @endif
                            <li class="mb-1">
                                <a href="{{ config('money.url.store') }}" class="link-white">Libro</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-4">
                        <h4 class="text-secondary mb-3 ml-5">Contáctanos</h4>
                        <ul class="list-unstyled list-inline mb-0 ml-5">
                            <li class="mb-1">
                                <a href="/contacto" class="link-white">Contacto</a>
                            </li>
                            <li class="mb-1">
                                <a href="{{ route('about') }}" class="link-white">Sobre nosotros</a>
                            </li>
                            <li class="mb-1">
                                <a href="{{ route('collaborations') }}" class="link-white">Colaboraciones</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-none d-sm-block">
            <div class="col-12">
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 footer__content">
                <ul class="list-unstyled list-inline mb-0">
                    <li class="list-inline-item">
                        <a href="{{ route('privacy') }}" class="link-white text-small text-uppercase ml-2">Aviso de Privacidad</a>
                    </li>
                    <li class="list-inline-item">
                        <a href="{{ route('terms') }}" class="link-white text-small text-uppercase ml-2">Términos y condiciones</a>
                    </li>
                    <li class="list-inline-item">
                        <a href="{{ route('policies') }}" class="link-white text-small text-uppercase">Políticas de devoluciones</a>
                    </li>
                </ul>

                <div class="footer__links">
                    <div class="dis-inline mb-0">
                        <span class="text-uppercase text-danger text-small">Síguenos</span>
                        <ul class="list-unstyled list-inline dis-inline mb-0 ml-4">
                            <li class="list-inline-item">
                                <a href="{{ config('money.url.facebook') }}" class="link-white link-icon" target="_blank" rel="noopener noreferrer">
                                    <span class="fa fa-lg fa-facebook text-white" aria-hidden="true"></span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ config('money.url.twitter') }}" class="link-white link-icon" target="_blank" rel="noopener noreferrer">
                                    <span class="fa fa-lg fa-twitter text-white" aria-hidden="true"></span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ config('money.url.youtube') }}" class="link-white link-icon" target="_blank" rel="noopener noreferrer">
                                    <span class="fa fa-lg fa-youtube-play text-white" aria-hidden="true"></span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ config('money.url.instagram') }}" class="link-white link-icon" target="_blank" rel="noopener noreferrer">
                                    <span class="fa fa-lg fa-instagram text-white" aria-hidden="true"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p class="text-uppercase text-small text-light mt-3 footer__copyright">{{ config('money.copyright') }}</p>
            </div>
        </div>
    </div>
</footer>
