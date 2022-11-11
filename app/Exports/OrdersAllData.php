<?php

namespace App\Exports;
#use App\Models\Lead;
use QD\Marketplace\Models\{ Order };

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OrdersAllData implements FromView
{
    #use Exportable;

    public function __construct(string $form)
    {
        $this->form = $form;
    }

    public function view(): View
    {
        $orders = Order::query()->latest('created_at')
        ->get();

        return view('exports.orders.all', [
            'orders' => $orders
        ]);
    }
}
