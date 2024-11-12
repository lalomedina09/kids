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

        <!-- Botón de acceso a la derecha -->
        <a class="btn btn-dark ml-auto order-2" href="#">Acceder</a>

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
