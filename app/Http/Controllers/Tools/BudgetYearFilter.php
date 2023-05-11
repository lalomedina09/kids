<?php

namespace App\Http\Controllers\Tools;

use DB;
use Auth;
use App\Models\TsBudget;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BudgetYearFilter extends Controller
{

    public static function header($moves)
    {
        //$q = Order::query();
        $entrances = $moves->where('type_move', 1)->sum('amount_real');
        $exists = $moves->where('type_move', 0)->sum('amount_real');
        $total = $entrances - $exists;
        $listMonths = Controller::listMonths();
        $listYears = Controller::listYears();

        $header_month = view(
            'partials.profiles.components.tools.components.budget.view-year.ajax._header_year',
            compact('entrances', 'exists', 'total', 'listMonths', 'listYears')
        )
            ->render();
        return $header_month;
    }

    public static function body($moves)
    {
        //$q = Order::query();
        $entrances = $moves->where('type_move', 1)->sum('amount_real');
        $exists = $moves->where('type_move', 0)->sum('amount_real');
        $total = $entrances - $exists;

        $body_month = view(
            'partials.profiles.components.tools.components.budget.view-year.ajax._calendar',
            compact('entrances', 'exists', 'total')
        )
            ->render();
        return $body_month;
    }
}
