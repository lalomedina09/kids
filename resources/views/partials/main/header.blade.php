<div class="header-wrapper">
    <header class="container navbar header">
        <button class="navbar-toggler header__menu-button"
            data-toggle="collapse" data-target="#navbar-collapse"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="header__menu-button-bar"></span>
        </button>

        <div class="collapse navbar-collapse header__menu" id="navbar-collapse">
            <div class="header__menu-wrapper">
                <h6 class="header__menu-title">Temas</h6>

                <ul class="navbar-nav header__menu-list">
                    <!-- Categorias fijas que ya tienen articulos-->
                    @php
                        $categories = App\Models\Category::whereIn('id', ['4', '5', '6', '7', '8', '9'])->get();
                    @endphp

                    @foreach($categories as $category)
                        <li class="nav-item">
                            <a href="{{ route('articles.category.index', $category) }}"
                                class="header__menu-link">
                                {{ $category->present()->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>

                <h6 class="header__menu-title">Secciones</h6>

                <ul class="navbar-nav header__menu-list">
                    @if (config()->has('money.modules.blog'))
                        <li class="nav-item">
                            <a href="{{ route('blog') }}"
                                class="header__menu-link">
                                Blog
                            </a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <a href="{{ route('courses.index') }}"
                            class="header__menu-link">
                            Talleres Personalizados
                        </a>
                    </li>

                    <!--<li class="nav-item">
                        <a href="{{ route('qdplay.index') }}"
                            class="header__menu-link">
                            QDPlay
                        </a>
                    </li>-->

                    @if (config()->has('money.modules.advice'))
                        <li class="nav-item">
                            <a href="{{ route('qd.advice.advisors.index') }}"
                                class="header__menu-link">
                                Asesores
                            </a>
                        </li>
                    @endif
                    {{--
                    @if (config()->has('money.modules.products'))
                        <li class="nav-item">
                            <a href="{{ route('qd.products.products.index') }}"
                                class="header__menu-link">
                                Productos
                            </a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <a href="{{ config('money.url.store') }}"
                            class="header__menu-link">
                            Libro
                        </a>
                    </li>--}}
                </ul>

                <div class="d-none d-lg-block header__menu-footer">
                    <ul class="list-inline header__menu-footer-list">
                        <li class="list-inline-item">
                            <a href="{{ route('about') }}"
                                class="header__menu-about">
                                Sobre nosotros
                            </a>
                        </li>

                        <li class="list-inline-item">
                            <a href="{{ route('collaborations') }}"
                                class="header__menu-about">
                                Colaboraciones
                            </a>
                        </li>

                        <li class="list-inline-item">
                            <a href="{{ route('contact') }}"
                                class="header__menu-about">
                                Contacto
                            </a>
                        </li>
                    </ul>

                    <ul class="list-inline header__menu-footer-list mt-4">
                        <li class="list-inline-item">
                            <a href="{{ config('money.url.facebook') }}" target="_blank" rel="noopener nofollow"
                                class="header__menu-social">
                                <span class="fa fa-lg fa-facebook"></span>
                            </a>
                        </li>

                        <li class="list-inline-item">
                            <a href="{{ config('money.url.twitter') }}" target="_blank" rel="noopener nofollow"
                                class="header__menu-social">
                                <span class="fa fa-lg fa-twitter"></span>
                            </a>
                        </li>

                        <li class="list-inline-item">
                            <a href="{{ config('money.url.youtube') }}" target="_blank" rel="noopener nofollow"
                                class="header__menu-social">
                                <span class="fa fa-lg fa-youtube-play"></span>
                            </a>
                        </li>

                        <li class="list-inline-item">
                            <a href="{{ config('money.url.instagram') }}" target="_blank" rel="noopener nofollow"
                                class="header__menu-social">
                                <span class="fa fa-lg fa-instagram"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <a href="{{ route('home') }}">
            <img src="{{ asset('images/logo_light.svg') }}" class="header__logo" alt="Querido Dinero">
        </a>

        <nav class="nav d-none d-lg-flex header__navigation">
            <!--<a href="#" title="Proximamente"
                class="newlogo nav-link header__navigation-link {{ active_class('qdplay*') }}">
                QD Play <img src="{{ asset('images/qdplay/gifs/billetecaalert.gif')}}" class="" style="">
            </a>-->
            <a href="/" class="nav-link header__navigation-link {{ active_class('descargas*') }}">
                Inicio
            </a>
            @if (config()->has('money.modules.blog'))
                <a href="{{ route('blog') }}"
                    class="nav-link header__navigation-link {{ active_class('articles*') }}">
                    Blog
                </a>
            @endif

            <a href="{{ route('courses.index') }}"
                class="nav-link header__navigation-link {{ active_class('talleres*') }}">
                Talleres Personalizados
            </a>

            {{--<a href="{{ route('qdplay.index') }}"
                class="newlogo nav-link header__navigation-link {{ active_class('qdplay*') }}">
                QD Play <img src="{{ asset('images/qdplay/gifs/billetecaalert.gif')}}" class="" style="">
            </a>--}}

            @if (config()->has('money.modules.advice'))
                <a href="{{ route('qd.advice.advisors.index') }}"
                    class="nav-link header__navigation-link {{ active_class('asesores*') }}">
                    Asesores
                </a>
            @endif

            <a href="{{ route('contact') }}"
                class="nav-link header__navigation-link {{ active_class('descargas*') }}">
                Contacto
            </a>
            {{--@if (config()->has('money.modules.products'))
                <a href="{{ route('qd.products.products.index') }}"
                    class="nav-link header__navigation-link {{ active_class('productos*') }}">
                    Productos
                </a>
            @endif--}}

            <!--<a href="{{ route('downloads.index') }}"
                class="nav-link header__navigation-link {{ active_class('descargas*') }}">
                Descargas
            </a>

            <a href="{{ config('money.url.store') }}"
                class="nav-link header__navigation-link">
                Libro

            </a>-->
            
            @auth
                @if (config()->has('money.modules.marketplace'))
                    <a href="{{ route('qd.marketplace.orders.index') }}" class="nav-link header__navigation-link">
                        Mis compras
                    </a>
                @endif
            @endauth

        </nav>

        <ul class="nav">
            <li class="nav-item nav-item-search d-none d-sm-inline">
                <a href="#" id="nav--search" data-fullmodal="#modal-search">
                    <img src="{{ asset('images/icons/lupa.svg') }}" class="mb-5px" alt="search icon">
                </a>
            </li>
            @auth
                {{--{{ getNotificationsMenu() }}
                <li class="nav-item nav-item-search d-none d-sm-inline">
                    <a href="{{route('notification.index')}}" id="nav--search">
                        <img
                            @if(getNotificationsMenu() ==0)
                                src="{{ asset('images/icons/notification-red.svg') }}"
                            @else
                                src="{{ asset('images/icons/notification-red-circle.svg') }}"
                            @endif
                            class="mb-5px"
                            alt="Notification icon">
                    </a>
                </li>--}}
                @if(config()->has('money.modules.marketplace'))
                    <li class="nav-item nav-item-search d-none d-sm-inline">
                        <a href="{{ route('qd.marketplace.orders.index') }}" id="nav--search">
                            <img src="{{ asset('images/icons/order-red.svg') }}" class="mb-5px" alt="Order icon">
                        </a>
                    </li>
                @endif
            @endauth
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle header__buttons header__buttons--last"
                    data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">

                    @guest
                        <span class="text-small d-none d-xl-inline-block"> Mi Cuenta </span>
                    @endguest

                    @auth
                        <span class="text-small d-none d-xl-inline-block">Hola, {{ auth()->user()->name }}</span>
                        <!-- Aquí va la imagen de perfil del usuario -->
                    @endauth
                    <!--<i class="lni lni-user"></i><i class="lni lni-menu"></i>-->
                    <!--<img src="{{ asset('images/user.svg') }}" alt="user icon" class="svg">-->
                </a>

                <div class="dropdown-menu header__dropdown">
                    @auth
                        @can('blog.dashboard.show')
                            <a href="/dashboard"
                                class="dropdown-item header__buttons header__dropdown-buttons">
                                Dashboard
                            </a>

                            <div class="dropdown-divider header__dropdown-divider"></div>
                        @endcan

                        <a href="{{ route('profile.edit') }}"
                            class="dropdown-item header__buttons header__dropdown-buttons">
                            Perfil
                        </a>

                        <div class="dropdown-divider header__dropdown-divider"></div>

                        <a href="{{ route('exercises.index') }}"
                            class="dropdown-item header__buttons header__dropdown-buttons">
                            Ejercicios
                        </a>

                        <div class="dropdown-divider header__dropdown-divider"></div>
                            <!--<a href="#"
                                class="dropdown-item header__buttons header__dropdown-buttons">
                                Notificaciones
                            </a>-->
                        @if (config()->has('money.modules.marketplace'))
                            <a href="{{ url('/perfil#asesorias') }}"
                                class="dropdown-item header__buttons header__dropdown-buttons">
                                Mis asesorias
                            </a>

                            <a href="{{ route('qd.marketplace.orders.index') }}"
                                class="dropdown-item header__buttons header__dropdown-buttons">
                                Mis compras
                            </a>
                        @endif

                        <div class="dropdown-divider header__dropdown-divider"></div>

                        <a href="{{ route('logout') }}"
                            class="dropdown-item header__buttons header__dropdown-buttons">
                            Cerrar sesión
                        </a>
                    @endauth

                    @guest
                        <a href="#" class="dropdown-item header__buttons header__dropdown-buttons"
                            data-toggle="modal" data-target="#register-modal">
                            Crear cuenta
                        </a>

                        <div class="dropdown-divider header__dropdown-divider"></div>

                        <a href="#" class="dropdown-item header__buttons header__dropdown-buttons"
                            data-toggle="modal" data-target="#login-modal">
                            Iniciar sesión
                        </a>
                    @endguest
                </div>
            </li>
        </ul>
    </header>
</div>
