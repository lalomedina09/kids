<div class="input-group no-gap d-md-none flex-column">
    <input type="email" name="emailMovil" class="form-control subscribe-input mb-2"
        style="width: 100%; border-radius: 1px;" placeholder="Correo electrónico" style="width:auto;">
    <button class="btn btn-dark btn-susbcribe btn-susc-margin mb-2 btn-border-r-1 ml-1" id="suscribe-movil">
        Suscríbete
    </button>
    <div class="form-check mt-2 mb-3">
        <input type="checkbox" class="form-check-input" id="acceptTermsvMovil" style="margin-top: -.1rem; ">
        <label class="form-check-label text-dark font-akshar" for="acceptTermsvMovil">
            Al suscribirte estás aceptando nuestros
            <a href="{{ url('terminos-y-condiciones') }}" target="_blank">Términos y Condiciones</a>
        </label>
    </div>
</div>
<!-- spell-checker: disable -->
<script>
    alertify.defaults.transition = "zoom";
    alertify.defaults.theme.ok = "ui positive button";
    alertify.defaults.theme.cancel = "ui black button";

    document.getElementById('suscribe-movil').addEventListener('click', function(event) {
        event.preventDefault();

        let email = document.querySelector('input[name="emailMovil"]').value;
        let acceptTerms = document.getElementById('acceptTermsvMovil').checked;

        if (!acceptTerms) {
            alertify.error('Debes aceptar los Términos y Condiciones.');
            return;
        }

        fetch('{{ route('newsletter.v2.store') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    email: email,
                    acceptTerms: acceptTerms
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.message) {
                    alertify.success(data.message);
                    document.querySelector('input[name="emailMovil"]').value = '';
                } else {
                    alertify.error('Hubo un error al suscribirte. Inténtalo de nuevo.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alertify.error('Hubo un error al suscribirte. Inténtalo de nuevo.');
            });
    });
</script>
<!-- spell-checker: enable -->
