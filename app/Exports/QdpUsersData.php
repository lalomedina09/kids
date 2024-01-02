<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class QdpUsersData implements FromView
{

    public function __construct(string $form, $data)
    {
        $this->form = $form;
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.users.qdplay-suscription', [
            'data' => $this->data
        ]);
    }
}
