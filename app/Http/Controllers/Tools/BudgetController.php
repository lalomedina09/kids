<?php

namespace App\Http\Controllers\Tools;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TsBudget;

#use App\Mail\Landings\Mailer;
#use App\Notifications\Landings\Notifier;

use Mail;
use Auth;
class BudgetController extends Controller
{

    public function __construct() {}


    public function active(Request $request)
    {
        //dd('en el controller de presupuesto');
        $user = Auth::user();
        $moves = TsBudget::where('user_id', $user->id)->get();

        $header_month = $this->getHeaderMonth($moves);

        $table_movements = $this->getMoves($moves);

        return response()->json([
            'table_movements' => $table_movements,
            'header_month' => $header_month
        ]);
    }

    public function getHeaderMonth($moves)
    {
        $entrances = $moves->where('type_move', 1)->sum('amount_real');
        $exists = $moves->where('type_move', 0)->sum('amount_real');
        $total = 500;

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
}
