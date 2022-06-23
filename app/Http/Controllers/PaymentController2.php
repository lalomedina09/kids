<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Agreement;
use PayPal\Api\Payer;
use PayPal\Api\Plan;
use PayPal\Api\PaymentDefinition;
use PayPal\Api\PayerInfo;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use App\Models\Course; //Se agrega modelo del curso para poder usar sus funciones
use QD\Marketplace\Models\{ Coupon, Order, OrderItem }; //Se agrega modelos de ordenes para crear registros
use QD\Marketplace\Mail\Orders\Mailer;
use App\Http\Requests\Courses\BuyRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Config;
use Redirect;
use URL;
use Date;


class PaymentController2 extends Controller
{
    private $apiContext;
    //private $precioFinal;

    public function __construct()
    {
        $payPalConfig = Config::get('paypal');

        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $payPalConfig['client_id'],
                $payPalConfig['secret']
            )
        );

        $this->apiContext->setConfig($payPalConfig['settings']);
    }

    // ...

    public function payWithPayPal($cupon)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        //Obtencion precio curso
            $slug = "taller-online-inversion-para-principiantes";
            $course = Course::with('speakers', 'itineraries', 'content', 'contacts')
            ->published()
            ->whereSlug($slug)
            ->firstOrFail();

            //$detalleCupon = Coupon::findOrFail($cupon);

            $porcentaje = $cupon / 100;
            $dolar = 0.05;
            $Conversion = 0;
            $Conversion = $dolar * $course->price;
            $descuento = $Conversion * $porcentaje;
            $Conversion2 = $Conversion - $descuento;
            $comision = $Conversion2 * 0.05;
            $precioFinal = $Conversion2 + $comision + 0.30;
        //Obtencion precio curso

        //storage orden de compra
            $user = request()->user();
            $microtime = Date::now()->format('U');
            $order = new Order;
            $order->number = $microtime;
            $order->status = "order.paid";
            $order->total = $precioFinal;
            $order->method = "paypal";
            //$order->expiration_date = $this->getExpirationDate();
            $order->user()->associate($user);
            $order->save();
        //storage orden de compra

        //storage del item de la orden de compra

            
                $order_item = new OrderItem;
                //$order_item->sku = $item->getSku();
                $order_item->name = $course->title;
                $order_item->description = $course->title;
                $order_item->price = $Conversion;
                $order_item->discount = $descuento;
                $order_item->subtotal = $Conversion2;
                $order_item->tax_factor = 4.0;
                $order_item->after_taxes = $precioFinal;
                $order_item->tax = $comision;
                $order_item->quantity = 1.0;
                $order_item->taxes = $comision + 0.30;
                $order_item->savings = 0.00;
                $order_item->total = $precioFinal;
                $order_item->unit =  'qd:marketplace::units.service';
                $order_item->order()->associate($order->id);
                $order_item->itemable()->associate($course->id);
                $order_item->coupon_id = 1;
                $order_item->save();

                Mailer::sendPaidOrderMail($order);
            
        //storage del item de la orden de comra

        //Condicionar paypal para dollares y para productos normales
        
        
            //$amount = new Amount();
            //$amount->setTotal($course->price);
            //$amount->setCurrency('MXN');
        
        //Fin condicion

        $amount = new Amount();
        $amount->setTotal($precioFinal);
        $amount->setCurrency('USD');

        $transaction = new Transaction();
        $transaction->setAmount($amount);
        $transaction->setDescription($course->title);

        $callbackUrl = url('/paypal/status');

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($callbackUrl)
            ->setCancelUrl($callbackUrl);

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($this->apiContext);
            return redirect()->away($payment->getApprovalLink());
        } catch (PayPalConnectionException $ex) {
            echo $ex->getData();
        }
    }

    public function payPalStatus(Request $request)
    {
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
        $token = $request->input('token');

        if (!$paymentId || !$payerId || !$token) {
            $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
            return redirect('/paypal/failed')->with(compact('status'));
        }

        $payment = Payment::get($paymentId, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        /** Execute the payment **/
        $result = $payment->execute($execution, $this->apiContext);

        if ($result->getState() === 'approved') 
        {
            $ordenes = Order::orderBy('id', 'DESC')->firstOrFail();
            $items = OrderItem::where('order_id', $ordenes->id)->firstOrFail();

            return view('qd:marketplace::checkout.confirmationPaypal', [
                //'user' => $user,
                //'order' => $order
                'user' => 100,
                'articulo' => $items->name,
                'ordenId' => $ordenes->id
            ]);
            //orden de compra
        }

        $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
        return redirect('/results')->with(compact('status'));
    }
}