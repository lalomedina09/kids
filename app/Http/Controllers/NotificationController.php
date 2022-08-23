<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //
    public function index(Request $request)
    {
        $notifications = Auth::user()->notificationsTypeWeb;
        #dd($notifications);
        return view('notifications.index', compact('notifications'));
    }

    public function updateStatus(Request $request)
    {
        dd('veryyyyy Goddd');
    }
}
