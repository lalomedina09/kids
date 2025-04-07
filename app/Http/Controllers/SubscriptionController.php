<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Subscription as StripeSubscription;
use Stripe\Customer;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        Stripe::setApiKey(config('services.stripe.secret'));
    }

    public function showSubscriptionForm()
    {
        return view('subscriptions');
    }

    public function subscribe(Request $request)
    {
        $user = Auth::user();
        $plan = $request->input('plan');
        $paymentMethod = $request->input('payment_method');

        // Usa los IDs reales de Stripe
        $plans = [
            'monthly' => 'price_1R98qV4QzCg0iCy7uRvwanwp',   // Reemplaza con tu ID real
            'semiannual' => 'price_1Ndef456xyz', // Reemplaza con tu ID real
            'annual' => 'price_1Nghi789xyz',    // Reemplaza con tu ID real
        ];

        if (!array_key_exists($plan, $plans)) {
            return redirect()->back()->withErrors(['plan' => 'Plan inválido']);
        }

        try {
            // Crear cliente en Stripe
            $customer = Customer::create([
                'email' => $user->email,
                'payment_method' => $paymentMethod,
                'invoice_settings' => ['default_payment_method' => $paymentMethod],
            ]);

            // Crear suscripción
            $subscription = StripeSubscription::create([
                'customer' => $customer->id,
                'items' => [['price' => $plans[$plan]]],
            ]);

            return redirect()->route('dashboard')->with('success', "Suscripción creada con éxito. ID: {$subscription->id}");
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['payment' => $e->getMessage()]);
        }
    }
}
