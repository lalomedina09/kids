<?php

namespace App\Http\Controllers;

use App\Services\CalendarClients\CalendarService;
use Illuminate\Http\Request;
use QD\Advice\Models\Advice;
use QD\Marketplace\Models\{Coupon, Order, OrderItem};
use App\Models\User;

class CompanyController extends Controller
{
    //
    public function store()
    {
        dd('Guardamos la empresa');
    }

    public function update()
    {
        dd('Actualizamos la empresa');
    }

}
