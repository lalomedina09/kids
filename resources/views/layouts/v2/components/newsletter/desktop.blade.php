<div class="input-group no-gap d-none d-md-flex">
    <input type="email" name="emailDesktop" class="form-control subscribe-input" placeholder="Correo electrónico" style="width:auto;">
    <button class="btn btn-dark btn-susbcribe btn-border-r-1" id="suscribe-desktop">
        Suscríbete
    </button>
    <div class="form-check mt-2">
        <input type="checkbox" class="form-check-input" id="acceptTermsvDesktop" style="margin-top: -.1rem;">
        <label class="form-check-label text-dark font-akshar" for="acceptTermsvDesktop">
            Al suscribirte estás aceptando nuestros
            <a href="{{ url('terminos-y-condiciones')}}" target="_blank" class="text-dark fw-bold">
                Términos y Condiciones
            </a>
        </label>
    </div>
</div>
<script>
    alertify.defaults.transition = "zoom";
    alertify.defaults.theme.ok = "ui positive button";
    alertify.defaults.theme.cancel = "ui black button";

    document.getElementById('suscribe-desktop').addEventListener('click', function(event) {
        event.preventDefault();

        let email = document.querySelector('input[name="emailDesktop"]').value;
        let acceptTerms = document.getElementById('acceptTermsvDesktop').checked;

        if (!acceptTerms) {
            alertify.error('Debes aceptar los Términos y Condiciones.');
            return;
        }

        fetch('{{ route("newsletter.v2.store") }}', {
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
                document.querySelector('input[name="emailDesktop"]').value = '';
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
