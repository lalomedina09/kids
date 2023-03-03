<?php

namespace App\Http\Controllers;

use App\Services\CalendarClients\CalendarService;
use Illuminate\Http\Request;
use QD\Advice\Models\Advice;
use QD\Marketplace\Models\{Coupon, Order, OrderItem};
use App\Models\User;

class BranchController extends Controller
{
    //
    public function store()
    {
        dd('Guardamos la sucursal');
    }

    public function update()
    {
        dd('Actualizamos la sucursal');
    }

    public function delete(){
        dd('Desactivamos la sucursal');
    }
}
