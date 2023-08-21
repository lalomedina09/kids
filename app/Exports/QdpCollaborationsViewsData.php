<?php

namespace App\Exports;

//use QD\Marketplace\Models\{Order};
//use QD\QDPlay\Models\Subscription;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class QdpCollaborationsViewsData implements FromView
{

    public function __construct(string $form, $data)
    {
        $this->form = $form;
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.collaborations.collaborations-views', [
            'result' => $this->data
        ]);
    }
}
