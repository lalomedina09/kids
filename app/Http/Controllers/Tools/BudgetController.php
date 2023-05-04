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

        $table_movements = view('partials.profiles.components.tools.components.budget.view-month.moves.table', compact('moves'))->render();
        return response()->json(['table_movements' => $table_movements]);
    }

}
