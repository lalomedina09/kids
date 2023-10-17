<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class QdpCollaborationsBehavior implements FromView
{

    public function __construct(string $form, $data)
    {
        $this->form = $form;
        $this->data = $data;
    }

    public function view(): View
    {
        //dd('lleg aqui');
        return view('exports.collaborations.bahavior-user', [
            'data' => $this->data
        ]);
    }
}
