<style>
    /* General */
    /*
    body {
    background: #121212;
    margin: 0;
    font-family: 'Arial', sans-serif;
    }
    */
    h1 {
        font-size: 2.5rem;
        font-weight: bold;
        color: #fff
    }

    h2 {
        color: #fff
    }

    .hero-section {
        background: linear-gradient(180deg, #121212, #1e1e1e);
        padding: 50px 0;
    }

    .bg-features-agency {
        background: linear-gradient(180deg, #121212, #1e1e1e);
    }

    .hero-section h1 {
        font-size: 3rem;
        font-weight: bold;
    }

    /* Secciones de Contenido */
    .content-text {
        color: #fff;
        padding: 20px;
    }

    .content-text h2 {
        margin-top: 10px;
        font-size: 1.8rem;
    }

    .content-text p {
        font-size: 1rem;
        margin: 10px 0 20px;
    }

    .content-text .badge {
        font-size: 0.9rem;
        margin-bottom: 10px;
    }

    /* Imagen con fondo de mancha y animación */
    .content-image {
        position: relative;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .content-image::before {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        z-index: -1;
        border-radius: 50%;
        filter: blur(40px);
        animation: float 4s infinite ease-in-out;
    }

    .content-image.identity::before {
        background: #ffc107;
        /* Amarillo */
    }

    .content-image.community::before {
        background: #dc3545;
        /* Rojo */
    }

    .content-image img {
        width: 80%;
        animation: buzz 2s infinite alternate ease-in-out;
    }

    /* Animaciones */
    @keyframes buzz {
        0% {
            transform: translateX(-5px);
        }

        100% {
            transform: translateX(5px);
        }
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(-10px);
        }

        50% {
            transform: translateY(10px);
        }
    }

    /* Botón */
    .btn {
        font-size: 0.9rem;
        font-weight: bold;
        border-radius: 5px;
    }
</style>
<!---
<section class="hero-section text-center text-white py-5">
</section>
-->
<div class="bg-features-agency" style="">
    <section class=" content-section container py-5 bg-features-agency">
        <div class="row align-items-center mb-5">
            <div class="col-md-12">
                <h1 class="color-white text-center font-akshar font-weight-normal display-4">
                    Hagamos que tu audiencia <br>conecte con las finanzas ✨
                </h1>
            </div>
            <!-- Columna de Texto -->
            <div class="col-md-6 order-2 order-md-1 content-text text-center text-md-left">
                <span class="font-akshar badge bg-warning text-dark">
                    IDENTIDAD
                </span>
                <br>
                <h2 class="font-akshar">Agencia creativa <br>de nicho financiera</h2>
                <br>
                <p class="font-akshar">
                    Con 10 años de experiencia y una red de colaboradores especialistas, resolvemos desde proyectos
                    puntuales hasta la planeación estratégica a largo plazo.
                </p>
                <br>
            </div>
            <!-- Columna de Imagen con Efecto -->
            <div class="col-md-6 order-1 order-md-2 content-image identity text-center">
                <img src="{{ asset('version-2/images/agency/identidad.png') }}" alt="Identidad Financiera">
            </div>
        </div>

        <div class="row align-items-center mb-5">
            <!-- Columna de Texto -->
            <div class="col-md-6 order-2 order-md-1 content-text text-center text-md-left">
                <span class="font-akshar badge bg-danger">CONTENIDO</span>
                <br>
                <h2 class="font-akshar">Generación de contenido <br>y community management</h2>
                <br>
                <p class="font-akshar">
                    Adaptados al tono y lineamientos de marca, llevamos
                    la comunicación de redes sociales y otros canales
                    para que las empresas puedan delegar la estrategia, generación y mantenimiento del contenido.
                    <br><br>
                    Somos expertos creando distintos formatos como:
                    Posts de Redes Sociales (visuales, infografías,
                    videos cortos, textos, memes, etc), community management, artículos escritos, newsletters,
                    entrevistas, entre otros.
                </p>
                <br>
            </div>
            <!-- Columna de Imagen con Efecto -->
            <div class="col-md-6 order-1 order-md-2 content-image community text-center">
                <img src="{{ asset('version-2/images/agency/contenido.png') }}" alt="Contenido y Community Management">
            </div>
        </div>

        <div class="row align-items-center mb-5">
            <!-- Columna de Texto -->
            <div class="col-md-6 order-2 order-md-1 content-text text-center text-md-left">
                <span class="font-akshar badge bg-danger">MEDIA</span>
                <br>
                <h2 class="font-akshar">Producción <br> audiovisual</h2>
                <br>
                <p class="font-akshar">
                    Generamos material multimedia para que bancos, fintechs y otras empresas financieras logren transmitir sus mensajes en
                    distintos canales audiovisuales.
                </p>
                <br>
            </div>
            <!-- Columna de Imagen con Efecto -->
            <div class="col-md-6 order-1 order-md-2 content-image community text-center">
                <img src="{{ asset('version-2/images/agency/media.png') }}" alt="Contenido y Community Management">
            </div>
        </div>

        <div class="row align-items-center mb-5">
            <!-- Columna de Texto -->
            <div class="col-md-6 order-2 order-md-1 content-text text-center text-md-left">
                <span class="font-akshar badge bg-danger">FLEXIBLE</span>
                <br>
                <h2 class="font-akshar">Conceptos creativos <br> y proyectos especiales</h2>
                <br>
                <p class="font-akshar">
                    Sumamos fuerzas como aliados estratégicos de empresas financieras para apoyar con la generación de conceptos creativos,
                    experiencias de marca, campañas publicitarias, aplicaciones digitales, eventos, merchendise y otros proyectos
                    especiales.
                </p>
                <br>
            </div>
            <!-- Columna de Imagen con Efecto -->
            <div class="col-md-6 order-1 order-md-2 content-image community text-center">
                <img src="{{ asset('version-2/images/agency/flexible.png') }}" alt="Contenido y Community Management">
            </div>
        </div>
</div>
</section>
<script>
    // Efecto de "zumbido" más pronunciado al pasar el mouse
    document.querySelectorAll('.content-image img').forEach((img) => {
        img.addEventListener('mouseenter', () => {
            img.style.animation = 'buzz 0.5s infinite alternate ease-in-out';
        });
        img.addEventListener('mouseleave', () => {
            img.style.animation = 'buzz 2s infinite alternate ease-in-out';
        });
    });
</script>
