<?php

namespace App\Http\Controllers\Tools;

use Mail;
use Auth;
use Carbon\Carbon;

use App\Models\TsBudget;
use App\Models\TsCategory;
use App\Models\TsCategoryUser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Tools\BudgetYearFilter;
use App\Http\Controllers\Tools\BudgetMonthFilter;
use App\Http\Controllers\Tools\Traits\BudgetTrait;
use App\Http\Controllers\Tools\Traits\CategoryUserTrait;

class BudgetController extends Controller
{

    public function __construct() {}

    public function activePrincipal(Request $request)
    {
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');

        $user = Auth::user();
        $moves = TsBudget::where('user_id', $user->id)->get();

        $header_month = $this->getHeaderMonth(1);
        $table_movements = $this->getMoves($moves);

        return response()->json([
            'table_movements' => $table_movements,
            'header_month' => $header_month
        ]);
    }

    public function activeCategoriesCustom(Request $request)
    {
        $user = Auth::user();

        $searchCategories = TsCategoryUser::where('user_id', $user->id)->get();

        if (count($searchCategories) == 0) {
            $this->createCategoryUser($user, $request);
        }
    }

    public function createCategoryUser($user, $request)
    {
        $categoriesMain = TsCategory::all();

        foreach ($categoriesMain as $category) {
            $request->request->add([
                'name' => $category->name,
                'amount_real' => 0,
                'amount_estimated' => 0,
                'percent' => CategoryUserTrait::getPercentCategory($category->id)
            ]);

            $categoryUser = CategoryUserTrait::create($category, $user, $request);
            $budget = BudgetTrait::create($categoryUser, $user, $request);
        }
    }

    public function activeMonth(Request $request)
    {
        $user = Auth::user();
        $moves = TsBudget::where('user_id', $user->id);
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');

        $header = BudgetMonthFilter::header($moves);
        //$body = BudgetMonthFilter::body($moves);
        $body = BudgetMonthFilter::content($moves, 'entrances', $request);

        return response()->json([
            'section_header_month' => $header,
            'section_month' => $body
        ]);
    }

    public function activeYear(Request $request)
    {
        $user = Auth::user();
        $moves = TsBudget::where('user_id', $user->id)->get();
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');

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
        $moves = TsBudget::where('user_id', $user->id);
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');

        $btns = BudgetMonthFilter::btns($section);
        $content = BudgetMonthFilter::content($moves, $section, $request);

        return response()->json([
            'section_month_btns' => $btns,
            'section_month_content' => $content
        ]);
    }


}
