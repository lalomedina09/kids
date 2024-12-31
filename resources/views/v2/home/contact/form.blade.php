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

<form action="{{ route('contact.save') }}" method="POST">
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
            <option value="" disabled selected>Motivo de contacto*</option>
            <option value="consulta">Consulta</option>
            <option value="soporte">Soporte</option>
            <option value="otro">Otro</option>
        </select>
    </div>
    <div class="form-group mb-3">
        <textarea name="mensaje" class="form-control" placeholder="Mensaje*" rows="4" required></textarea>
    </div>
    <div class="form-check mb-3">
        <input type="checkbox" class="form-check-input" id="acceptTerms" required>
        <label class="form-check-label" for="acceptTerms">
            Al hacer clic en el botón “Enviar” aceptarás nuestros
            <br>
            <a href="{{ url('terminos-y-condiciones') }}" target="_blank" class="text-dark fw-bold">
                <span class="bold-text-cap">Términos, Condiciones y Política de Privacidad</span>
            </a>
            </label>
    </div>
    <div class="text-end">
        <button type="submit" class="btn btn-enviar btn-dark" id="submitBtn" disabled>Enviar</button>
    </div>
</form>

<script>
    document.getElementById('acceptTerms').addEventListener('change', function() {
        document.getElementById('submitBtn').disabled = !this.checked;
    });
</script>
