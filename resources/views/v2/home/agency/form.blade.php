<style>
    .form-label {
        font-weight: bold;
        color: #333;
        font-size: 20px;
        font-family: "Akshar", Helvetica;
    }

    .form-control {
        background-color: #dedede;
        border: none;
        border-radius: 5px;
        padding: 29px;
        font-size: 20px;
        font-family: "Akshar", Helvetica;
        height: 3rem;
    }

    .form-control::placeholder {
        color: #a9a9a9;
        opacity: 1;
    }

    .btn-custom {
        background-color: #000;
        color: #fff;
        width: 167px;
        padding: 14px 20px;
        border: none;
        border-radius: 0px;
        font-family: "Akshar", Helvetica;
        font-size: 20px;
    }

    .btn-custom:hover {
        background-color: #c54a1d;
        border: 1px solid #c54a1d;
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

    .captcha-izquierda {
        background-color: #dedede;
        width: 11rem;
        margin-left: -11px;
        height: 3rem;
    }

    .text-cap-derecha {
        font-family: "Akshar", Helvetica;
        font-size: 17px;
    }

    .bold-text-cap {
        font-weight: bold;
    }

    .captcha-section {
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

<form action="{{ route('contact.save') }}" method="POST">
    @csrf

    <!-- Sección: Cuéntanos más de ti -->
    <div class="mb-3">
        <label class="form-label mb-4">Cuéntanos más de ti</label>
        <div class="row">
            @if(Auth::check())
            <div class="col-md-4">
                <input type="text" class="form-control ml-2 mr-2 mb-2" name="nombre" placeholder="Nombre*"
                    value="{{ Auth::user()->name }}" required>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control mb-2" name="apellidos" placeholder="Apellido*"
                    value="{{ Auth::user()->last_name }}" required>
            </div>
            @else
            <div class="col-md-4">
                <input type="text" class="form-control mr-2 mb-2" name="nombre" placeholder="Nombre*" required>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control mb-2" name="apellidos" placeholder="Apellido*" required>
            </div>
            @endif
            <div class="col-md-4">
                <input type="text" class="form-control mb-2" name="job_position" placeholder="Puesto laboral" required>
            </div>
        </div>
    </div>

    <!-- Sección: ¿Cómo podemos comunicarnos contigo? -->
    <div class="mb-3">
        <label class="form-label mb-4">¿Cómo podemos comunicarnos contigo?</label>
        <div class="row">
            <div class="col-md-6">
                <input type="tel" class="form-control mb-2" name="telefono" placeholder="Número de celular*" required>
            </div>
            <div class="col-md-6">
                @if(Auth::check())
                <input type="email" class="form-control mb-2" name="email" placeholder="Email empresarial*" required
                    value="{{ Auth::user()->email }}">
                @else
                <input type="email" class="form-control mb-2" name="email" placeholder="Email empresarial*" required>
                @endif
            </div>
        </div>
    </div>

    <!-- Sección: Cuéntanos más sobre tu empresa -->
    <div class="mb-3">
        <label class="form-label mb-4">Cuéntanos más sobre tu empresa</label>
        <div class="row">
            <div class="col-md-6">
                <input type="text" class="form-control mb-2" name="company" placeholder="Nombre de empresa*" required>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control mb-2" name="address"
                    placeholder="¿Dónde se encuentra tu empresa?" required>
            </div>
            <div class="col-md-12">
                <input type="text" class="form-control mb-2" name="mensaje" placeholder="Mensaje" required>
                <input type="hidden" class="form-control mb-2" name="motivo" placeholder="motivo"
                    value="Agencia Creativa" required>
            </div>
        </div>
    </div>

    <!-- Sección del reCAPTCHA y Condiciones -->
    <div class="captcha-section mb-3">
        <div class="row align-items-center">
            <!-- reCAPTCHA -->
            <div class="col-md-4 d-flex justify-content-start">
                <div class="form-group">
                    <div class="g-recaptcha" data-theme="dark"
                        data-sitekey="{{ config('money.recaptcha.key') }}"></div>
                    @if ($errors->has('g-recaptcha-response'))
                    <span class="small text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                    @endif
                </div>
            </div>

            <!-- Términos centrados -->
            <div class="col-md-4 d-flex justify-content-center text-center">
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="acceptTerms" required>
                    <label class="form-check-label font-akshar" for="acceptTerms">
                        Al hacer clic en el botón “Enviar” aceptarás nuestros<br>
                        <a href="{{ url('terminos-y-condiciones') }}" target="_blank"
                            class="text-dark fw-bold font-akshar">
                            <span class="bold-text-cap">Términos, Condiciones y Política de Privacidad</span>
                        </a>
                    </label>
                </div>
            </div>

            <!-- Botón a la derecha -->
            <div class="col-md-4 d-flex justify-content-end">
                <button type="submit" class="btn btn-custom" id="submitBtn">Enviar</button>
            </div>
        </div>
    </div>
</form>

<script>
    document.getElementById('acceptTerms').addEventListener('change', function () {
        document.getElementById('submitBtn').disabled = !this.checked;
    });
</script>
