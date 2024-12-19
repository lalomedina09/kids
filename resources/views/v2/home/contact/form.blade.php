<form>
    <div class="form-group mb-3">
        <input type="text" class="form-control" placeholder="Nombre*" required>
    </div>
    <div class="form-group mb-3">
        <input type="text" class="form-control" placeholder="Apellidos*" required>
    </div>
    <div class="form-group mb-3">
        <input type="tel" class="form-control" placeholder="Teléfono*" required>
    </div>
    <div class="form-group mb-3">
        <input type="email" class="form-control" placeholder="Email*" required>
    </div>
    <div class="form-group mb-3">
        <select class="form-control" required>
            <option value="" disabled selected>Motivo de contacto*</option>
            <option value="consulta">Consulta</option>
            <option value="soporte">Soporte</option>
            <option value="otro">Otro</option>
        </select>
    </div>
    <div class="form-group mb-3">
        <textarea class="form-control" placeholder="Mensaje*" rows="4" required></textarea>
    </div>
    <div class="form-check mb-3">
        <input type="checkbox" class="form-check-input" id="acceptTerms" required>
        <label class="form-check-label" for="acceptTerms">Al hacer clic en el botón “Enviar” aceptarás nuestros
            <br><span class="bold-text-cap">Términos, Condiciones y Política de Privacidad</span></label>
    </div>
    <div class="text-end">
        <button type="submit" class="btn btn-enviar btn-dark">Enviar</button>
    </div>
</form>
