<?php

namespace App\Exports;

use App\Models\Lead;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LeadsExport implements FromView
{
    #use Exportable;

    public function __construct(string $form)
    {
        $this->form = $form;
    }

    /*
    public function query()
    {
        return Lead::query()->where('form', $this->form)->get();
    }
    */
    public function view(): View
    {
        $leads = Lead::query()->where('form', $this->form)->get();

        return view('exports.leads.landings', [
            'leads' => $leads
        ]);
    }
}
