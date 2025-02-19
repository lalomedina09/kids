
<div class="container">
    <div class="row justify-content-center" style="margin:0 !important;">
        <!-- Título y descripción -->
        <div class="col-md-12">
            <div class="text-solutions margin-title-s">Somos tu aliado estratégico</div>
            <p class="description-s mt-3 d-none d-lg-block">
                Te acompañamos de inicio a fin...y más allá. <br>
                Creamos una estrategia integral de la mano de los líderes empresariales y las metas
                corporativas.<br>
            </p>


            <div class="mobil-solutions d-block d-md-none d-lg-block">
                Creamos una estrategia integral de la mano de los líderes empresariales y las metas corporativas.
            </div>


    <!-- Contenedor principal -->
        <div class="row cuadro">
            <!-- Botones lado izquierdo -->
            <div class="col-md-6 left-buttons-c">
                <!-- Botón 1 -->
                <div class="btn-wrapper btn-wrapper-1">
                    <div class="diagonal-line diagonal-line1" id="line-1"></div>
                    <button class="btn-s btn-right btn-diagram-1" data-text-id="text-1" data-line-id="line-1"
                        onclick="toggleText(this)">
                        1<img src="{{ asset("version-2/images/consulting/bg/flechatxt.png") }}"
                            alt="flecha cuadro" class="flecha">
                    </button>
                    <div class="text-container" id="text-1">

                        <h3 class="custom-title">Setup<br>& Kickoff</h3>
                        <hr class="line-h-diagram">
                        <!--<p style="position: relative;">In hac habitasse platea dictumst. Nullam nulla eros,
                            ultricies sit amet, nonummy id, imperdiet feugiat, pede. In hac habitasse platea
                            dictumst. Sed lectus. Nullam accumsan lorem in dui.</p>-->
                    </div>
                </div>

                <!-- Botón 3 -->
                <div class="btn-wrapper btn-wrapper-3">
                    <div class="diagonal-line diagonal-line2" id="line-2"></div>
                    <button class="btn-s btn-right btn-diagram-3" data-text-id="text-2" data-line-id="line-2"
                        onclick="toggleText(this)">
                        3<img src="{{ asset("version-2/images/consulting/bg/flechatxt.png") }}"
                            alt="flecha cuadro" class="flecha">
                    </button>
                    <div class="text-container" id="text-2">
                        <h3 class="custom-title2">Diagnóstico</h3>
                        <hr class="line-h-diagram">
                        <!--<p style="position: relative;">In hac habitasse platea dictumst. Nullam nulla eros,
                            ultricies sit amet, nonummy id, imperdiet feugiat, pede. In hac habitasse platea
                            dictumst. Sed lectus. Nullam accumsan lorem in dui.</p>-->
                    </div>
                </div>

                <!-- Botón 5 -->
                <div class="btn-wrapper btn-wrapper-5">
                    <div class="diagonal-line diagonal-line3" id="line-3"></div>
                    <button class="btn-s btn-right btn-diagram-5" data-text-id="text-3" data-line-id="line-3"
                        onclick="toggleText(this)">
                        5<img src="{{ asset("version-2/images/consulting/bg/flechatxt.png") }}"
                            alt="flecha cuadro" class="flecha">
                    </button>
                    <div class="text-container" id="text-3">
                        <h3 class="custom-title3">Aprendizaje continuo</h3>
                        <!-- <hr class="line-h-diagram"> -->
                        <!--<p style="position: relative;">In hac habitasse platea dictumst. Nullam nulla eros,
                            ultricies sit amet, nonummy id, imperdiet feugiat, pede. In hac habitasse platea
                            dictumst. Sed lectus. Nullam accumsan lorem in dui.</p>-->
                    </div>
                </div>
            </div>

            <!-- Botones lado derecho -->
            <div class="col-md-6 right-buttons-c">
                <!-- Botón 2 -->
                <div class="btn-wrapper btn-wrapper-2">
                    <div class="diagonal-line diagonal-line4" id="line-4"></div>
                    <button class="btn-s btn-right btn-diagram-2" data-text-id="text-4" data-line-id="line-4"
                        onclick="toggleText(this)">
                        2<img src="{{ asset("version-2/images/consulting/bg/flechatxt.png") }}"
                            alt="flecha cuadro" class="flecha">
                    </button>
                    <div class="text-container" id="text-4">
                        <h3 class="custom-title4">Semana<br>Financiera</h3>
                        <hr class="line-h-diagram">
                        <!--<p style="position: relative;">In hac habitasse platea dictumst. Nullam nulla eros,
                            ultricies sit amet, nonummy id, imperdiet feugiat, pede. In hac habitasse platea
                            dictumst. Sed lectus. Nullam accumsan lorem in dui.</p>-->
                    </div>
                </div>

                <!-- Botón 4 -->
                <div class="btn-wrapper btn-wrapper-4">
                    <div class="diagonal-line diagonal-line5" id="line-5"></div>
                    <button class="btn-s btn-right btn-diagram-4" data-text-id="text-5" data-line-id="line-5"
                        onclick="toggleText(this)">
                        4<img src="{{ asset("version-2/images/consulting/bg/flechatxt.png") }}"
                            alt="flecha cuadro" class="flecha">
                    </button>
                    <div class="text-container" id="text-5">
                        <h3 class="custom-title5">Semana<br>Financiera</h3>
                        <hr class="line-h-diagram">
                        <!--<p style="position: relative;">In hac habitasse platea dictumst. Nullam nulla eros,
                            ultricies sit amet, nonummy id, imperdiet feugiat, pede. In hac habitasse platea
                            dictumst. Sed lectus. Nullam accumsan lorem in dui.</p>-->
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="circular-buttons d-block d-md-none">
        <button class="circular-btn btn-circular-1" onclick="alert('Setup & Kickoff')">1</button>
        <button class="circular-btn btn-circular-2" onclick="alert('Semana Financiera')">2</button>
        <button class="circular-btn btn-circular-3" onclick="alert('Diagnóstico')">3</button>
        <button class="circular-btn btn-circular-4" onclick="alert('Semana Financiera')">4</button>
        <button class="circular-btn btn-circular-5" onclick="alert('Aprendizaje continuo')">5</button>
    </div>


<!-- Floating divs for displaying text -->
<div id="floating-div-1" class="floating-div">
    <div class="floating-content">
        <button class="close-btn" onclick="closeFloatingDiv('floating-div-1')">&times;</button>
        <h3 class="font-akshar">Setup & Kickoff</h3>
        <!---<p>In hac habitasse platea dictumst. Nullam nulla eros, ultricies sit amet, nonummy id, imperdiet feugiat, pede. In hac habitasse platea dictumst. Sed lectus. Nullam accumsan lorem in dui.</p>---->
    </div>
</div>
<div id="floating-div-2" class="floating-div">
    <div class="floating-content">
        <button class="close-btn" onclick="closeFloatingDiv('floating-div-2')">&times;</button>
        <h3 class="font-akshar">Semana Financiera</h3>
        <!---<p>In hac habitasse platea dictumst. Nullam nulla eros, ultricies sit amet, nonummy id, imperdiet feugiat, pede. In hac habitasse platea dictumst. Sed lectus. Nullam accumsan lorem in dui.</p>---->
    </div>
</div>
<div id="floating-div-3" class="floating-div">
    <div class="floating-content">
        <button class="close-btn" onclick="closeFloatingDiv('floating-div-3')">&times;</button>
        <h3 class="font-akshar">Diagnóstico</h3>
        <!---<p>In hac habitasse platea dictumst. Nullam nulla eros, ultricies sit amet, nonummy id, imperdiet feugiat, pede. In hac habitasse platea dictumst. Sed lectus. Nullam accumsan lorem in dui.</p>---->
    </div>
</div>
<div id="floating-div-4" class="floating-div">
    <div class="floating-content">
        <button class="close-btn" onclick="closeFloatingDiv('floating-div-4')">&times;</button>
        <h3 class="font-akshar">Semana Financiera</h3>
        <!---<p>In hac habitasse platea dictumst. Nullam nulla eros, ultricies sit amet, nonummy id, imperdiet feugiat, pede. In hac habitasse platea dictumst. Sed lectus. Nullam accumsan lorem in dui.</p>---->
    </div>
</div>
<div id="floating-div-5" class="floating-div">
    <div class="floating-content">
        <button class="close-btn" onclick="closeFloatingDiv('floating-div-5')">&times;</button>
        <h3 class="font-akshar">Aprendizaje continuo</h3>
        <!---<p>In hac habitasse platea dictumst. Nullam nulla eros, ultricies sit amet, nonummy id, imperdiet feugiat, pede. In hac habitasse platea dictumst. Sed lectus. Nullam accumsan lorem in dui.</p>---->
    </div>
</div>

<style>

    @media (min-width: 482px) and (max-width: 915px) {
        .hide-in-mediaquery {
            display: none !important;
        }
    }

    .floating-div {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: black;
        color: white;
        padding: 20px;
        border-radius: 10px;
        z-index: 1000;
    }
    .floating-content {
        position: relative;
    }
    .close-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        background: none;
        border: none;
        color: white;
        font-size: 20px;
        cursor: pointer;
    }
</style>

<script>
    function showFloatingDiv(divId) {
        document.getElementById(divId).style.display = 'block';
    }

    function closeFloatingDiv(divId) {
        document.getElementById(divId).style.display = 'none';
    }

    document.querySelector('.btn-circular-1').onclick = function() {
        showFloatingDiv('floating-div-1');
    };
    document.querySelector('.btn-circular-2').onclick = function() {
        showFloatingDiv('floating-div-2');
    };
    document.querySelector('.btn-circular-3').onclick = function() {
        showFloatingDiv('floating-div-3');
    };
    document.querySelector('.btn-circular-4').onclick = function() {
        showFloatingDiv('floating-div-4');
    };
    document.querySelector('.btn-circular-5').onclick = function() {
        showFloatingDiv('floating-div-5');
    };
</script>
</div>




<script>
function toggleText(button) {
    // Obtener los IDs del texto y de la línea diagonal asociados al botón
    const textId = button.getAttribute("data-text-id");
    const lineId = button.getAttribute("data-line-id");

    // Seleccionar los elementos correspondientes
    const textContainer = document.getElementById(textId);
    const diagonalLine = document.getElementById(lineId);

    // Alternar visibilidad del texto y de la línea diagonal
    if (textContainer.style.display === "none" || textContainer.style.display === "") {
        textContainer.style.display = "block"; // Mostrar texto
        diagonalLine.style.display = "block"; // Mostrar línea diagonal
    } else {
        textContainer.style.display = "none"; // Ocultar texto
        diagonalLine.style.display = "none"; // Ocultar línea diagonal
    }
}
</script>
