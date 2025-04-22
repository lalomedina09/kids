<head>
    <link href="https://fonts.googleapis.com/css2?family=Besley:ital,wght@1,500&display=swap" rel="stylesheet">
</head>

<div class="container mt-5">
    <div class="row mx-0">

        <!-- Ajuste de margen horizontal para mayor responsividad -->
        <div class="col-12 col-md-12 d-flex flex-column mb-5">
            <!-- Párrafo para pantallas grandes (oculto en móviles) -->
            <p class="parrafo-banner d-none d-md-block">
                Si quieres que colaboremos juntos, si tienes alguna duda, comentario o sugerencia,<br>
                <span class="negrita-parrafo-banner">¡contáctanos y tendrás noticias nuestras muy pronto!</span>
            </p>


            <!-- Párrafo solo para móviles (oculto en pantallas grandes) -->
            <p class="parrafo-movil d-block d-md-none">
                Si quieres que colaboremos juntos, si tienes alguna duda, comentario o sugerencia <br>
                <span class="negrita-parrafo-movil">¡Contáctanos!</span>
            </p>
        </div>


        <div class="col-md-6">
            <div class="img-banner-contacto">
                <img class="imagen-mobil img-ilus-contact mb-5" src="{{ asset('version-2/images/contacto/banner.png')}}" alt="imagen-contacto">
            </div>
        </div>

        <div class="img-nube">
            <img class="nube-flotante" src="{{ asset('version-2/images/contacto/nube.png')}}" alt="imagen-nube" >
            <span id="mensaje" class="texto-animado"></span>
            <span id="puntos" class="puntos-animados"></span>
        </div>

        <div class="col-md-6">
            @include('v2.home.contact.form')
        </div>
    </div>
</div>


<style>

/* Animación de flotación */
/* .imagen-mobil img-ilus-contact {
    animation: flotar 3s ease-in-out infinite;
    position: relative;
    margin-bottom: -8rem;
} */


.negrita-parrafo-movil {
    font-weight: bold;
}
.parrafo-movil {
    font-family: "Akshar", Helvetica;
    font-size: 1.9rem;
    margin-top: 5rem;
    text-align: center;
    line-height: 3.1rem;
    margin-bottom: 4rem;

}

.nube-flotante {
    animation: flotar 3s ease-in-out infinite;
    margin-bottom: -8rem;
    /* margin-left: -13rem; */
    margin-top: -1rem;
    width: 14rem;
    height: 13rem;
    /* position: absolute; */
}

/* Estilos de los puntos */
.puntos-animados {
    font-size: 4.5rem;
    color: #333;
    text-align: center;
    margin-left: 1.5rem;
    font-family: 'Besley', serif;
    font-style: italic;
    position: relative;

}

/* Estilos del mensaje */
.texto-animado {
    font-size: 1.5rem;
    color: #333;
    text-align: center;
    margin-left: -9rem;
    font-family: 'Besley', serif;
    font-style: italic;
    position: relative;
}

/* Flotación de la nube */
@keyframes flotar {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-10px);
    }
}

</style>

<script>

    document.addEventListener("DOMContentLoaded", () => {
    const puntos = document.getElementById("puntos");
    const mensaje = document.getElementById("mensaje");

    // Array de mensajes en diferentes idiomas
    const mensajes = ["Hola", "Hi", "Hello", "Bonjour",];
    let indexMensaje = 0;
    let estado = "puntos"; // Alternar entre "puntos" y "mensaje"
    let puntosActuales = 0;

    function alternarAnimacion() {
        if (estado === "puntos") {
            // Ciclar entre ningún punto, uno, dos y tres puntos
            puntosActuales = (puntosActuales + 1) % 4; // 0, 1, 2, 3
            puntos.textContent = ".".repeat(puntosActuales);
            mensaje.textContent = ""; // Ocultar mensaje

            // Cambiar al saludo cuando los puntos llegan al máximo
            if (puntosActuales === 3) {
                estado = "mensaje";
            }
        } else if (estado === "mensaje") {
            puntos.textContent = ""; // Ocultar puntos
            mensaje.textContent = mensajes[indexMensaje]; // Mostrar saludo
            indexMensaje = (indexMensaje + 1) % mensajes.length; // Pasar al siguiente mensaje

            // Regresar a mostrar puntos después de un saludo
            estado = "puntos";
            puntosActuales = 0; // Reiniciar puntos
        }
    }

    // Animación periódica
    setInterval(alternarAnimacion, 500); // Cambiar cada 500ms
});
</script>
