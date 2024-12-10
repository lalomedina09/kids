<style>
    /* Estilos generales (Se mantienen iguales para otros tamaños de pantalla) */
    body {
        background-color: #f8f9fa;
    }

    .form-label {
        font-weight: bold;
    }

    .form-control {
        background-color: #dedede;
        border: none;
    }

    .captcha-section {
        background-color: #eeeeee;
        padding: 15px;
        border-radius: 10px;
    }

    .text-and-image {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .text-and-image img {
        max-width: 100px;
        height: auto;
        margin-left: 15px;
    }
</style>


<div class="container my-5">
    <h2 class="text-formulario mb-4">Agenda una llamada informativa con nosotros</h2>

    <form>
        <!-- Sección: Cuéntanos más de ti -->
        <div class="mb-3">
            <label class="form-label mb-4">Cuéntanos más de ti</label>
            <div class="row">
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="Nombre*" required>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="Apellido*" required>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="Puesto laboral">
                </div>
            </div>
        </div>

        <!-- Sección: ¿Cómo podemos comunicarnos contigo? -->
        <div class="mb-3">
            <label class="form-label mb-4">¿Cómo podemos comunicarnos contigo?</label>
            <div class="row">
                <div class="col-md-6">
                    <input type="tel" class="form-control" placeholder="Número de celular*" required>
                </div>
                <div class="col-md-6">
                    <input type="email" class="form-control" placeholder="Email empresarial*" required>
                </div>
            </div>
        </div>

        <!-- Sección: Cuéntanos más sobre tu empresa -->
        <div class="mb-3">
            <label class="form-label mb-4">Cuéntanos más sobre tu empresa</label>
            <div class="row">
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Nombre de empresa*" required>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="¿Dónde se encuentra tu empresa?">
                </div>
            </div>
        </div>

        <!-- Sección del reCAPTCHA y Condiciones -->
        <div class="captcha-section mb-3">
            <div class="row">
                <!-- Captcha a la izquierda -->
                <div class="col-md-6">
                    <div class="form-check captcha-izquierda">
                        <input type="checkbox" class="form-check-input" id="recaptcha">
                        <label class="form-check-label" for="recaptcha">I'm not a robot</label>
                        <img class="imagen-cap" src="{{ asset("version-2/images/consulting/imgcaptcha/captcha.png") }}" alt="Captcha" />
                    </div>
                </div>
                <!-- Texto e imagen a la derecha -->
                <div class="col-md-6 text-and-image">
                    <p class="text-cap-derecha">Al hacer clic en el botón “Enviar” aceptarás nuestros <br><span
                            class="bold-text-cap">Términos, Condiciones y Política de Privacidad</span></p>
                </div>
            </div>
        </div>

        <!-- Botón de Enviar -->
        <div class="text-end">
            <button type="submit" class="btn btn-custom btn-top">Enviar</button>
        </div>
    </form>
</div>
