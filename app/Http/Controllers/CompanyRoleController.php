<?php

namespace App\Http\Controllers;

use App\Services\CalendarClients\CalendarService;
use Illuminate\Http\Request;
use QD\Advice\Models\Advice;
use QD\Marketplace\Models\{Coupon, Order, OrderItem};
use App\Models\User;

class CompanyRoleController extends Controller
{
    //
    public function store()
    {
        dd('guardamos el rol');
    }

    public function update()
    {
        dd('Actualizamos el rol');
    }

    public function delete()
    {
        dd('desactivamos el rol');
    }
}
