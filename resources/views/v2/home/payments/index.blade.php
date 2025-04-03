@extends('layouts.app-v2-redesign')

<title>Pagos | Querido Dinero</title>

@section('content')
<div class="container mt-5">
    <!-- Error Messages -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Success Message -->
    @if (session('success'))
    <div class="alert alert-success font-akshar">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('qdplay.payments.payformStore') }}" method="POST" id="payment-form">
        @csrf
        <input type="hidden" name="plan_price" value="{{ $concept->id_price_stripe }}">
        <input type="hidden" name="conceptCode" value="{{ $concept->code }}">
        <!-- Payment Section -->
        <div class="row justify-content-center equal-height-cards">
            <div class="col-md-6">
                <div class="card shadow-sm p-4">
                    <h2 class="mb-3 font-akshar title-card">Resumen de compra</h2>
                    <h2 class="font-akshar label-card">
                        Membresía: <strong>Querido Dinero Play</strong>
                    </h2>
                    <p class="font-akshar text-muted">
                        Suscripción que incluye acceso a cursos online hechos por expertos financieros y certificados
                        por curso completado.
                    </p>
                    <!-- Coupon Section -->
                    <div class="mt-3">
                        <label for="coupon-code" class="font-akshar label-card mb-2">Código de descuento</label>
                        <div class="input-group">
                            <input type="text" class="form-control font-akshar" id="coupon-code" name="coupon"
                                placeholder="Ingresa tu código">
                            <button type="button" class="btn btn-dark font-akshar" id="apply-coupon">Aplicar</button>
                        </div>
                        <div id="coupon-message" class="font-akshar mt-2"></div>
                    </div>
                    <hr>
                    <ul class="font-akshar mt-3">
                        <li class="mb-2">* IVA Incluido en el total.</li>
                        <li class="mb-2">* No se aplican comisiones extra.</li>
                        <li class="mb-2">* Los montos pagados no son reembolsables.</li>
                        <li class="mb-2">* Si es un regalo, una membresía no es autorenovable.</li>
                        <li class="mb-2">* Al hacer clic en “Suscribirme” acepta nuestro Contrato de Prestación de
                            Servicios.</li>
                    </ul>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow-sm p-4 w-100">
                    <h2 class="mb-3 font-akshar title-card">Ingresa tus datos de pago</h2>
                    <!-- Virtual Card -->
                    <div class="virtual-card mb-4">
                        <div class="card-inner">
                            <div class="card-chip"></div>
                            <div class="card-number font-akshar">
                                Número: <span id="card-number-display">**** **** **** ****</span>
                            </div>
                            <div class="card-expiry mt-2 font-akshar">
                                Expira: <span id="card-expiry">MM/AA</span>
                            </div>
                            <div class="card-holder mt-2 font-akshar">
                                Titular: <span id="card-holder-name">{{ Auth::user()->name }} {{ Auth::user()->last_name
                                    }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- Stripe Card Field -->
                    <label for="card-element" class="form-label font-akshar">
                        <h2 class="label-card">Datos de la tarjeta</h2>
                    </label>
                    <div id="card-element" class="form-control"></div>
                    <div id="card-errors" class="text-danger mt-2"></div>
                    <h2 class="font-akshar label-card mt-3">
                        Total: <strong id="total-amount">${{ $concept->price }} MXN</strong>
                    </h2>
                    <p class="my-4 font-akshar">
                        *Los cargos se realizarán de forma recurrente. <br>
                        *Cancela cuando quieras
                    </p>
                    <button type="submit" class="btn btn-dark font-akshar mt-4 w-100">Suscribirme</button>
                </div>
            </div>
        </div>

        <style>
            .equal-height-cards .card {
                height: 100%;
            }

            .equal-height-cards .col-md-6 {
                display: flex;
            }

            .text-muted {
                font-size: 0.9rem;
                color: #6c757d;
            }
        </style>
    </form>
</div>
@endsection

@section('scripts')

<script src="https://js.stripe.com/v3/"></script>
<style>
    .hover-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .hover-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
    }

    .virtual-card {
        background: linear-gradient(135deg, #5c6366, #1c1f2d);
        border-radius: 10px;
        padding: 20px;
        color: white;
        height: 150px;
        position: relative;
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .virtual-card.active {
        transform: scale(1.05);
    }

    .card-inner {
        position: relative;
        z-index: 1;
    }

    .card-chip {
        width: 40px;
        height: 30px;
        background: #d4af37;
        border-radius: 5px;
        position: absolute;
        top: 10px;
        left: 10px;
        box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.3);
    }

    .card-number {
        font-size: 1.2rem;
        margin-top: 50px;
        margin-bottom: 10px;
    }

    .card-expiry,
    .card-holder {
        font-size: 1rem;
        margin-bottom: 5px;
    }

    .title-card {
        font-size: 1.2rem;
        font-weight: bold;
        text-align: center;
    }

    .label-card {
        font-size: 1.2rem;
        margin-bottom: revert;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const stripe = Stripe('{{ config('services.stripe.public_key') }}');
    const elements = stripe.elements();
    const card = elements.create('card', {
        style: {
            base: {
                fontSize: '16px',
                color: '#32325d',
                '::placeholder': {
                    color: '#aab7c4',
                },
            },
            invalid: {
                color: '#dc3545',
            },
        },
    });
    card.mount('#card-element');

    const virtualCard = document.querySelector('.virtual-card');
    const cardNumberDisplay = document.getElementById('card-number-display');
    const cardExpiry = document.getElementById('card-expiry');
    const cardHolderName = document.getElementById('card-holder-name');
    const totalAmount = document.getElementById('total-amount');
    const couponCodeInput = document.getElementById('coupon-code');
    const applyCouponButton = document.getElementById('apply-coupon');
    const couponMessage = document.getElementById('coupon-message');

    // Debug and update virtual card
    card.on('change', function (event) {
        console.log('Card change event:', event); // Full event log
        const displayError = document.getElementById('card-errors');

        if (event.error) {
            displayError.textContent = event.error.message;
            virtualCard.classList.remove('active');
        } else {
            displayError.textContent = '';
            virtualCard.classList.add('active');

            // Update expiration date
            console.log('expMonth:', event.expMonth, 'expYear:', event.expYear); // Debug specific fields
            if (event.expMonth && event.expYear) {
                const expiry = `${event.expMonth.toString().padStart(2, '0')}/${event.expYear.toString().slice(-2)}`;
                console.log('Updating expiry to:', expiry); // Confirm update
                cardExpiry.textContent = expiry;
            } else {
                cardExpiry.textContent = 'MM/AA';
            }

            // Card number placeholder
            if (event.complete) {
                cardNumberDisplay.textContent = '**** **** **** ****'; // Placeholder until submission
            } else {
                cardNumberDisplay.textContent = '**** **** **** ****';
            }
        }
    });

    // Handle coupon application
    applyCouponButton.addEventListener('click', async function () {
        const coupon = couponCodeInput.value.trim();
        if (!coupon) {
            couponMessage.textContent = 'Por favor, ingresa un código válido.';
            couponMessage.style.color = '#dc3545';
            return;
        }

        try {
            const response = await fetch("{{ route('validate-coupon') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({ coupon: coupon }),
            });

            if (!response.ok) {
                throw new Error('Network response was not ok');
            }

            const result = await response.json();
            if (result.valid) {
                const discount = result.discount || 0;
                const originalPrice = {{ $concept->price }};
                const newPrice = discount > 0 ? (originalPrice - (originalPrice * discount / 100)) : originalPrice;
                totalAmount.textContent = `$${newPrice.toFixed(2)} MXN`;
                couponMessage.textContent = '¡Cupón aplicado con éxito!';
                couponMessage.style.color = '#28a745';
            } else {
                couponMessage.textContent = 'Código inválido o expirado.';
                couponMessage.style.color = '#dc3545';
            }
        } catch (error) {
            console.error('Error validating coupon:', error);
            couponMessage.textContent = 'Error al validar el cupón.';
            couponMessage.style.color = '#dc3545';
        }
    });

    // Form submission
    const form = document.getElementById('payment-form');
    form.addEventListener('submit', async (event) => {
        event.preventDefault();

        const { paymentMethod, error } = await stripe.createPaymentMethod({
            type: 'card',
            card: card,
        });

        if (error) {
            document.getElementById('card-errors').textContent = error.message;
            virtualCard.classList.remove('active');
        } else {
            console.log('PaymentMethod created:', paymentMethod);
            cardNumberDisplay.textContent = `**** **** **** ${paymentMethod.card.last4}`;
            cardExpiry.textContent = `${paymentMethod.card.exp_month.toString().padStart(2, '0')}/${paymentMethod.card.exp_year.toString().slice(-2)}`;

            const hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'payment_method');
            hiddenInput.setAttribute('value', paymentMethod.id);
            form.appendChild(hiddenInput);

            if (couponCodeInput.value) {
                const couponInput = document.createElement('input');
                couponInput.setAttribute('type', 'hidden');
                couponInput.setAttribute('name', 'coupon');
                couponInput.setAttribute('value', couponCodeInput.value);
                form.appendChild(couponInput);
            }

            form.submit();
        }
    });
});
</script>

@endsection
