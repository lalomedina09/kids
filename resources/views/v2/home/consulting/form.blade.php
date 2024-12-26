<style>
    .form-label {
        font-weight: bold;
        color: #333;
        font-size: 20px;
        font-family: "Akshar", Helvetica;
    }

    .form-control {
        background-color: #f0f0f0;
        border: none;
        border-radius: 5px;
        padding: 29px;
        font-size: 20px;
        font-family: "Akshar", Helvetica;
    }

    .form-control::placeholder {
        color: #a9a9a9;
        opacity: 1;
    }

    .btn-custom {
        background-color: #000;
        color: #fff;
        width: 167px;
        padding: 10px 20px;
        border: none;
        border-radius: 0px;
        font-family: "Akshar", Helvetica;
    }

    .btn-custom:hover {
        background-color: #333;
    }

    .text-muted {
        font-size: 0.8rem;
        color: #666;
    }

    .form-check-label {
        font-size: 0.9rem;
        color: #666;
    }

    .form-check-input {
        width: 20px;
        margin-left: -23px;
    }

    .text-formulario {
        text-align: center;
        font-size: 36px;
        font-family: "Akshar", Helvetica;
        font-weight: 500;
        margin-top: -10rem;
    }

    .text-end {
        text-align: right;
    }

    .imagen-cap {
        margin-bottom: -17px;
        margin-left: 14px;
    }

    /* Seccion captcha */
    .captcha-izquierda {
        background-color: #dedede;
        width: 11rem;
        margin-left: -11px;
        height: 3rem;
    }

    /* Estilo del texto de condiciones */
    .text-cap-derecha {
    font-family: "Akshar", Helvetica;
    font-size: 17px;
    /*margin-left: -201px;*/
    }

    .bold-text-cap {
    font-weight: bold;
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

<br>
<br>
<br>
<div class="container my-5">
    <h2 class="text-formulario mb-4">Agenda una llamada informativa con nosotros</h2>

    <form>
        <!-- Sección: Cuéntanos más de ti -->
        <div class="mb-3">
            <label class="form-label mb-4">Cuéntanos más de ti</label>
            <div class="row">
                <div class="col-md-4">
                    <input type="text" class="form-control ml-2 mr-2 mb-2" placeholder="Nombre*" required>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control mb-2" placeholder="Apellido*" required>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control mb-2" placeholder="Puesto laboral">
                </div>
            </div>
        </div>

        <!-- Sección: ¿Cómo podemos comunicarnos contigo? -->
        <div class="mb-3">
            <label class="form-label mb-4">¿Cómo podemos comunicarnos contigo?</label>
            <div class="row">
                <div class="col-md-6">
                    <input type="tel" class="form-control mb-2" placeholder="Número de celular*" required>
                </div>
                <div class="col-md-6">
                    <input type="email" class="form-control mb-2" placeholder="Email empresarial*" required>
                </div>
            </div>
        </div>

        <!-- Sección: Cuéntanos más sobre tu empresa -->
        <div class="mb-3">
            <label class="form-label mb-4">Cuéntanos más sobre tu empresa</label>
            <div class="row">
                <div class="col-md-6">
                    <input type="text" class="form-control mb-2" placeholder="Nombre de empresa*" required>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control mb-2" placeholder="¿Dónde se encuentra tu empresa?">
                </div>
            </div>
        </div>

        <!-- Sección del reCAPTCHA y Condiciones -->
        <div class="captcha-section mb-3">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-check captcha-izquierda mb-3">
                        <input type="checkbox" class="form-check-input" id="recaptcha">
                        <label class="form-check-label" for="recaptcha">I'm not a robot</label>
                        <img class="imagen-cap" src="{{ asset("version-2/images/consulting/imgcaptcha/captcha.png") }}" alt="Captcha" />
                    </div>
                </div>
                <div class="col-md-4 text-and-image mb-3">
                    <p class="text-cap-derecha">Al hacer clic en el botón “Enviar” aceptarás nuestros <br><span
                            class="bold-text-cap">Términos, Condiciones y Política de Privacidad</span></p>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-custom">Enviar</button>
                </div>
            </div>
        </div>
    </form>
</div>
