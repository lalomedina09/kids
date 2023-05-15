<?php

namespace App\Http\Controllers\Tools;

use DB;
use Auth;
use App\Models\TsBudget;
use App\Models\TsCategory;
use App\Models\TsCategoryUser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\Traits\BudgetTrait;
use App\Http\Controllers\Tools\Traits\CategoryUserTrait;
class BudgetMonthFilter extends Controller
{

    public static function header($moves, $request)
    {
        //$q = Order::query();
        $entrances = $moves->where('type_move', 1)->sum('amount_real');
        $exists = $moves->where('type_move', 0)->sum('amount_real');
        $listMonths = Controller::listMonths();
        $listYears = Controller::listYears();
        $total = $entrances - $exists;
        $section = null;

        $header_month = view(
            'partials.profiles.components.tools.components.budget.view-month.ajax._header_month',
            compact('entrances', 'exists', 'total','listMonths', 'listYears', 'section')
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
        //dd($data);
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
        //dd($moves, $section, $request);
        $date = array(
            'start' => '2023-05-01 00:00:00',
            'end' => '2023-05-31 23:59:59'
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
}

