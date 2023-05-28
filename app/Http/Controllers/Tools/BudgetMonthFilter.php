<?php

namespace App\Http\Controllers\Tools;

use DB;
use Auth;
use Carbon\Carbon;

use App\Models\TsBudget;
use App\Models\TsCategory;
use App\Models\TsCategoryUser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\Traits\BudgetTrait;
use App\Http\Controllers\Tools\Traits\CategoryUserTrait;
class BudgetMonthFilter extends Controller
{

    public static function header($request)
    {
        $user = Auth::user();
        //$q = Order::query();
        $year = ($request->has('budget_year')) ? $request->budget_year : Carbon::now()->format('Y');
        $month = ($request->has('budget_month')) ? $request->budget_month : Carbon::now()->format('m');

        $startDate = $year . '-' . $month.'-01'  . ' 00:00:00';
        $endTime = '' . ' 23:59:59';
        $_endDate = Carbon::parse($startDate)->format('Y-m-t');
        $endDate = $_endDate . $endTime;

        $entrances = TsBudget::where('user_id', $user->id)
            ->where('type_move', 1)
            ->where('created_at', '>=', $startDate)
            ->where('created_at', '<=', $endDate)
            ->sum('amount_real');
        $exists = TsBudget::where('user_id', $user->id)
            ->where('type_move', 0)
            ->where('created_at', '>=', $startDate)
            ->where('created_at', '<=', $endDate)
            ->sum('amount_real');

        $listMonths = Controller::listMonths();
        $listYears = Controller::listYears();

        $total = $entrances - $exists;
        $section = $request->section;

        $header_month = view(
            'partials.profiles.components.tools.components.budget.view-month.ajax._header_month',
            compact('entrances', 'exists', 'total','listMonths', 'listYears', 'section', 'year', 'month')
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
        $section = 'entrances';

        $body_month = view(
            'partials.profiles.components.tools.components.budget.view-month.ajax._content',
            compact('entrances', 'exists', 'total', 'section')
        )
        ->render();
        return $body_month;
    }

    public static function btns($section)
    {
        $btns = BudgetMonthFilter::monthlistBtns();

        $view = view(
            'partials.profiles.components.tools.components.budget.view-month.ajax._btns',
            compact('btns', 'section')
        )
        ->render();
        return $view;
    }

    public static function content($moves, $section, $request)
    {
        $btns = BudgetMonthFilter::monthlistBtns();
        $data = BudgetMonthFilter::getListCategories($moves, $section, $request);

        $view = view(
            'partials.profiles.components.tools.components.budget.view-month.ajax._content',
            compact('moves', 'section', 'data')
        )
        ->render();
        return $view;
    }

    public static function monthlistBtns()
    {
        $listBtns = array(
            "entrances" => array(
                "section" => "entrances",
                "title" => "Lo que entra",
                "img_white" => "images/tools/budget/enter-white.png",
                "img_black" => "images/tools/budget/enter-black.png",
            ),
            "exits" => array(
                "section" => "exits",
                "title" => "Lo que sale",
                "img_white" => "images/tools/budget/out-white.png",
                "img_black" => "images/tools/budget/out-black.png",
            ),
            "movements" => array(
                "section" => "movements",
                "title" => "Movimientos",
                "img_white" => "images/tools/budget/moves-white.png",
                "img_black" => "images/tools/budget/moves-dark.png",
            )
        );

        return $listBtns;
    }

    public static function getListCategories($moves, $section, $request)
    {
        $year = ($request->has('budget_year')) ? $request->budget_year : Carbon::now()->format('Y');
        $month = ($request->has('budget_month')) ? $request->budget_month : Carbon::now()->format('m');

        $startDate = $year . '-' . $month . '-01'  . ' 00:00:00';
        $endTime = '' . ' 23:59:59';
        $_endDate = Carbon::parse($startDate)->format('Y-m-t');
        $endDate = $_endDate . $endTime;

        $date = array(
            'start' => $startDate,
            'end' => $endDate
        );

        switch ($section) {
            case 'entrances':
                $constantes =  BudgetTrait::dataCategory($date, 4, 1);
                $variables =  BudgetTrait::dataCategory($date, 5, 1);

                return $categories = array(
                    'constantes' => $constantes,
                    'variables' => $variables
                );
                break;
            case 'exits':
                $fijos =  BudgetTrait::dataCategory($date, 1, 0);
                $gustos =  BudgetTrait::dataCategory($date, 2, 0);
                $ahorros =  BudgetTrait::dataCategory($date, 3, 0);

                return $categories = array(
                    'fijos' => $fijos,
                    'gustos' => $gustos,
                    'ahorros' => $ahorros
                );
                break;
            case 'movements':
                $data =  BudgetTrait::dataAllMoves($moves, $date);
                return $moves = array(
                    'movements' => $data
                );
                break;
            default:
                return null;
            break;
        }
    }

    public static function resumenMonth($request)
    {
        $user = Auth::user();

        $year = ($request->has('budget_year')) ? $request->budget_year : Carbon::now()->format('Y');
        $month = ($request->has('budget_month')) ? $request->budget_month : Carbon::now()->format('m');

        $startDate = $year . '-' . $month . '-01'  . ' 00:00:00';
        $endTime = '' . ' 23:59:59';
        $_endDate = Carbon::parse($startDate)->format('Y-m-t');
        $endDate = $_endDate . $endTime;

        $entrances = TsBudget::where('user_id', $user->id)
        ->where('type_move', 1)
            ->where('created_at', '>=', $startDate)
            ->where('created_at', '<=', $endDate)
        ->sum('amount_real');

        $exists = TsBudget::where('user_id', $user->id)
        ->where('type_move', 0)
            ->where('created_at', '>=', $startDate)
            ->where('created_at', '<=', $endDate)
        ->sum('amount_real');

        $total = $entrances - $exists;
        $section = $request->section;
        $view = view(
            'partials.profiles.components.tools.components.budget.view-month.components._header_month',
            compact('entrances', 'exists', 'total', 'section')
        )
        ->render();

        return $view;
    }

    public static function divArrowsCategory($request, $budget)
    {
        $user = Auth::user();
        $counter = 1;
        $section = $request->section;
        ////
        $year = ($request->has('budget_year')) ? $request->budget_year : Carbon::now()->format('Y');
        $month = ($request->has('budget_month')) ? $request->budget_month : Carbon::now()->format('m');

        $startDate = $year . '-' . $month . '-01'  . ' 00:00:00';
        $endTime = '' . ' 23:59:59';
        $_endDate = Carbon::parse($startDate)->format('Y-m-t');
        $endDate = $_endDate . $endTime;
        ///
        $date = array(
            //'start' => '2023-05-01 00:00:00',
            //'end' => '2023-05-31 23:59:59'
            'start' => $startDate,
            'end' => $endDate
        );

        $categoryMain = $request->category_id;
        $typeMove = BudgetTrait::getTypeMove($budget->customCategory);
        $_rows = BudgetTrait::dataCategory($date, $categoryMain, $typeMove);
        $categoryRows = $_rows->get();
        $idCategoryAmountReal = $request->divAmountReal;
        $idCategoryAmountEstimate = $request->divAmountEstimate;

        $viewArrows = view('partials.profiles.components.tools.components.budget.view-month.ajax.components.general._rows',
            compact('counter', 'section', 'categoryRows', 'idCategoryAmountReal', 'idCategoryAmountEstimate')
        )->render();

        $viewHeaderCategoryAmountEstimate = BudgetMonthFilter::calculateHeaderCategory($categoryRows, 'estimate', $request);
        $viewHeaderCategoryAmountReal = BudgetMonthFilter::calculateHeaderCategory($categoryRows, 'real', $request);

        $views = array(
            'viewArrows' => $viewArrows,
            'viewHeaderCategoryAmountEstimate' => $viewHeaderCategoryAmountEstimate,
            'viewHeaderCategoryAmountReal' => $viewHeaderCategoryAmountReal
        );
        return   $views;

    }

    public static function calculateHeaderCategory($categoryRows, $typeAmount, $request)
    {
        $section = $request->section;
        //dd($typeAmount, 'tipo de monto');
        //dd($typeAmount, 'tipo de monto');
        //if ($section == "entrance") {
        if($typeAmount == "estimate"){
            $amount_estimate = $categoryRows->sum('amount_estimated');
            //dd($amount_estimate);
            $view = view(
                'partials.profiles.components.tools.components.budget.view-month.ajax.components.'. $section .'.categoryHeaderAmontEstimate',
                compact('amount_estimate')
            )->render();
        }else{
            $amount_real = $categoryRows->sum('amount_real');
            $view = view(
                'partials.profiles.components.tools.components.budget.view-month.ajax.components.' . $section . '.categoryHeaderAmontReal',
                compact('amount_real')
            )->render();

        }
        return $view;
    }
}

