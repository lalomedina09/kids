<footer class="footer box">
    <div class="container">
        <div class="row footer__sitemap">
            <div class="col-xl-10">
               <div class="row">
                    <div class="col-sm-3">
                        <h4 class="text-secondary mb-3">Por categoría</h4>
                        <ul class="list-unstyled list-inline mb-0">
                            {{-- Lista de categorias viene del archivo helpers.php--}}
                            @foreach(getCategoriesQD() as $category)
                                <li class="mb-1">
                                    <a href="{{ route('articles.category.index', $category) }}" class="link-white">{{ $category->present()->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-sm-3">
                        <h4 class="text-secondary mb-3">Por sección</h4>
                        <ul class="list-unstyled list-inline mb-0">
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
                                    <a href="{{ route('qd.advice.advisors.index') }}" class="text-white">Couches</a>
                                </li>
                            @endif
                            {{--@if (config()->has('money.modules.products'))
                                <li class="mb-1">
                                    <a href="{{ route('qd.products.products.index') }}" class="text-white">Productos</a>
                                </li>
                            @endif--}}
                            <li class="mb-1">
                                <a href="{{ config('money.url.store') }}" class="link-white">Libro</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-3">
                        <h4 class="text-secondary mb-3">Contáctanos</h4>
                        <ul class="list-unstyled list-inline mb-0">
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
            </div><!-- .col-sm-9 -->
        </div><!-- .row -->
        <div class="row d-none d-sm-block">
            <div class="col-12">
                <hr>
            </div><!-- .col-12 -->
        </div><!-- .row -->
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
            </div><!-- .col-sm-12 -->
        </div><!-- .row -->
        <div class="row">
            <div class="col-12">
                <p class="text-uppercase text-small text-light mt-3 footer__copyright">{{ config('money.copyright') }}</p>
            </div><!-- .col-12 -->
        </div><!-- .row -->
    </div><!-- .container -->
</footer><!-- .footer -->
