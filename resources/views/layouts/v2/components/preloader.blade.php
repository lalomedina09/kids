<style>
    /* Contenedor del preloader */
    #preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background: linear-gradient(90deg, #DFC654, #88BCAF, #80809D, #C5481C, #EC6464);
        background-size: 300% 300%;
        animation: gradientMove 4s infinite ease-in-out;
        z-index: 10;
    }

    /* Animación del gradiente */
    @keyframes gradientMove {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    /* Texto dentro del preloader */
    #preloader h1 {
        font-size: 2rem;
        color: #000;
        /* Negro */
        text-transform: uppercase;
        font-family: "Besley", Helvetica, sans-serif;
        margin-bottom: 50px;
    }

    #preloader p {
        font-size: 1rem;
        color: #000;
        /* Negro */
        text-transform: uppercase;
        font-family: "Akshar", Helvetica, sans-serif;
        margin-bottom: 20px;
        margin-top: 20px;
    }

    /* Barra de carga */
    .progress-bar {
        position: relative;
        width: 50%;
        /* Ancho de la barra */
        height: 10px;
        background-color: #ddd;
        /* Color de fondo */
        border-radius: 5px;
        overflow: hidden;
    }

    .progress-bar .progress {
        width: 0%;
        height: 100%;
        background-color: #000;
        /* Color de la barra */
        border-radius: 5px;
        transition: width 0.2s ease-in-out;
        /* Suaviza el movimiento */
    }

    /* Contenido principal */
    #app {
        display: none;
        /* Oculta el contenido hasta que el preloader termine */
    }
</style>

<!-- Preloader -->
<div id="preloader">
    <h1>Querido Dinero</h1>
    <br>
    <div class="progress-bar">
        <div class="progress"></div>
    </div>
    <br><br>
    <p>Por favor, espera un momento...</p>
</div>

<script>
    // Simula la barra de progreso
            const progressBar = document.querySelector('.progress');
            let progress = 0;

            const interval = setInterval(() => {
                progress += 10; // Incrementa el progreso
                progressBar.style.width = progress + '%'; // Actualiza la barra
                if (progress >= 100) {
                    clearInterval(interval); // Detiene la simulación al llegar al 100%
                }
            }, 300); // Actualiza cada 300ms

            // Espera a que la página esté completamente cargada
            window.addEventListener('load', () => {
                // Oculta el preloader después de que la página se carga
                document.getElementById('preloader').style.display = 'none';
                // Muestra el contenido principal
                document.getElementById('app').style.display = 'block';
            });
</script>
