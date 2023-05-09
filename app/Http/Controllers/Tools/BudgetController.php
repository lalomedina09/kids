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
use Carbon\Carbon;
class BudgetController extends Controller
{

    public function __construct() {}


    public function activePrincipal(Request $request)
    {
        $month = Carbon::now();
        $year = ;
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

    public function activeSection(Request $request)
    {
        $section = $request->section;
        $user = Auth::user();
        $moves = TsBudget::where('user_id', $user->id)->get();

        $btns = BudgetMonthFilter::btns($section);
        $content = BudgetMonthFilter::content($moves, $section);


        return response()->json([
            'section_month_btns' => $btns,
            'section_month_content' => $content
        ]);
    }

}
