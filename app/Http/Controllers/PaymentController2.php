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
use App\Models\Parameter;
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
        //Revision 07 - Julio - 2022
        //Uppdate for Autor Eulalio Medina Barragan
        //Funcion para proceder con el pago
        $curso_id = $_GET['curso_id'];
        #dd('textocupon: ', $cupon, 'texto id del curso: ', $curso_id);
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        //Obtencion precio curso
            #$slug = "taller-online-inversion-para-principiantes";
            $course = Course::with('speakers', 'itineraries', 'content', 'contacts')
            ->published()
            #->whereSlug($slug)
            ->where('id', $curso_id)
            ->firstOrFail();

        #dd($course, 'variable de curso');

        //$detalleCupon = Coupon::findOrFail($cupon);

        //Validación para conversion de precio del curso
        //Estas variables se declaraban antes del 7 de julio del 2022
        /*
        $porcentaje = $cupon / 100;
        $dollar = 0.05;
        $conversion = 0;
        $conversion = $dollar * $course->price;
        $descuento = $conversion * $porcentaje;
        $conversion2 = $conversion - $descuento;
        $comision = $conversion2 * 0.05;
        $precioFinal = $conversion2 + $comision + 0.30;
        */

        //Estas variables las mandare a una funcion para diferencie las divisas y evitar lineas extras
        $dataPrice = $this->priceGetCurrency($course, $cupon);
        //dd($dataPrice, 'array dataPrice');
        //Obtencion precio curso
        #dd($dataPrice, 'dataPrice');
        //storage orden de compra
            $user = request()->user();
            $microtime = Date::now()->format('U');
            $order = new Order;
            $order->number = $microtime;
            $order->status = "order.pending_payment";
            //Actualice este update superior porque marcaba que la orden estaba pagada y realmente empezaba a procesarce y
            // lo correcto es que aun debiera estar como oendiente y marcarlo como pagado una vez procesado el pago
            $order->total = $dataPrice['precioFinal'];
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
            $order_item->price = $dataPrice['conversion'];
            $order_item->discount = $dataPrice['descuento'];
            $order_item->subtotal = $dataPrice['conversion2'];
            $order_item->tax_factor = 4.0;
            $order_item->after_taxes = $dataPrice['precioFinal'];
            $order_item->tax = $dataPrice['comision'];
            $order_item->quantity = 1.0;
            $order_item->taxes = $dataPrice['comision'] + 0.30;
            $order_item->savings = 0.00;
            $order_item->total = $dataPrice['precioFinal'];
            $order_item->unit =  'qd:marketplace::units.service';
            $order_item->order()->associate($order->id);
            $order_item->itemable()->associate($course->id);
            $order_item->coupon_id = 1;
            $order_item->save();

            //Mailer::sendPaidOrderMail($order);

        //storage del item de la orden de comra

        //Condicionar paypal para dollares y para productos normales

        //$amount = new Amount();
        //$amount->setTotal($course->price);
        //$amount->setCurrency('MXN');

        //Fin condicion

        $amount = new Amount();
        $amount->setTotal($dataPrice['precioFinal']);
        $amount->setCurrency($dataPrice['currency']);

        //dd($amount);
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
            $ordenes->update(['status' => 'order.paid']);
            $items = OrderItem::where('order_id', $ordenes->id)->firstOrFail();

            Mailer::sendPaidOrderMail($ordenes);

            return view('qd:marketplace::checkout.confirmationPaypal', [
                'user' => $ordenes->user_id,
                //'order' => $order
                //'user' => 100,
                'articulo' => $items->name,
                'ordenId' => $ordenes->id
            ]);
            //orden de compra
        }

        $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
        return redirect('/results')->with(compact('status'));
    }

    public function priceGetCurrency($course, $cupon)
    {

        $data = array();

        $currency_value = Parameter::where('code', 'dollar-to-currency-mxn')->first();
        $dollar = $currency_value->_lft;
        $data['currency'] = $course->currency;
        $data['porcentaje'] = $cupon / 100;

        if ($course->currency == 'USD') {
            $data['conversion'] = ($course->price / $dollar) ;
            $conversion_con_descuento = $data['conversion'] * $data['porcentaje'];
            //precomision de paypal
            $data['comision'] = (($data['conversion'] - $conversion_con_descuento) * 0.05)  + 0.30;
        } else {
            $data['conversion'] = $course->price;
            $conversion_con_descuento = $data['conversion'] * $data['porcentaje'];
            $data['comision'] = ((($data['conversion'] - $conversion_con_descuento) * 3.95) / 100) + 4;
        }

        $data['descuento'] = $data['conversion'] * $data['porcentaje'];
        $data['conversion2'] = $data['conversion'] - $data['descuento'];

        $data['precioFinal'] = $data['conversion2'] + $data['comision'];

        return $data;
    }
}
