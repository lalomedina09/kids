<?php

namespace App\Exports;

use App\Models\Landing;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

#use Maatwebsite\Excel\Concerns\FromCollection;

class LandingExport implements FromView
{
    #use Exportable;

    public function __construct(string $page)
    {
        $this->page = $page;
    }

    /*
    public function query()
    {
        return Lead::query()->where('page', $this->page)->get();
    }
    */
    public function view(): View
    {
        #$leads = Lead::query()->where('page', $this->page)->get();
        $columns = Landing::where('page', $this->page)->first();
        $results = Landing::where('page', $this->page)->get();

        return view('exports.landing.results', [
            'results' => $results,
            'columns' => $columns
        ]);
    }
}
