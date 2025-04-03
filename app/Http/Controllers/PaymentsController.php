<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Subscription as StripeSubscription;
use Stripe\Customer;
use QD\QDPlay\Models\Concept;

class PaymentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        Stripe::setApiKey(config('services.stripe.secret_key'));
    }

    public function form($code)
    {
        $concept = Concept::where('code',$code)->first();

        return view('v2.home.payments.index', compact('concept'));
    }

    public function subscribeSave(Request $request)
    {
        $user = Auth::user();
        $paymentMethod = $request->input('payment_method');
        $coupon = $request->input('coupon'); // O usa 'TESTCOUPON' si sigues probando con hardcode
        $plan = $request->input('plan_price');

        $plans = [
            'monthly' => 'price_1R9Csk4QzCg0iCy7d2jSTO9a',
            'semiannual' => 'price_1Ndef456xyz',
            'annual' => 'price_1Nghi789xyz',
        ];

        if (!array_key_exists($plan, $plans)) {
            return redirect()->back()->withErrors(['plan' => 'Plan inválido']);
        }

        try {
            // Crear cliente en Stripe directamente sin guardar en DB
            $customer = \Stripe\Customer::create([
                'email' => $user->email,
                'payment_method' => $paymentMethod,
                'invoice_settings' => ['default_payment_method' => $paymentMethod],
            ]);

            // Crear suscripción usando el ID del cliente recién creado
            $subscription = \Stripe\Subscription::create([
                'customer' => $customer->id,
                'items' => [['price' => $plans[$plan]]],
                'coupon' => $coupon ?: null,
            ]);

            return redirect()->route('payments.v2',[ 'id' => 'coin'])->with('success', "Pago realizado con éxito. ID: {$subscription->id}");
        } catch (\Exception $e) {
            \Log::error('Subscription failed: ' . $e->getMessage());
            return redirect()->back()->withErrors(['payment' => $e->getMessage()]);
        }
    }

    public function validateCoupon(Request $request)
    {
        $coupon = $request->input('coupon');
        try {
            $stripeCoupon = \Stripe\Coupon::retrieve($coupon);
            return response()->json(['valid' => true, 'discount' => $stripeCoupon->percent_off]);
        } catch (\Exception $e) {
            return response()->json(['valid' => false]);
        }
    }
}
