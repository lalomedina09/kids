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
        padding: 20px;
        font-size: 20px;
        font-family: "Akshar", Helvetica;
        height: 4rem;
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
        border-radius: 0;
        font-family: "Akshar", Helvetica;
    }

    .btn-custom:hover {
        background-color: #C5481C;
        border: 1px solid #C5481C;
        color: #fff
    }

    .text-formulario {
        text-align: center;
        font-size: 36px;
        font-family: "Akshar", Helvetica;
        font-weight: 500;
        margin-top: -12rem;
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

    .form-check-label {
        font-size: 0.95rem;
        color: #333;
    }

    .form-check-input {
        width: 20px;
        margin-right: 10px;
    }

    @media (max-width: 768px) {
        .text-formulario {
            font-size: 24px;
            margin-top: -6rem;
        }

        .btn-custom {
            width: 100%;
        }

        .form-check {
            text-align: center;
        }
    }
</style>

<br><br><br>
<div class="container my-5">
    <h2 class="text-formulario mb-4">Agenda una llamada informativa con nosotros</h2>

    <form action="{{ route('contact.save') }}" method="POST">
        @csrf

        <!-- Cuéntanos más de ti -->
        <div class="mb-3">
            <label class="form-label mb-4">Cuéntanos más de ti</label>
            <div class="row">
                @if(Auth::check())
                    <div class="col-md-4">
                        <input type="text" class="form-control mb-2" name="nombre" placeholder="Nombre*" value="{{ Auth::user()->name }}" required>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control mb-2" name="apellidos" placeholder="Apellido*" value="{{ Auth::user()->last_name }}" required>
                    </div>
                @else
                    <div class="col-md-4">
                        <input type="text" class="form-control mb-2" name="nombre" placeholder="Nombre*" required>
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

        <!-- ¿Cómo podemos comunicarnos contigo? -->
        <div class="mb-3">
            <label class="form-label mb-4">¿Cómo podemos comunicarnos contigo?</label>
            <div class="row">
                <div class="col-md-6">
                    <input type="tel" class="form-control mb-2" name="telefono" placeholder="Número de celular*" required>
                </div>
                <div class="col-md-6">
                    @if(Auth::check())
                        <input type="email" class="form-control mb-2" name="email" placeholder="Email empresarial*" value="{{ Auth::user()->email }}" required>
                    @else
                        <input type="email" class="form-control mb-2" name="email" placeholder="Email empresarial*" required>
                    @endif
                </div>
            </div>
        </div>

        <!-- Cuéntanos más sobre tu empresa -->
        <div class="mb-3">
            <label class="form-label mb-4">Cuéntanos más sobre tu empresa</label>
            <div class="row">
                <div class="col-md-6">
                    <input type="text" class="form-control mb-2" name="company" placeholder="Nombre de empresa*" required>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control mb-2" name="address" placeholder="¿Dónde se encuentra tu empresa?" required>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control mb-2" name="mensaje" placeholder="Mensaje" required>
                    <input type="hidden" name="motivo" value="Consultoria">
                </div>
            </div>
        </div>

        <!-- Captcha, términos y botón -->
        <div class="captcha-section mb-3">
            <div class="row align-items-center">
                <!-- reCAPTCHA -->
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="form-group mx-auto">
                        <div class="g-recaptcha" data-theme="dark" data-sitekey="{{ config('money.recaptcha.key') }}"></div>
                        @if ($errors->has('g-recaptcha-response'))
                            <span class="small text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                        @endif
                    </div>
                </div>

                <!-- Términos -->
                <div class="col-md-4 d-flex justify-content-center mb-3 mb-md-0">
                    <div class="form-check text-center">
                        <input type="checkbox" class="form-check-input" id="acceptTerms" required>
                        <label class="form-check-label font-akshar" for="acceptTerms">
                            Al hacer clic en el botón “Enviar” aceptarás nuestros
                            <br>
                            <a href="{{ url('terminos-y-condiciones') }}" target="_blank" class="text-dark fw-bold font-akshar">
                                <span class="bold-text-cap">Términos, Condiciones y Política de Privacidad</span>
                            </a>
                        </label>
                    </div>
                </div>

                <!-- Botón -->
                <div class="col-md-4 d-flex justify-content-md-end justify-content-center">
                    <button type="submit" class="btn btn-custom" id="submitBtn">Enviar</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    document.getElementById('acceptTerms').addEventListener('change', function () {
        document.getElementById('submitBtn').disabled = !this.checked;
    });
</script>
