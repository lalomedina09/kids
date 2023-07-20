<?php

namespace App\Http\Controllers\Tools;

use Mail;
use Auth;
use Exception;
use PDF;
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
        $year = ($request->has('year')) ? $request->year : Carbon::now()->format('Y');
        $month = ($request->has('month')) ? $request->month : Carbon::now()->format('m');

        $startDate = $year . '-' . $month . '-01'  . ' 00:00:00';
        $endTime = '' . ' 23:59:59';
        $_endDate = Carbon::parse($startDate)->format('Y-m-t');
        $endDate = $_endDate . $endTime;

        $searchCategories = TsBudget::join('ts_categories_users', 'ts_budgets.ts_category_user_id', '=', 'ts_categories_users.id')
            ->where('ts_budgets.user_id', $user->id)
            ->where('ts_budgets.created_at', '>=', $startDate)
            ->where('ts_budgets.created_at', '<=', $endDate)
            ->where('ts_categories_users.created_by_app', 1)
            ->get();

        if (count($searchCategories) == 0) {
            $this->createCategoryUser($user, $request, $startDate);
        }
    }

    public function createCategoryUser($user, $request, $startDate)
    {
        $categoriesMain = TsCategory::whereNotNull('parent_id')->get();

        foreach($categoriesMain as $category) {
            $request->request->add([
                'name' => $category->name,
                'amount_real' => 0,
                'amount_estimated' => 0,
                'percent' => CategoryUserTrait::getPercentCategory($category->id)
            ]);

            $categoryUserParent = CategoryUserTrait::createCategoryAutomatic($category, $user, $request, $startDate, $origin = 'filter-date');
            $budgetParent = BudgetTrait::createAutomatic($categoryUserParent, $user, $request, $startDate);

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
        $getBudget = TsBudget::where('id', $request->id_move)->first();
        $user = Auth::user();

        $date = Controller::buildDateMonth($request);
        if($getBudget == null)
        {
            $categoryUserParent = TsCategoryUser::where('id', $request->userCategory_id)->first();
            $getBudget = BudgetTrait::createAutomatic($categoryUserParent, $user, $request, $date['start']);
        }

        $customCategory = $getBudget->customCategory;

        if ($request->nameInput == "name") {
            $category = CategoryUserTrait::editItem($customCategory, $request);
        }else{
            $budget = BudgetTrait::editItem($getBudget, $request);
        }

        $user = Auth::user();
        $moves = TsBudget::where('user_id', $user->id);

        $date = Controller::buildDateMonth($request);
        $header = BudgetMonthFilter::header($request);
        $resumenMonth = BudgetMonthFilter::resumenMonth($request);
        $typeMove = BudgetTrait::getTypeMove($budget->customCategory);

        $categoryMain = $budget->customCategory->ts_category_id;
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

    public function activeYearReport(Request $request)
    {
        $user = Auth::user();
        $moves = TsBudget::where('user_id', $user->id)->get();
        $year = ($request->has('year')) ? $request->year : Carbon::now()->format('Y');
        $header = BudgetYearFilter::header($moves, $request);

        $labels = BudgetYearFilter::buildMonthOfArray($year);
        $ingresosEstimados = BudgetYearFilter::buildAmontsForMonthEstimate($year, $type = 1);
        $ingresosReales = BudgetYearFilter::buildAmontsForMonthReal($year, $type = 1);

        $gastosEstimados = BudgetYearFilter::buildAmontsForMonthEstimate($year, $type = 0);
        $gastosReales = BudgetYearFilter::buildAmontsForMonthReal($year, $type = 0);


        $body_temporal = view(
            'partials.profiles.components.tools.components.budget.view-year.report.graph-income',
            compact('labels', 'ingresosEstimados', 'ingresosReales', 'year', 'gastosEstimados', 'gastosReales')
        )->render();

        return response()->json([
            'section_header_year' => $header,
            'section_year' => $body_temporal
        ]);
    }

    public function activeCalendarFilterYearCalendar(Request $request)
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

    public function activeCalendarFilterYearReport(Request $request)
    {
        $user = Auth::user();
        $moves = TsBudget::where('user_id', $user->id)->get();
        $month = Carbon::now()->format('m');
        $year = ($request->has('year')) ? $request->year : Carbon::now()->format('Y');

        $header = BudgetYearFilter::header($moves, $request);
        $labels = BudgetYearFilter::buildMonthOfArray($year);

        $ingresosEstimados = BudgetYearFilter::buildAmontsForMonthEstimate($year, $type = 1);
        $ingresosReales = BudgetYearFilter::buildAmontsForMonthReal($year, $type = 1);

        $gastosEstimados = BudgetYearFilter::buildAmontsForMonthEstimate($year, $type = 0);
        $gastosReales = BudgetYearFilter::buildAmontsForMonthReal($year, $type = 0);

        $body_temporal = view(
            'partials.profiles.components.tools.components.budget.view-year.report.graph-income',
            compact('labels', 'ingresosEstimados', 'ingresosReales', 'year', 'gastosEstimados', 'gastosReales')
        )->render();

        return response()->json([
            'section_header_year' => $header,
            'section_year' => $body_temporal
        ]);
    }

    public function activeSection(Request $request)
    {
        //Con la siguiente linea buscamos si existen registros de categorias
        //si no encoentra crea los registros para ese mes correspondiente

        $section = $request->section;
        $user = Auth::user();
        $moves = TsBudget::where('user_id', $user->id);
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');

        //$resumenMonth = BudgetMonthFilter::resumenMonth($request);

        //Creamos request que utilizara el boton de descarga
        $request->request->add([
            'num_year' => $year,
            'num_month' => $month
        ]);

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
        //Funcion para filtro por mes
        $this->activeCategoriesCustom($request);
        $section = $request->section;
        $user = Auth::user();
        $moves = TsBudget::where('user_id', $user->id);
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');

        $btns = BudgetMonthFilter::btns($section);
        $content = BudgetMonthFilter::content($moves, $section, $request);
        $resumenMonth = BudgetMonthFilter::resumenMonth($request);


        return response()->json([
            'section_month_btns' => $btns,
            'resumenMonth' => $resumenMonth,
            'section_month_content' => $content
        ]);
    }

    public function createDateForInitMonth($request)
    {
        $date = $request->year . '-' . $request->month . '-01 00:00:00';
        return $date;
    }

    public function donwloadMoves($year, $month)
    {
        $user = Auth::user();

        $startDate = $year . '-' . $month . '-01'  . ' 00:00:00';
        $endTime = '' . ' 23:59:59';
        $_endDate = Carbon::parse($startDate)->format('Y-m-t');
        $endDate = $_endDate . $endTime;

        $date = array(
            'start' => $startDate,
            'end' => $endDate
        );

        $getMoves = TsBudget::where('user_id', $user->id)->get();
        $moves =  BudgetTrait::dataAllMoves($getMoves, $date);

        $view = 'partials.profiles.components.tools.components.budget.components.pdf.moves-v2';
        $filename = 'Movimientos-'. $month . '-'. $year .'pdf';

        $view = PDF::loadView($view, ['year' => $year, 'month' =>$month, 'moves' =>$moves, 'user' => $user]);

        return $view->download($filename);
    }
}
