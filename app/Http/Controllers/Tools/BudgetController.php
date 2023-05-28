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

        $header = BudgetMonthFilter::header($request);
        //$body = BudgetMonthFilter::body($moves);
        $body = BudgetMonthFilter::content($moves, 'entrances', $request);

        return response()->json([
            'section_header_month' => $header,
            'section_month' => $body
        ]);
    }

    public function editInput(Request $request, $section)
    {
        $getBudget = TsBudget::findOrFail($request->id_move);
        $customCategory = $getBudget->customCategory;

        if ($request->nameInput == "name") {
            $category = CategoryUserTrait::editItem($customCategory, $request);
        }else{
            $budget = BudgetTrait::editItem($getBudget, $request);
        }

        $user = Auth::user();
        $moves = TsBudget::where('user_id', $user->id);
        $month = $request->month;
        $year = $request->year;

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
        ////

        $header = BudgetMonthFilter::header($request);
        $resumenMonth = BudgetMonthFilter::resumenMonth($request);
        $typeMove = BudgetTrait::getTypeMove($budget->customCategory);

        $categoryMain = $budget->customCategory->category_id;
        $_rows = BudgetTrait::dataCategory($date, $categoryMain, $typeMove);
        $categoryRows = $_rows->get();

        $viewHeaderCategoryAmountEstimate = BudgetMonthFilter::calculateHeaderCategory($categoryRows, 'estimate', $request);
        $viewHeaderCategoryAmountReal = BudgetMonthFilter::calculateHeaderCategory($categoryRows, 'real', $request);

        return response()->json([
            'section_header_month' => $header,
            'resumenMonth' => $resumenMonth,
            'viewHeaderCategoryAmountEstimate' => $viewHeaderCategoryAmountEstimate,
            'viewHeaderCategoryAmountReal' => $viewHeaderCategoryAmountReal
            //'section_month' => $body
        ]);

    }

    public function activeYear(Request $request)
    {
        $user = Auth::user();
        $moves = TsBudget::where('user_id', $user->id)->get();
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');

        $header = BudgetYearFilter::header($moves, $request);
        $body = BudgetYearFilter::body($moves, $request);

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

        //$resumenMonth = BudgetMonthFilter::resumenMonth($request);
        $header = BudgetMonthFilter::header($request);
        $btns = BudgetMonthFilter::btns($section);
        $content = BudgetMonthFilter::content($moves, $section, $request);

        return response()->json([
            'section_month_btns' => $btns,
            'section_header_month' => $header,
            'section_month_content' => $content
        ]);
    }

    public function activeSectionFilterDate(Request $request)
    {
        //dd('llego a la linea 151', $request->all());
        $section = $request->section;
        $user = Auth::user();
        $moves = TsBudget::where('user_id', $user->id);
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');
        //dd('linea 156');
        $btns = BudgetMonthFilter::btns($section);
        $content = BudgetMonthFilter::content($moves, $section, $request);
        $resumenMonth = BudgetMonthFilter::resumenMonth($request);

        //dd($request->all());
        return response()->json([
            'section_month_btns' => $btns,
            'resumenMonth' => $resumenMonth,
            'section_month_content' => $content
        ]);
    }

    public function AddMoveModalOpen(Request $request)
    {
        $user = Auth::user();
        $categoryId = $request->categoryId;
        $section = $request->section;
        $divCategory = $request->divArrowsCategory;
        $divAmountEstimate = $request->divAmountEstimate;
        $divAmountReal = $request->divAmountReal;

        $category = TsCategory::where('id', $categoryId)->first();
        $categoriesUser = TsCategoryUser::where('user_id', $user->id)
        ->where('ts_category_id', $categoryId)
        ->get();

        $view = view(
            'partials.profiles.components.tools.components.budget.components.modal-content._add_move',
            compact('categoriesUser', 'categoryId', 'section', 'category', 'divCategory', 'divAmountEstimate', 'divAmountReal')
        )
        ->render();

        return response()->json([
            'view' => $view
        ]);
    }

    public function AddMoveModalSave(Request $request)
    {
        $user = Auth::user();
        $category = TsCategory::where('id', $request->category_id)->first();

        $categoryUser = CategoryUserTrait::createForForm($category, $user, $request);
        $budget = BudgetTrait::create($categoryUser, $user, $request);

        $resumenMonth = BudgetMonthFilter::resumenMonth($request);
        $divArrowsCategory = BudgetMonthFilter::divArrowsCategory($request, $budget);

        return response()->json([
            'resumenMonth' => $resumenMonth,
            'divArrowsCategory' => $divArrowsCategory['viewArrows'],
            'viewAmountEstimate' => $divArrowsCategory['viewHeaderCategoryAmountEstimate'],
            'viewAmountReal' => $divArrowsCategory['viewHeaderCategoryAmountReal']
        ]);
    }

}
