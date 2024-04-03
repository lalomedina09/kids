<div class="header-wrapper">
    <header class="container navbar header">
        <button class="navbar-toggler header__menu-button"
            data-toggle="collapse" data-target="#navbar-collapse"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="header__menu-button-bar"></span>
        </button>

        <div class="collapse navbar-collapse header__menu" id="navbar-collapse">
            <div class="header__menu-wrapper">
                <!--<h6 class="header__menu-title">Temas</h6>-->
                {{--<ul class="navbar-nav header__menu-list">
                    @foreach(getCategoriesQD() as $category)
                        <li class="nav-item">
                            <a href="{{ route('articles.category.index', $category) }}"
                                class="header__menu-link">
                                {{ $category->present()->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>--}}

                <h6 class="header__menu-title">Secciones</h6>

                <ul class="navbar-nav header__menu-list">
                    <li class="nav-item">
                        <a href="{{ route('qdplay.index') }}"
                            class="header__menu-link">
                            QD Play
                        </a>
                    </li>

                    @if (config()->has('money.modules.blog'))
                        <li class="nav-item">
                            <a href="{{ route('blog') }}"
                                class="header__menu-link">
                                Blog
                            </a>
                        </li>
                    @endif

                    <!--<li class="nav-item">
                        <a href="{{ route('courses.index') }}"
                            class="header__menu-link">
                            Talleres Personalizados
                        </a>
                    </li>-->

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
                                Mentores
                            </a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <a href="{{ route('qdplay.index') }}"
                            class="header__menu-link">
                            App Android | Apple
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('qdplay.index') }}"
                            class="header__menu-link">
                            QD Play Empresas
                        </a>
                    </li>
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

            {{--<a href="/" class="nav-link header__navigation-link {{ active_class('descargas*') }}">
                Inicio
            </a>--}}
            @auth
                <a href="{{ route('qdplay.content') }}" title="QD Play"
                    class="newlogo nav-link header__navigation-link {{ active_class('qdplay*') }}">
                    QD Play <img src="{{ asset('images/qdplay/gifs/billetecaalert.gif')}}" width="20">
                </a>
            @else
                <a href="{{ route('home') }}" title="QD Play"
                    class="newlogo nav-link header__navigation-link {{ active_class('qdplay*') }}">
                    QD Play <img src="{{ asset('images/qdplay/gifs/billetecaalert.gif')}}" width="20">
                </a>
            @endauth
            <a href="{{ route('qdplay.business') }}" title="QD Play para empresas"
                class="newlogo nav-link header__navigation-link {{ active_class('qdplay/empresas*') }}">
                Para Empresas
            </a>

            @if (config()->has('money.modules.blog'))
                <a href="{{ route('blog') }}"
                    class="nav-link header__navigation-link {{ active_class('articles*') }}">
                    Blog
                </a>
            @endif

            @if (config()->has('money.modules.advice'))
                <a href="{{ route('qd.advice.advisors.index') }}"
                    class="nav-link header__navigation-link {{ active_class('asesores*') }}">
                    Mentores
                </a>
            @endif

            <!--<a href="{{ route('profile.edit') }}#{{ str_slug(__('Tools')) }}"
                    class="nav-link header__navigation-link {{ active_class('asesores*') }}">
                    Herramientas
            </a>-->

            <a href="{{ route('contact') }}"
                class="nav-link header__navigation-link {{ active_class('descargas*') }}">
                Contacto
            </a>

            {{--
                @auth
                    @if (config()->has('money.modules.marketplace'))
                        <a href="{{ route('qd.marketplace.orders.index') }}" class="nav-link header__navigation-link">
                            Mis compras
                        </a>
                    @endif
                @endauth
            --}}

        </nav>

        <ul class="nav">
            {{--
            <li class="nav-item nav-item-search d-none d-sm-inline">
                <a href="#" id="nav--search" data-fullmodal="#modal-search">
                    <img src="{{ asset('images/icons/search.svg') }}" class="mb-5px" alt="search icon">
                </a>
            </li>
            --}}
            @auth
                @if (getNotificationsMenu() > 0)
                    <!--<li class="nav-item nav-item-search d-none d-sm-inline">
                        <a href="{{route('notification.index')}}" id="" >
                            <img src="{{ asset('images/icons/notification-circle.svg') }}" class="mb-5px" id="icon-notification-alert" alt="Notification Icon Alert" width="25px">
                        </a>
                    </li>-->
                @else
                    <!--<li class="nav-item nav-item-search d-none d-sm-inline">
                        <a href="{{route('notification.index')}}" id="nav--search">
                            <img src="{{ asset('images/icons/notification.svg') }}" class="mb-5px" alt="Notification Icon Dont Alert">
                        </a>
                    </li>-->
                @endif
                {{--@if(config()->has('money.modules.marketplace'))
                    <li class="nav-item nav-item-search d-none d-sm-inline">
                        <a href="{{ route('qd.marketplace.orders.index') }}" id="nav--search" title="Mis Compras">
                            <img src="{{ asset('images/icons/order.svg') }}" class="mb-5px" alt="Order Icon">
                        </a>
                    </li>
                @endif --}}
            @endauth

            <li class="nav-item dropdown">

                <a href="#" class="nav-link dropdown-toggle header__buttons header__buttons--last"
                    data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">

                    @guest
                        <span class="text-small d-none d-xl-inline-block">
                            Acceder
                        </span>
                    @endguest

                    @auth
                        <!--<span class="text-small d-none d-xl-inline-block">
                            Hola, {{ auth()->user()->name }}
                        </span>-->
                        <span class="text-small d-xl-inline-block">
                            <i class="fa fa-sliders" aria-hidden="true"></i> {{ auth()->user()->name }} <!---Mi Cuenta-->
                        </span>
                        {{--
                            @if (auth()->user()->present()->profile_photo)
                            <img src="{{ auth()->user()->present()->profile_photo }}"
                                class="rounded-circle"
                                width="40px"
                                height="40px"
                                alt="{{ auth()->user()->name }}">
                            @endif
                        --}}
                    @endauth
                </a>

                <div class="dropdown-menu header__dropdown">
                    @auth
                    <a href="{{ route('qdplay.content') }}"
						class="dropdown-item header__buttons header__dropdown-buttons">
						QD Play
					</a>
					<div class="dropdown-divider header__dropdown-divider"></div>
                        @can('blog.dashboard.show')
                            <a href="/dashboard" class="dropdown-item header__buttons header__dropdown-buttons">
                                Dashboard
                            </a>

                            <div class="dropdown-divider header__dropdown-divider"></div>
                        @endcan

                        <a href="{{ route('profile.edit') }}" class="dropdown-item header__buttons header__dropdown-buttons">
                            Perfil
                        </a>

                        <!--<div class="dropdown-divider header__dropdown-divider"></div>-->

                        <!--<a href="{{ route('exercises.index') }}" class="dropdown-item header__buttons header__dropdown-buttons">
                            Ejercicios
                        </a>-->

                        <div class="dropdown-divider header__dropdown-divider"></div>
                            <a href="{{route('notification.index')}}"
                                class="dropdown-item header__buttons header__dropdown-buttons">
                                Notificaciones
                            </a>
                            <!--<a href="{{ route('profile.edit') }}#{{ str_slug(__('Tools')) }}"
                                class="dropdown-item header__buttons header__dropdown-buttons">
                                Herramientas
                            </a>-->

                        @if (config()->has('money.modules.marketplace'))
                            <a href="{{ url('/perfil#asesorias') }}" class="dropdown-item header__buttons header__dropdown-buttons">
                                Mis mentorías
                            </a>

                            <a href="{{ route('qd.marketplace.orders.index') }}" title="Mis Compras"
                                class="dropdown-item header__buttons header__dropdown-buttons">
                                Mis compras
                            </a>
                        @endif

                        <div class="dropdown-divider header__dropdown-divider"></div>

                        <a href="{{ route('logout') }}" class="dropdown-item header__buttons header__dropdown-buttons">
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
            <!---------------------------------------------->
            <!--<li class="nav-item nav-item-search d-none d-sm-inline">
                <a href="{{ route('qd.marketplace.orders.index') }}" id="nav--search" title="Mis Compras">
                    Prueba Gratis
                </a>
            </li>-->
            <!------------------------------------------------------------------------------------------------------------------------->
            {{--<li class="nav-item dropdown">
                <a href="https://www.queridodinero.com/qdplay/CdUIuL8sW" class="nav-link text-blue">
                    <span class="text-small d-xl-inline-block">
                        Prueba Gratis
                    </span>
                </a>
            </li>--}}
            <!-------------------------------------------------------------------------------------------------------------------------->
            {{--
            <li class="nav-item nav-item-search d-none d-sm-inline" style="margin-top:10px;">
				<a href="https://www.queridodinero.com/qdplay/CdUIuL8sW" class="nav-link text-blue font-size-sm">
                    Prueba Gratis
                </a>
			</li>
            --}}
        </ul>
    </header>
</div>
