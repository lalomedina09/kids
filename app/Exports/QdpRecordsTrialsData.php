<?php

namespace App\Exports;

use QD\Marketplace\Models\{Order};
use QD\QDPlay\Models\Subscription;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class QdpRecordsTrialsData implements FromView
{

    public function __construct(string $form)
    {
        $this->form = $form;
    }

    public function view(): View
    {
        $trials = Subscription::trials()->with(['user', 'concept'])->get();
        return view('exports.trials.all', [
            'trials' => $trials
        ]);
    }
}
