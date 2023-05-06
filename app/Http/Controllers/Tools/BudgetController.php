<?php

namespace App\Http\Controllers\Tools;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\BudgetMonthFilter;
use App\Http\Controllers\Tools\BudgetYearFilter;
use App\Models\TsBudget;

#use App\Mail\Landings\Mailer;
#use App\Notifications\Landings\Notifier;

use Mail;
use Auth;
class BudgetController extends Controller
{

    public function __construct() {}


    public function activePrincipal(Request $request)
    {
        $user = Auth::user();
        $moves = TsBudget::where('user_id', $user->id)->get();

        $header_month = $this->getHeaderMonth(1);
        $table_movements = $this->getMoves($moves);

        return response()->json([
            'table_movements' => $table_movements,
            'header_month' => $header_month
        ]);
    }

    public function activeMonth(Request $request)
    {
        $user = Auth::user();
        $moves = TsBudget::where('user_id', $user->id)->get();

        $header = BudgetMonthFilter::header($moves);
        $body = BudgetMonthFilter::body($moves);

        return response()->json([
            'section_header_month' => $header,
            'section_month' => $body
        ]);

    }

    public function activeYear(Request $request)
    {
        $user = Auth::user();
        $moves = TsBudget::where('user_id', $user->id)->get();


        $header = BudgetYearFilter::header($moves);
        $body = BudgetYearFilter::body($moves);

        return response()->json([
            'section_header_year' => $header,
            'section_year' => $body
        ]);
    }
    /*
    public function getHeaderMonth($moves)
    {
        $entrances = $moves->where('type_move', 1)->sum('amount_real');
        $exists = $moves->where('type_move', 0)->sum('amount_real');
        $total = $entrances - $exists;

        $header_month = view(
            'partials.profiles.components.tools.components.budget.view-month.components._ajax_header_month',
            compact('entrances', 'exists', 'total')
        )
        ->render();

        return $header_month;
    }

    public function getMoves($moves)
    {
        $table_movements = view(
            'partials.profiles.components.tools.components.budget.view-month.moves._ajax_table',
            compact('moves')
        )
        ->render();

        return $table_movements;
    }
    */
    /*
    public function activeMonth(Request $request)
    {
        $user = Auth::user();
        $moves = TsBudget::where('user_id', $user->id)->get();

        $header_month = $this->getHeaderMonth($moves);

        $table_movements = $this->getMoves($moves);

        return response()->json([
            'table_movements' => $table_movements,
            'header_month' => $header_month
        ]);
    }

    public function activeYear(Request $request)
    {
        $user = Auth::user();
        $moves = TsBudget::where('user_id', $user->id)->get();

        $header_month = $this->getHeaderMonth($moves);

        $table_movements = $this->getMoves($moves);

        return response()->json([
            'table_movements' => $table_movements,
            'header_month' => $header_month
        ]);
    }*/
}
