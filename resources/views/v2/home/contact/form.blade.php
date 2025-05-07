@if (session('success'))
    <div id="success-message" class="alert alert-success">
        {{ session('success') }}
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('success-message').style.display = 'none';
        }, 10000); // 10 seconds
    </script>
@endif

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

    #submitBtn {
        background-color: #000;
        color: #fff;
        font-family: "Akshar", Helvetica;
        border: 1px solid #000;
        border-radius: 0px;
        padding: 10px 20px;
        width: 100%;
    }

    #submitBtn:hover {
        background-color: #C5481C;
        border: 1px solid #C5481C;
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
    }

    .bold-text-cap {
        font-weight: bold;
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

<form action="{{ route('contact.save') }}" method="POST" class="mt-4">
    @csrf
    <div class="form-group mb-3">
        <input type="text" name="nombre" class="form-control" placeholder="Nombre*" required>
    </div>
    <div class="form-group mb-3">
        <input type="text" name="apellidos" class="form-control" placeholder="Apellidos*" required>
    </div>
    <div class="form-group mb-3">
        <input type="tel" name="telefono" class="form-control" placeholder="Teléfono*" required>
    </div>
    <div class="form-group mb-3">
        <input type="email" name="email" class="form-control" placeholder="Email*" required>
    </div>
    <div class="form-group mb-3">
        <select name="motivo" class="form-control" required>
            <option value="" selected>Motivo de contacto*</option>
            <option value="consulta">Consulta</option>
            <option value="soporte">Soporte</option>
            <option value="otro">Otro</option>
        </select>
    </div>
    <div class="form-group mb-3">
        <textarea name="mensaje" class="form-control" placeholder="Mensaje*" rows="4" required></textarea>
    </div>
    <div class="text-center">
        <div class="form-group mx-auto">
            <div class="g-recaptcha" data-theme="dark" data-sitekey="{{ config('money.recaptcha.key') }}"></div>

            @if ($errors->has('g-recaptcha-response'))
            <span class="small text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
            @endif
        </div>
    </div>
    <div class="form-check mb-3">
        <input type="checkbox" class="form-check-input" id="acceptTerms" required>
        <label class="form-check-label font-akshar" for="acceptTerms">
            Al hacer clic en el botón “Enviar” aceptarás nuestros
            <a href="{{ url('terminos-y-condiciones') }}" target="_blank" class="text-dark fw-bold font-akshar">
                <span class="bold-text-cap">Términos, Condiciones y Política de Privacidad</span>
            </a>
        </label>
    </div>
    <div class="form-group mb-3">
        <button type="submit" class="btn font-akshar" id="submitBtn">Enviar</button>
    </div>
</form>

<script>
    document.getElementById('acceptTerms').addEventListener('change', function() {
        document.getElementById('submitBtn').disabled = !this.checked;
    });
</script>
