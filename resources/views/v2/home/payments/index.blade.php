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
            <div class="col-md-12">
                <h1 class="display-4 text-center font-beley my-4">Activa tu Membresía QD Play</h1>
            </div>
            <div class="col-md-6">
                <div class="card shadow-sm p-4 w-100">
                    <h2 class="mb-3 font-akshar title-card">Ingresa tus datos de pago</h2>
                    <div class="mt-3">
                        <label for="coupon-code" class="font-akshar label-card mb-2">Código de descuento</label>
                        <div class="input-group">
                            <input type="text" class="form-control font-akshar" id="coupon-code" name="coupon"
                                placeholder="Ingresa tu código">
                            <button type="button" class="btn btn-dark font-akshar" id="apply-coupon">Aplicar</button>
                        </div>
                        <div id="coupon-spinner" class="d-none mt-2 text-center">
                            <div class="spinner-border text-dark" role="status">
                                <span class="visually-hidden"></span>
                            </div>
                            <p class="font-akshar mt-1">Espere un momento</p>
                        </div>
                    </div>

                    <label for="card-element" class="form-label font-akshar mt-4">
                        <h2 class="label-card">Datos de la tarjeta</h2>
                    </label>
                    <div id="card-element" class="form-control"></div>
                    <div id="card-errors" class="text-danger mt-2"></div>

                    <hr>
                    <ul class="font-akshar mt-3">
                        <li class="mb-2">* IVA Incluido en el total.</li>
                        <li class="mb-2">* Cancela cuando quieras.</li>
                        <li class="mb-2">* No se aplican comisiones extra.</li>
                        <li class="mb-2">* Los montos pagados no son reembolsables.</li>
                        <li class="mb-2">*Los cargos se realizarán de forma recurrente.</li>
                        <li class="mb-2">* Si es un regalo, una membresía no es autorenovable.</li>
                    </ul>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow-sm p-4">
                    <h2 class="mb-3 font-akshar title-card">Resumen de compra</h2>
                    <table class="table font-akshar">
                        <tbody>
                            <tr>
                                <td>Membresía: <span class="fw-bold">{{ $concept->name }}</span></td>
                                <td>${{ $concept->price }} MXN</td>
                            </tr>
                            <tr id="discount-row">
                                <td>Descuento aplicado</td>
                                <td id="discount-amount">-$0 MXN</td>
                            </tr>
                            <tr class="total">
                                <td>Total a pagar</td>
                                <td class="fw-bold" id="total-amount">${{ $concept->price }} MXN</td>
                            </tr>
                        </tbody>
                    </table>
                    <div id="coupon-message" class="font-akshar mt-2"></div>

                    <hr>
                    <h2 class="font-akshar label-card">Beneficios de la membresía</h2>
                    <ul class="font-akshar mt-1">
                        <li class="mb-2">✅ Acceso ilimitado al contenido QD Play.</li>
                        <li class="mb-2">✅ Insignias por categorías.</li>
                        <li class="mb-2">✅ Certificados al terminar los cursos.</li>
                        <li class="mb-2">✅ Acceso a la comunidad QD Play.</li>
                        <li class="mb-2">✅ Acceso a rutas de aprendizaje.</li>
                    </ul>
                    <hr>

                    <button type="submit" class="btn btn-dark font-akshar mt-4 w-100" id="submit-button">
                        Confirmar y suscribirme
                    </button>
                    <div id="payment-spinner" class="d-none mt-2 text-center">
                        <div class="spinner-border text-dark" role="status">
                            <span class="visually-hidden"></span>
                        </div>
                        <p class="font-akshar mt-1">Espere mientras procesamos el pago</p>
                    </div>

                    <p class="text-center secure-text">
                        🔒 Pago 100% seguro con encriptación SSL<br>
                        Al hacer clic, aceptas los <a href="{{ url('terminos-y-condiciones')}}">términos y
                            condiciones</a>.
                    </p>
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

            .secure-text {
                font-size: 0.9rem;
                color: #6c757d;
                font-family: 'Akshar', sans-serif;
                margin-top: 10px;
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

        const totalAmount = document.getElementById('total-amount');
        const discountAmount = document.getElementById('discount-amount');
        const couponCodeInput = document.getElementById('coupon-code');
        const applyCouponButton = document.getElementById('apply-coupon');
        const couponMessage = document.getElementById('coupon-message');
        const couponSpinner = document.getElementById('coupon-spinner');
        const submitButton = document.getElementById('submit-button');
        const paymentSpinner = document.getElementById('payment-spinner');

        // Original price from the concept
        const originalPrice = {{ $concept->price }};

        // Handle coupon application with spinner
        applyCouponButton.addEventListener('click', async function () {
            const coupon = couponCodeInput.value.trim();
            if (!coupon) {
                couponMessage.textContent = 'Por favor, ingresa un código válido.';
                couponMessage.style.color = '#dc3545';
                return;
            }

            // Show spinner
            couponSpinner.classList.remove('d-none');
            applyCouponButton.disabled = true;

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
                    const discount = result.discount || 0; // Discount percentage
                    const discountValue = originalPrice * (discount / 100); // Calculate discount amount
                    const newPrice = originalPrice - discountValue;

                    // Update table
                    discountAmount.textContent = `-$${discountValue.toFixed(2)} MXN`;
                    totalAmount.textContent = `$${newPrice.toFixed(2)} MXN`;

                    // Success message
                    couponMessage.textContent = '¡Cupón aplicado con éxito!';
                    couponMessage.style.color = '#28a745';
                } else {
                    // Reset table if coupon is invalid
                    discountAmount.textContent = '-$0 MXN';
                    totalAmount.textContent = `$${originalPrice.toFixed(2)} MXN`;

                    // Error message
                    couponMessage.textContent = 'Código inválido o expirado.';
                    couponMessage.style.color = '#dc3545';
                }
            } catch (error) {
                console.error('Error validating coupon:', error);
                discountAmount.textContent = '-$0 MXN';
                totalAmount.textContent = `$${originalPrice.toFixed(2)} MXN`;
                couponMessage.textContent = 'Error al validar el cupón.';
                couponMessage.style.color = '#dc3545';
            } finally {
                // Hide spinner
                couponSpinner.classList.add('d-none');
                applyCouponButton.disabled = false;
            }
        });

        // Form submission with spinner
        const form = document.getElementById('payment-form');
        form.addEventListener('submit', async (event) => {
            event.preventDefault();

            // Show payment spinner and disable button
            submitButton.classList.add('d-none');
            paymentSpinner.classList.remove('d-none');

            const { paymentMethod, error } = await stripe.createPaymentMethod({
                type: 'card',
                card: card,
            });

            if (error) {
                document.getElementById('card-errors').textContent = error.message;
                // Hide spinner and re-enable button on error
                submitButton.classList.remove('d-none');
                paymentSpinner.classList.add('d-none');
            } else {
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
