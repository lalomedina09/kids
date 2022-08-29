<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
}
