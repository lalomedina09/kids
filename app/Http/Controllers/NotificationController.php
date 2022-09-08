<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use QD\Advice\Models\Advice;
use QD\Marketplace\Models\{Order, OrderItem};

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Date;
use Session;
class NotificationController extends Controller
{
    //
    public function index(Request $request)
    {
        if(Auth::user())
        {
            $notifications = Auth::user()->notificationsTypeWeb;
        }else{
            $notifications = null;
        }
        return view('notifications.index', compact('notifications'));
    }

    public function updateStatus(Request $request)
    {
        $item = Notification::where('id', $request->id)->first();

        $item->status = $request->status;
        $item->update();
        $view = view('notifications.components.item', compact('item'))->render();

        return response()->json(['view' => $view]);
    }

    public function adviseds(Request $request)
    {
        #$pre_show = $this->getSessionModalAdviseds();

        $user = $request->user();
        $now = Date::now();
        $typeUser = (Auth::user()->hasProfileRoles()) ? 'advisor_id' : 'advised_id' ;
        $fileModal = (Auth::user()->hasProfileRoles()) ? 'content_advisor' : 'content_advised';

        $advice = $this->getAdvisedCurrent($typeUser, $user, $now);
        $paid = ($advice) ? $this->getStatusPaid($advice->id) : false ;
        $show = ($paid) ? true : false ;

        if($show){
            //dd('Es verdadero y mostramos la ventana modal');
            //Buscamos si la ventana modal ya la mostramos
            #$searchModalShow = $this->getSessionModalAdviseds($advice);
            $show = ($this->getSessionModalAdviseds($advice) == false) ? true : false ;
            //dd($this->getSessionModalAdviseds($advice));
        }else{
            $show = false;
        }

        //dd($show, $session);

        $view = view('partials.modals.advice.'.$fileModal, compact('paid', 'advice', 'user'))->render();
        return response()->json([
            'view' => $view,
            'show' => $show
        ]);
    }

    private function getStatusPaid($advice_id)
    {
        $orderItem = OrderItem::where('itemable_type', "advice")->where('itemable_id', $advice_id)->first();
        $order = Order::where('id', $orderItem->id)->where('status', "order.paid")->first();

        return $status = ($order) ? true : false ;
    }

    private function getAdvisedCurrent($typeUser, $user, $now)
    {
        $advice = Advice::where($typeUser, $user->id)
            ->where('start_date', '<=', $now)
            ->where('end_date', '>=', $now)
            ->first();

        return $advice;
    }

    private function getSessionModalAdviseds($advice)
    {
        $nameModal = 'modal_advice_'.$advice->id;
        Session::forget($nameModal);
        $get_data = (session()->has($nameModal)) ? true : false ;

        if($get_data == false)
        {
            $set_session = Session::put($nameModal, true);
            $get = Session::get($nameModal);
            return false;
        }else{
            return true;
        }

    }
}
