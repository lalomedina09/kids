<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suscripción a Cursos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://js.stripe.com/v3/"></script>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Elige tu membresía</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('subscribe') }}" method="POST" id="payment-form">
            @csrf
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="card">
                        <div class="card-body">
                            <h3>Mensual</h3>
                            <p>$10 / mes</p>
                            <input type="radio" name="plan" value="monthly" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="card">
                        <div class="card-body">
                            <h3>Semestral</h3>
                            <p>$50 / 6 meses</p>
                            <input type="radio" name="plan" value="semiannual" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="card">
                        <div class="card-body">
                            <h3>Anual</h3>
                            <p>$90 / año</p>
                            <input type="radio" name="plan" value="annual" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <label>Datos de la tarjeta</label>
                <div id="card-element" class="form-control"></div>
                <div id="card-errors" class="text-danger"></div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Suscribirme</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const stripe = Stripe('{{ config('services.stripe.key') }}');
            const elements = stripe.elements();
            const card = elements.create('card');
            card.mount('#card-element');

            card.on('change', function(event) {
                const displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });

            const form = document.getElementById('payment-form');
            form.addEventListener('submit', async (event) => {
                event.preventDefault();

                const { paymentMethod, error } = await stripe.createPaymentMethod({
                    type: 'card',
                    card: card,
                });

                if (error) {
                    document.getElementById('card-errors').textContent = error.message;
                } else {
                    const hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'payment_method');
                    hiddenInput.setAttribute('value', paymentMethod.id);
                    form.appendChild(hiddenInput);
                    form.submit();
                }
            });
        });
    </script>
</body>

</html>
