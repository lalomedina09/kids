<div class="container-fluid">
    <div class="row" style="background-color: #000000; margin-bottom:100px;">
        <div class="col-12 col-lg-6 d-flex flex-column justify-content-center div-text-about-us"
            style="background-color: #000000;">
            <div class="rectangle"></div>
            <div class="text-wrapper-4 title-about-us text-lg-left text-sm-center text-center"
                style="margin-top: 83px;">Sobre nosotros</div>
            <p class="p mt-4 mb-3 text-lg-left text-sm-center text-center" style="margin-top: 50px !important;">
                Somos un equipo internacional que comparte la pasión por la educación financiera. Ideamos constantemente
                nuevas formas de llevar las finanzas personales a todas partes.
                <br><br>
            </p>

            <div class="d-flex mt-4 py-0 px-0 div-btn-about-us justify-content-center justify-content-lg-start"
                style="margin-bottom;">
                <a href="#" title="" class="btn bg-white btn-link-about-us">Conoce más</a>
            </div>
            <br><br>
        </div>
        <div class="col-12 col-lg-6 position-relative p-0">
            <div class="overlap-group position-absolute w-100 h-100">
                <div class="circle"></div>
                <div class="circle-2"></div>
                <div class="circle-3"></div>
            </div>
            <img class="image w-100 h-auto" src="{{ asset('version-2/images/imgnosotros/equipo-qd.png') }}" alt="Equipo QD" />
        </div>
    </div>
</div>

<script>
    // Function to swap positions and colors between circles
        function swapPositionsAndColors() {
            const circle1 = document.querySelector('.circle');
            const circle2 = document.querySelector('.circle-2');
            const circle3 = document.querySelector('.circle-3');

            // Guardar los colores actuales
            const color1 = window.getComputedStyle(circle1).backgroundColor;
            const color2 = window.getComputedStyle(circle2).backgroundColor;
            const color3 = window.getComputedStyle(circle3).backgroundColor;

            // Intercambiar posiciones en forma circular
            const pos1 = { top: circle1.style.top, left: circle1.style.left };
            const pos2 = { top: circle2.style.top, left: circle2.style.left };
            const pos3 = { top: circle3.style.top, left: circle3.style.left };

            circle1.style.top = pos2.top;
            circle1.style.left = pos2.left;
            circle2.style.top = pos3.top;
            circle2.style.left = pos3.left;
            circle3.style.top = pos1.top;
            circle3.style.left = pos1.left;

            // Cambiar colores en forma circular
            circle1.style.backgroundColor = color2;
            circle2.style.backgroundColor = color3;
            circle3.style.backgroundColor = color1;
        }

        // Función para agregar un ligero efecto de movimiento (opcional)
        function addMovementFront() {
            const circles = document.querySelectorAll('.circle, .circle-2, .circle-3');
            circles.forEach(circle => {
                // Generar un movimiento aleatorio más estilizado
                const randomX = Math.random() * 10 - 5; // Movimiento aleatorio en X
                const randomY = Math.random() * 10 - 5; // Movimiento aleatorio en Y
                circle.style.transition = 'transform 0.5s ease-in-out'; // Suavizar la transición
                circle.style.transform = `translate(${randomX}px, ${randomY}px)`;

                // Restablecer la posición a su lugar original
                setTimeout(() => {
                    circle.style.transform = 'translate(0, 0)';
                }, 100); // Restablecer después de 100 ms
            });
        }

        // Cambiar posiciones y colores cada 3 segundos
        setInterval(() => {
            swapPositionsAndColors();
            addMovementFront();
        }, 3000);
</script>
