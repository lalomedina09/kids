<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class QdpAmountViewsData implements FromView
{

    protected $form, $amount, $estimated_payments, $complete;
    public function __construct(string $form, $amount, $estimated_payments, $complete)
    {
        //dd('conexiones');
        $this->form = $form;
        $this->amount = $amount;
        $this->estimated_payments = $estimated_payments;
        $this->complete = $complete;
    }

    public function view(): View
    {
        //dd('lleg aqui');
        return view('exports.views.amount', [
            'form' => $this->form,
            'amount' => $this->amount,
            'estimated_payments' => $this->estimated_payments,
            'complete' => $this->complete
        ]);
    }
}
