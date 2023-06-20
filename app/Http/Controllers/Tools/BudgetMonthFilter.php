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

        $year = ($request->has('year')) ? $request->year : Carbon::now()->format('Y');
        $month = ($request->has('month')) ? $request->month : Carbon::now()->format('m');

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
        $data = BudgetMonthFilter::getListCategoriesBeta($moves, $section, $request);

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

    /*public static function getListCategories($moves, $section, $request)
    {
        $year = ($request->has('year')) ? $request->year : Carbon::now()->format('Y');
        $month = ($request->has('month')) ? $request->month : Carbon::now()->format('m');

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
                $constantesBeta =  CategoryUserTrait::listCategory($date, 4);
                $constantes =  BudgetTrait::dataCategory($date, 4, 1);
                $variables =  BudgetTrait::dataCategory($date, 5, 1);

                return $categories = array(
                    'constantesBeta' => $constantesBeta,
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
    }*/

    public static function getListCategoriesBeta($moves, $section, $request)
    {
        $year = ($request->has('year')) ? $request->year : Carbon::now()->format('Y');
        $month = ($request->has('month')) ? $request->month : Carbon::now()->format('m');

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
                //$constantesBeta =  CategoryUserTrait::listCategory($date, 4);
                $constantes =  CategoryUserTrait::listCategory($date, 4);
                $variables =  CategoryUserTrait::listCategory($date, 5);

                return $categories = array(
                    //'constantesBeta' => $constantesBeta,
                    'constantes' => $constantes,
                    'variables' => $variables,
                    'date' => $date
                );
                break;
            case 'exits':
                $fijos =  CategoryUserTrait::listCategory($date, 1);
                $gustos =  CategoryUserTrait::listCategory($date, 2);
                $ahorros =  CategoryUserTrait::listCategory($date, 3);

                return $categories = array(
                    'fijos' => $fijos,
                    'gustos' => $gustos,
                    'ahorros' => $ahorros,
                    'date' => $date
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

        $year = ($request->has('year')) ? $request->year : Carbon::now()->format('Y');
        $month = ($request->has('month')) ? $request->month : Carbon::now()->format('m');

        $startDate = $year . '-' . $month . '-01'  . ' 00:00:00';
        $endTime = '' . ' 23:59:59';
        $_endDate = Carbon::parse($startDate)->format('Y-m-t');
        $endDate = $_endDate . $endTime;

        $entrances = TsBudget::where('user_id', $user->id)
        ->where('type_move', 1)
            ->where('created_at', '>=', $startDate)
            ->where('created_at', '<=', $endDate)
        ->sum('amount_real');
        //->toSql();

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

        $year = ($request->has('year')) ? $request->year : Carbon::now()->format('Y');
        $month = ($request->has('month')) ? $request->month : Carbon::now()->format('m');

        $startDate = $year . '-' . $month . '-01'  . ' 00:00:00';
        $endTime = '' . ' 23:59:59';
        $_endDate = Carbon::parse($startDate)->format('Y-m-t');
        $endDate = $_endDate . $endTime;

        $date = array(
            'start' => $startDate,
            'end' => $endDate
        );

        $category_id = $budget->customCategory->ts_category_id;
        $typeMove = BudgetTrait::getTypeMove($budget->customCategory);
        $_rowsBudgets = BudgetTrait::dataCategory($date, $category_id, $typeMove);
        $_rows = CategoryUserTrait::listCategory($date, $category_id);
        $categoryRows = $_rows->get();

        $divArrowsCategory = $request->divArrowsCategory;
        $idArrowsName = $request->divArrowsCategory;
        $idCategoryAmountReal = $request->divAmountReal;
        $idCategoryAmountEstimate = $request->divAmountEstimate;

        $viewArrows = view('partials.profiles.components.tools.components.budget.view-month.ajax.components.general._rows_beta',
            compact('counter', 'section', 'categoryRows', 'idCategoryAmountReal', 'idCategoryAmountEstimate', 'category_id', 'divArrowsCategory', 'idArrowsName')
        )->render();

        $viewHeaderCategoryAmountEstimate = BudgetMonthFilter::calculateHeaderCategory($_rowsBudgets->get(), 'estimate', $request);
        $viewHeaderCategoryAmountReal = BudgetMonthFilter::calculateHeaderCategory($_rowsBudgets->get(), 'real', $request);

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

        if($typeAmount == "estimate"){
            $amount_estimate = $categoryRows->sum('amount_estimated');

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

