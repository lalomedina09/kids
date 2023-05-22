<?php

namespace App\Http\Controllers\Tools;

use DB;
use Auth;
use Carbon\Carbon;
use App\Models\TsBudget;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\Traits\BudgetTrait;
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

        $header_year = view(
            'partials.profiles.components.tools.components.budget.view-year.ajax._header_year',
            compact('entrances', 'exists', 'total', 'listMonths', 'listYears', 'year')
        )->render();

        return $header_year;
    }

    public static function body($moves, $request)
    {
        //$q = Order::query();
        $user = Auth::user();
        $year = ($request->has('budget_year')) ? $request->budget_year : Carbon::now()->format('Y');
        $listMonths = Controller::listMonths();


        $entrances = $moves->where('type_move', 1)->sum('amount_real');
        $exists = $moves->where('type_move', 0)->sum('amount_real');
        $total = $entrances - $exists;

        $buildCardsMonth = BudgetYearFilter::buildCardsMonth($year);
        //dd($buildCardsMonth, 'dododod', 'exactoo');
        $body_year_calendar = view(
            'partials.profiles.components.tools.components.budget.view-year.ajax._calendar',
            compact('entrances', 'exists', 'total', 'year', 'listMonths', 'buildCardsMonth')
        )->render();

        return $body_year_calendar;
    }

    public static function buildCardsMonth($year)
    {
        $cards = array();
        $buildArrayMonth = Controller::buildArrayMonths($year);
        $user = Auth::user();

        foreach($buildArrayMonth as $key => $value) {
            $json_decoded = json_decode($key);
            $cards[] = array(
                'month' => $value['month'],
                'start_month' => $value['start_month'],
                'end_month' => $value['end_month'],
                "enter_estimate" => BudgetTrait::dataCalendarMonth($value['start_month'], $value['end_month'], $user, 'amount_estimated', $typeMove = 1, $cat = null),
                "enter_real" => BudgetTrait::dataCalendarMonth($value['start_month'], $value['end_month'], $user, 'amount_real', $typeMove = 1, $cat = null),
                "out_estimate" => BudgetTrait::dataCalendarMonth($value['start_month'], $value['end_month'], $user, 'amount_estimated',$typeMove = 0, $cat = null),
                "out_real" => BudgetTrait::dataCalendarMonth($value['start_month'], $value['end_month'], $user, 'amount_real', $typeMove = 0, $cat = null),
                "cat_fijo" => BudgetTrait::dataCalendarMonth($value['start_month'], $value['end_month'], $user, 'amount_real', $typeMove = 0, $cat = 1),
                "cat_gustos" => BudgetTrait::dataCalendarMonth($value['start_month'], $value['end_month'], $user, 'amount_real', $typeMove = 0, $cat = 2),
                "cat_ahorros" => BudgetTrait::dataCalendarMonth($value['start_month'], $value['end_month'], $user, 'amount_real', $typeMove = 0, $cat = 3),
            );
        }

        return $cards;

        //dd($cards);

    }
}
