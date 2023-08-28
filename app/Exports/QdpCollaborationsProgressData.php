<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class QdpCollaborationsProgressData implements FromView
{

    public function __construct(string $form, $data)
    {
        $this->form = $form;
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.collaborations.progress-course', [
            'data' => $this->data
        ]);
    }
}
