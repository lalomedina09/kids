<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class QdpRecordsTrialsForPageData implements FromView
{

    public function __construct($data)
    {
        //$this->form = $form;
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.trials.forPage', [
            'data' => $this->data
        ]);
    }
}
