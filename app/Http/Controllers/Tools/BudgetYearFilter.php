<?php

namespace App\Http\Controllers\Tools;

use DB;
use Auth;
use Carbon\Carbon;
use App\Models\TsBudget;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BudgetYearFilter extends Controller
{

    public static function header($moves, $request)
    {
        //$q = Order::query();
        $year = ($request->has('budget_year')) ? $request->budget_year : Carbon::now()->format('Y');

        $entrances = $moves->where('type_move', 1)->sum('amount_real');
        $exists = $moves->where('type_move', 0)->sum('amount_real');
        $total = $entrances - $exists;

        $listMonths = Controller::listMonths();
        $listYears = Controller::listYears();

        $header_month = view(
            'partials.profiles.components.tools.components.budget.view-year.ajax._header_year',
            compact('entrances', 'exists', 'total', 'listMonths', 'listYears', 'year')
        )
            ->render();
        return $header_month;
    }

    public static function body($moves, $request)
    {
        //$q = Order::query();
        $year = ($request->has('budget_year')) ? $request->budget_year : Carbon::now()->format('Y');

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
