<?php

namespace App\Http\Controllers;
//prueba de servicio para envio de correo y carga de evento en calendario
use App\Services\CalendarClients\CalendarService;
use Illuminate\Http\Request;
use QD\Advice\Models\Advice;
use QD\Marketplace\Models\{Coupon, Order, OrderItem}; //Se agrega modelos de ordenes para crear registros
use App\Models\User;
class TestingController extends Controller
{
    //
    public function dispatchService()
    {
        //Inicializamos el servicio
        //$advice = Advice::where('id', 569)->first();
        #dd($advice->duration);
        #dd($advice->advised->email);

        //$calendar = new CalendarService($advice);
        $order = Order::where('id', 2196)->where('status', "order.paid")->first();
        #dd($order->method_is_card, $order->status);
        #$orderItem = OrderItem::where('itemable_type', "advice")->where('itemable_id', $advice_id)->first();
        #$order = Order::where('id', $orderItem->order_id)->where('status', "order.paid")->first();
        //si ya tenemos el pedido pagado entonces pasamos a enviar evento al calendario
        if ($order->status == "order.paid") {
            //dd('no importa el metodo, solo que este pagado no problem');
            $orderItem = OrderItem::where('itemable_type', "advice")
                                ->where('order_id', $order->id)
                                ->first();
            if ($orderItem) {
                $advice = Advice::where('id', $orderItem->itemable_id)->first();
                $calendar = new CalendarService($advice);
                //dd($calendar, 'despues del pago exitoso ya fue al calendario agregar eventos ');
            }
        }
    }
}
