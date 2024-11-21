@php
    $getActiveAd = getActiveAd();
    $user = Auth::user();
@endphp
@if(!$getActiveAd)
    <style>
        .navbar {
            top: 0px;
        }
    </style>
@else
    <style>
        #add-top{
            background-color: {{ $getActiveAd->background_color }};
        }
        .anuncio{
            background-color: {{ $getActiveAd->background_color }};
        }
        .anuncio:hover{
            background-color: {{ $getActiveAd->background_color }};
        }
    </style>
@endif

@if($getActiveAd)
    <div id="add-top" class="container-fluid">
        <div class="row">
            <div class="col-12 text-center py-3 anuncio">
                <a href="{{ $getActiveAd->destination_url }}" style="text-decoration: none; color: #fff;" class="m-0 text-anuncio">
                    ⚡️
                    {{ $getActiveAd->content }}
                    ⚡️
                    @if($getActiveAd->has_countdown && $getActiveAd->end_date)
                        <i class="fa-solid fa-clock fa-beat ml-2"></i>
                        <span class="ml-1" id="countdown" style="font-weight: 700;"></span>
                    @endif
                </a>
            </div>
        </div>
    </div>
@endif
<!------------------------------------------------------------------------------------------------------->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-menu">
    <div class="container d-flex justify-content-between align-items-center">
        <!-- Botón de toggling para pantallas pequeñas -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Logo en el centro -->
        <a class="navbar-brand mx-auto order-menu-hamburger" href="#">
            <img src="{{ asset('version-2/images/imglogomenu/group-127-1.png') }}" alt="Logo"
                class="d-inline-block align-top logo-menu-qd">
        </a>

        @auth
            <!-- Enlace de perfil -->
            <a class="ml-auto order-2 profile-trigger" href="#">
                <img src="{{ asset('version-2/images/components/user.png') }}" alt="Imagen de perfil" width="45">
            </a>

            <!-- Menú desplegable del perfil -->
            <div class="profile-menu d-none">
                <div class="profile-info d-flex align-items-center" style="width: 100%;">
                    <div style="flex: 0 0 30%; text-align: center;">
                        <img src="{{ asset('version-2/images/components/user.png') }}" alt="Imagen de perfil" width="60">
                    </div>
                    <div style="flex: 1 1 70%; padding-left: 10px; text-align: left;">
                        <p style="margin: 0; font-weight: bold;">{{ $user->name }}</p>
                        <p style="margin: 0; color: gray; font-size: 0.9rem;">{{ $user->email }}</p>
                    </div>
                </div>
                <ul class="profile-options">
                    <hr style="border-top: 1px solid #ffffff;">
                    @can('blog.dashboard.show')
                        <li>
                            <a href="{{ route('dashboard.index') }}" target="_blank">
                                <img src="{{ asset('version-2/images/components/svg/gear-1.svg') }}" alt="Editar" width="20"> Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('dashboard.articles.index') }}" target="_blank">
                                <img src="{{ asset('version-2/images/components/svg/gear-1.svg') }}" alt="Editar" width="20"> Blog
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('dashboard.qdplay') }}" target="_blank">
                                <img src="{{ asset('version-2/images/components/svg/gear-1.svg') }}" alt="Editar" width="20"> QD Play
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('dashboard.qdplay.v2.panoramic') }}" target="_blank">
                                <img src="{{ asset('version-2/images/components/svg/gear-1.svg') }}" alt="Editar" width="20"> Admin V2
                            </a>
                        </li>
                        <hr style="border-top: 1px solid #ffffff;">
                    @endcan
                    <li>
                        <a href="#">
                            <img src="{{ asset('version-2/images/components/svg/pencil-1.svg') }}" alt="Editar" width="20"> Mi perfil
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{ asset('version-2/images/components/svg/cart-2.svg') }}" alt="Compras" width="20"> Mis compras
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}">
                            <img src="{{ asset('version-2/images/components/svg/exit.svg') }}" alt="Compras" width="20"> Cerrar sesión
                        </a>
                    </li>
                    <hr style="border-top: 1px solid #ffffff;">
                    <li>
                        <a href="#">
                            <img src="{{ asset('version-2/images/components/svg/youtube.svg') }}" alt="Compras" width="20"> Academia
                            virtual
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{ asset('version-2/images/components/svg/route-1.svg') }}" alt="Compras" width="20"> Rutas de
                            aprendizaje
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{ asset('version-2/images/components/svg/star-fat.svg') }}" alt="Compras" width="20"> Membresía
                        </a>
                    </li>
                    <hr style="border-top: 1px solid #ffffff;">
                    <li>
                        <a href="#">
                            <img src="{{ asset('version-2/images/components/svg/calculator-1.svg') }}" alt="Compras" width="20">
                            Herramientas
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{ asset('version-2/images/components/svg/game-pad-modern-1.svg') }}" alt="Compras" width="20">
                            Juegos
                        </a>
                    </li>
                    <hr style="border-top: 1px solid #ffffff;">
                    <li>
                        <a href="#">
                            <img src="{{ asset('version-2/images/components/svg/blogger.svg') }}" alt="Compras" width="20"> Blog
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{ asset('version-2/images/components/svg/layers-1.svg') }}" alt="Compras" width="20"> Marcadores
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{ asset('version-2/images/components/svg/envelope-1.svg') }}" alt="Compras" width="20">
                            Newsletter
                        </a>
                    </li>
                    <hr style="border-top: 1px solid #ffffff;">
                    <li>
                        <a href="#">
                            <img src="{{ asset('version-2/images/components/svg/helicopter-2.svg') }}" alt="Compras" width="20"> Ayuda
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{ asset('version-2/images/components/svg/comment-1.svg') }}" alt="Compras" width="20"> Enviar
                            comentarios
                        </a>
                    </li>
                </ul>
            </div>
        @else
            <!-- Botón que debe aparecer solo en desktop -->
            <a class="btn btn-dark ml-auto order-2 d-none d-lg-block" href="#" data-toggle="modal"
                data-target="#modalLogin">Acceder</a>

            <!-- Botón que debe aparecer solo en móvil -->
            <a class="btn btn-dark ml-auto order-2 d-lg-none" href="{{ route('login') }}">Acceder</a>
        @endauth

        <!-- Contenido del menú colapsable -->
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Para empresas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Editorial</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Cursos Online</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Contacto</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    window.addEventListener('scroll', function() {
        var anuncio = document.querySelector('.anuncio');
        var navbar = document.querySelector('.navbar');

        // Obtén las alturas actuales de los elementos
        var anuncioHeight = anuncio.offsetHeight;
        var navbarHeight = navbar.offsetHeight;

        if (window.scrollY > anuncioHeight) {
            anuncio.style.top = `-${anuncioHeight}px`; // Mueve el anuncio hacia arriba
            navbar.style.top = '0'; // Fija el menú en la parte superior
        } else {
            anuncio.style.top = '0'; // Vuelve a mostrar el anuncio
            navbar.style.top = `${anuncioHeight}px`; // Mantiene el menú debajo del anuncio
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const profileTrigger = document.querySelector('.profile-trigger');
        const profileMenu = document.querySelector('.profile-menu');

        profileTrigger.addEventListener('click', (event) => {
            event.preventDefault();
            profileMenu.classList.toggle('d-none');
        });

        // Cerrar el menú si se hace clic fuera de él
        document.addEventListener('click', (event) => {
                if (!profileMenu.contains(event.target) && !profileTrigger.contains(event.target)) {
                profileMenu.classList.add('d-none');
            }
        });
    });
</script>

@if($getActiveAd)
    @if($getActiveAd->has_countdown && $getActiveAd->end_date)
        <script>
            const countdownElement = document.getElementById('countdown');
            const endTime = new Date("{{ $getActiveAd->end_date }}").getTime();

            const updateCountdown = () => {
                const now = new Date().getTime();
                const distance = endTime - now;

                if (distance <= 0) {
                    countdownElement.innerHTML = "¡El anuncio ha terminado!";
                    return clearInterval(interval);
                }

                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                countdownElement.innerHTML = `${hours}h ${minutes}m ${seconds}s`;
            };

            const interval = setInterval(updateCountdown, 1000);
            updateCountdown();
        </script>
    @endif

@endif
