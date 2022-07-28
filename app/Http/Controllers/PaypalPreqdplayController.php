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
use App\Models\UserPackage;
use Auth;
use Redirect;
use URL;
use Carbon\Carbon;
use Date;


class PaypalPreqdplayController extends Controller
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

    public function payWithPayPal($var = 0)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        //Estas variables las mandare a una funcion para diferencie las divisas y evitar lineas extras
        $dataPrice = $this->priceGetCurrency();
        //storage orden de compra
        $user = request()->user();
        $microtime = Date::now()->format('U');

        $order = $this->registerOrder($microtime, $dataPrice, $user);

        $this->registerOrderItem($dataPrice, $order);

        $this->registerUserPackage($order->id);

        $amount = new Amount();
        $amount->setTotal($dataPrice['precioFinal']);
        $amount->setCurrency($dataPrice['currency']);

        //dd($amount);
        $transaction = new Transaction();
        $transaction->setAmount($amount);
        $transaction->setDescription('Paquete QDPLAY 3 Cursos');

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
            return redirect()->back()->with(compact('status'));
        }

        $payment = Payment::get($paymentId, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        /** Execute the payment **/
        $result = $payment->execute($execution, $this->apiContext);

        if ($result->getState() === 'approved')
        {
            $order = Order::orderBy('id', 'DESC')->firstOrFail();
            $order->update(['status' => 'order.paid']);
            $items = OrderItem::where('order_id', $order->id)->firstOrFail();

            Mailer::sendPaidOrderMail($order);

            return view('qd:marketplace::checkout.confirmationPaypal', [
                'user' => $order->user_id,
                'articulo' => $items->name,
                'ordenId' => $order->id
            ]);
            //orden de compra
        }

        $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
        return redirect('/results')->with(compact('status'));
    }

    public function priceGetCurrency()
    {

        $data = array();

        $data['currency'] = 'MXN';
        $data['porcentaje'] = 0;
        $data['conversion'] = 299;
        $conversion_con_descuento = $data['conversion'] * $data['porcentaje'];
        $data['comision'] = ((($data['conversion'] - $conversion_con_descuento) * 3.95) / 100) + 4;
        $data['descuento'] = $data['conversion'] * $data['porcentaje'];
        $data['conversion2'] = $data['conversion'] - $data['descuento'];
        $data['precioFinal'] = $data['conversion2'] + $data['comision'];

        return $data;
    }

    public function registerOrder($microtime, $dataPrice, $user)
    {
        $order = new Order;
        $order->number = $microtime;
        $order->status = "order.pending_payment";
        $order->total = $dataPrice['precioFinal'];
        $order->method = "paypal";
        $order->user()->associate($user);
        $order->save();

        return $order;
    }

    public function registerOrderItem($dataPrice, $order)
    {
        $order_item = new OrderItem;
        //$order_item->sku = $item->getSku();
        $order_item->name = 'Paquete QDPLAY 3 Cursos';
        $order_item->description = 'Paquete de 3 cursos ';
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
        $order_item->itemable()->associate($order); //posteriormente hay que cambiar este numero o ver como tener lo correcto
        #$order_item->coupon_id = 1;
        $order_item->save();
    }

    public function registerUserPackage($order_id)
    {
        $userPackage = new UserPackage;
        $userPackage->code = 'paquete-qdplay-3-cursos';
        $userPackage->user_id =  Auth::user()->id;
        $userPackage->order_id = $order_id;
        $userPackage->expiration_date = Carbon::now()->addDay(30)->format('Y-m-d h:i:s');
        $userPackage->buy_date = Carbon::now()->format('Y-m-d h:i:s');
        $userPackage->save();
    }

    public function deleteUserPackage($order_id)
    {
        $userPackage = UserPackage::where('user_id', Auth::user()->id)->where('code', '')->first();
        $userPackage->delete();
    }
}
