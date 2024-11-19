<style>
    .profile-menu {
        position: absolute;
        top: 70px; /* Ajustar según la altura del header */
        right: 10px;
        background: #000000;
        border: 1px solid #000000;
        border-radius: 5px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        padding: 10px;
        z-index: 1000;
        width: 300px;
        color: #ffffff;
        font-family: "Akshar", Helvetica;
    }

    .profile-menu .profile-info {
        text-align: center;
        margin-bottom: 10px;
    }

    .profile-menu .profile-options {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .profile-menu .profile-options li {
        margin: 15px 5px;
    }

    .profile-menu .profile-options li a {
        text-decoration: none;
        color: #FFFFFF;
        font-size: 16px;
        font-family: "Akshar", Helvetica;
    }

    .d-none {
        display: none !important;
    }
</style>

<div class="container-fluid bg-dark">
    <div class="row">
        <div class="col-12 bg-dark text-center py-3 anuncio">
            <p class="m-0 text-anuncio">
                <span class="text-white">⚡️Abre tu cuenta de BBVA en minutos desde la comodidad de tu hogar.</span>
                <span class="font-weight-bold text-white text-decoration-underline">¡Sin filas, sin papeleo! Apertura de
                    Cuenta Fácil y Rápida</span>
                <span class="font-weight-bold text-warning">→</span>
            </p>
        </div>
    </div>
</div>
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
                        <p style="margin: 0; font-weight: bold;">Nombre del usuario</p>
                        <p style="margin: 0; color: gray; font-size: 0.9rem;">correo@ejemplo.com</p>
                    </div>
                </div>
                <ul class="profile-options">
                    <hr style="border-top: 1px solid #ffffff;">
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
                        <a href="#">
                            <img src="{{ asset('version-2/images/components/svg/cart-2.svg') }}" alt="Compras" width="20"> Cerrar sesión
                        </a>
                    </li>
                    <hr style="border-top: 1px solid #ffffff;">
                    <li>
                        <a href="#">
                            <img src="{{ asset('version-2/images/components/svg/cart-2.svg') }}" alt="Compras" width="20"> Academia virtual
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{ asset('version-2/images/components/svg/cart-2.svg') }}" alt="Compras" width="20"> Rutas de aprendizaje
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{ asset('version-2/images/components/svg/cart-2.svg') }}" alt="Compras" width="20"> Membresía
                        </a>
                    </li>
                    <hr style="border-top: 1px solid #ffffff;">
                    <li>
                        <a href="#">
                            <img src="{{ asset('version-2/images/components/svg/cart-2.svg') }}" alt="Compras" width="20"> Herramienta
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{ asset('version-2/images/components/svg/cart-2.svg') }}" alt="Compras" width="20"> Juegos
                        </a>
                    </li>
                    <hr style="border-top: 1px solid #ffffff;">
                    <li>
                        <a href="#">
                            <img src="{{ asset('version-2/images/components/svg/cart-2.svg') }}" alt="Compras" width="20"> Blog
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{ asset('version-2/images/components/svg/cart-2.svg') }}" alt="Compras" width="20"> Marcadores
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{ asset('version-2/images/components/svg/cart-2.svg') }}" alt="Compras" width="20"> Newsletter
                        </a>
                    </li>
                    <hr style="border-top: 1px solid #ffffff;">
                    <li>
                        <a href="#">
                            <img src="{{ asset('version-2/images/components/svg/bell-1.svg') }}" alt="Compras" width="20"> Ayuda
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{ asset('version-2/images/components/svg/comment-1.svg') }}" alt="Compras" width="20"> Enviar comentarios
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
