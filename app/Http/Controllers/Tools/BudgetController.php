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
        ////////
        $year = ($request->has('year')) ? $request->year : Carbon::now()->format('Y');
        $month = ($request->has('month')) ? $request->month : Carbon::now()->format('m');

        $startDate = $year . '-' . $month . '-01'  . ' 00:00:00';
        $endTime = '' . ' 23:59:59';
        $_endDate = Carbon::parse($startDate)->format('Y-m-t');
        $endDate = $_endDate . $endTime;
        ////////
        //$start = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
        //$end = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');
        //$end = Carbon::now();

        //TsBudget
        //$searchCategories = TsCategoryUser::where('user_id', $user->id)
        $searchCategories = TsBudget::where('user_id', $user->id)
            ->where('created_at', '>=', $startDate)
            ->where('created_at', '<=', $endDate)
            ->get();

        if (count($searchCategories) == 0) {
            $this->createCategoryUser($user, $request, $startDate);
        }
    }

    public function createCategoryUser($user, $request, $startDate)
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
            //$budget = BudgetTrait::create($categoryUser, $user, $request);
            $budget = BudgetTrait::createAutomatic($categoryUser, $user, $request, $startDate);
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
        //$year = ($request->has('year')) ? $request->year : Carbon::now()->format('Y');
        //$month = ($request->has('month')) ? $request->month : Carbon::now()->format('m');

        $startDate = $year . '-' . $month . '-01 00:00:00';
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

    public function activeCalendarFilterYear(Request $request)
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
        //Con la siguiente linea buscamos si existen registros de categorias
        //si no encoentra crea los registros para ese mes correspondiente

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

    public function AddMoveModalOpen(Request $request)
    {
        $user = Auth::user();
        $categoryId = $request->categoryId;
        $section = $request->section;
        $divCategory = $request->divArrowsCategory;
        $divAmountEstimate = $request->divAmountEstimate;
        $divAmountReal = $request->divAmountReal;
        $created_at = $request->year . '-'. $request->month .'-' . $day = Carbon::now()->format('d');
        $year = $request->year;
        //dd($created_at);
        $category = TsCategory::where('id', $categoryId)->first();
        $categoriesUser = TsCategoryUser::where('user_id', $user->id)
        ->where('ts_category_id', $categoryId)
        ->get();

        $view = view(
            'partials.profiles.components.tools.components.budget.components.modal-content._add_move',
            compact('categoriesUser', 'categoryId', 'section', 'category', 'divCategory', 'divAmountEstimate', 'divAmountReal', 'created_at', 'year')
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
        $arrayMonths = Controller::buildArrayMonths($request->year);
        $addMovePostMonth = $request->addMovePostMonth;

        $categoryUser = CategoryUserTrait::createForForm($category, $user, $request);
        $budget = BudgetTrait::create($categoryUser, $user, $request);

        //Si el usuario activo check se agregara movimientos en los siguientes meses
        if ($addMovePostMonth == "true") {
            foreach ($arrayMonths as $key => $value) {
                if ($key > $request->month) {
                    $request->request->add([
                        'created_at' => $value['start_month'],
                    ]);

                    $budgetAfter = BudgetTrait::create($categoryUser, $user, $request);
                }
            }
        }

        $resumenMonth = BudgetMonthFilter::resumenMonth($request);
        $divArrowsCategory = BudgetMonthFilter::divArrowsCategory($request, $budget);

        return response()->json([
            'resumenMonth' => $resumenMonth,
            'divArrowsCategory' => $divArrowsCategory['viewArrows'],
            'viewAmountEstimate' => $divArrowsCategory['viewHeaderCategoryAmountEstimate'],
            'viewAmountReal' => $divArrowsCategory['viewHeaderCategoryAmountReal']
        ]);
    }

    //Nueva funcion para visualizar los movimientos del mes
    public function openModalYearMovements(Request $request)
    {
        $user = Auth::user();

        $request->nameMonth;
        $nameMonth = $request->nameMonth;
        $date = array(
            'start' => $request->start . ' 00:00:00',
            'end' => $request->end . ' 23:59:59'
        );

        $moves = TsBudget::where('user_id', $user->id);
        $data =  BudgetTrait::dataAllMoves($moves, $date);
        //dd('lugar correcto');
        $view = view(
            'partials.profiles.components.tools.components.budget.components.modal-content._table_moves',
            compact('data', 'nameMonth')
        )
        ->render();

        return response()->json([
            'view' => $view
        ]);
    }

    //Nueva funcion para ver tarjeta en zom
    public function openModalYearZoom(Request $request)
    {
        $user = Auth::user();
        $request->nameMonth;
        $request->start;
        $request->end;

        $card = array(
            'month' => $request->nameMonth,
            'start_month' => $request->start,
            'end_month' => $request->end,
            "enter_estimate" => BudgetTrait::dataCalendarMonth($request->start, $request->end, $user, 'amount_estimated', $typeMove = 1, $cat = null),
            "enter_real" => BudgetTrait::dataCalendarMonth($request->start, $request->end, $user, 'amount_real', $typeMove = 1, $cat = null),
            "out_estimate" => BudgetTrait::dataCalendarMonth($request->start, $request->end, $user, 'amount_estimated', $typeMove = 0, $cat = null),
            "out_real" => BudgetTrait::dataCalendarMonth($request->start, $request->end, $user, 'amount_real', $typeMove = 0, $cat = null),
            "cat_fijo" => BudgetTrait::dataCalendarMonth($request->start, $request->end, $user, 'amount_real', $typeMove = 0, $cat = 1),
            "cat_gustos" => BudgetTrait::dataCalendarMonth($request->start, $request->end, $user, 'amount_real', $typeMove = 0, $cat = 2),
            "cat_ahorros" => BudgetTrait::dataCalendarMonth($request->start, $request->end, $user, 'amount_real', $typeMove = 0, $cat = 3),
        );

        $view = view(
            'partials.profiles.components.tools.components.budget.components.modal-content._zoom_month',
            compact('card')
        )
        ->render();

        return response()->json([
            'view' => $view
        ]);
    }

    //Funcion para activar ventana modal eliminar movimiento
    public function deleteMoveModalOpen(Request $request)
    {
        $user = Auth::user();
        $categoryId = $request->categoryId;
        $section = $request->section;
        $divCategory = $request->divArrowsCategory;
        $divAmountEstimate = $request->divAmountEstimate;
        $divArrowsCategory = $request->divArrowsCategory;
        $divAmountReal = $request->divAmountReal;
        $created_at = $request->year . '-' . $request->month . '-' . $day = Carbon::now()->format('d');
        $year = $request->year;
        //dd($created_at);
        $category = TsCategory::where('id', $categoryId)->first();
        $categoriesUser = TsCategoryUser::where('user_id', $user->id)
        ->where('ts_category_id', $categoryId)
        ->get();
        $budget = TsBudget::where('id', $request->budget_id)->first();
        $view = view(
            'partials.profiles.components.tools.components.budget.components.modal-content._delete_move',
            compact('categoriesUser', 'categoryId', 'section', 'category', 'divCategory', 'divAmountEstimate', 'divAmountReal', 'created_at', 'year', 'budget', 'divArrowsCategory')
        )
        ->render();

        return response()->json([
            'view' => $view
        ]);
    }

    public function deleteMoveModalConfirm(Request $request)
    {
        $user = Auth::user();
        $category = TsCategory::where('id', $request->category_id)->first();
        $arrayMonths = Controller::buildArrayMonths($request->year);
        $deleteMovePostMonth = $request->deleteMovePostMonth;
        $budget_id = $request->budget_id;
        $dateInit = $this->createDateForInitMonth($request);

        //Search 1: Busqueda de movimientos con la misma categoria creada en la tabla ts_categories_users
        //mayor al mes actual
        $searchMovementsForId = TsBudget::where('created_at', '>', $dateInit)
                        ->where('ts_category_user_id', $request->ts_category_user_id)
                        ->get();

        //Search 2: Busqueda de movimientos basados en nombres mayor al mes actual
        $searchMovementsForName = TsBudget::join('ts_categories_users', 'ts_budgets.ts_category_user_id', '=', 'ts_categories_users.id')
            ->where('ts_budgets.created_at', '>', $dateInit)
            ->where('ts_budgets.user_id', $user->id)
            ->where('ts_categories_users.name', $request->budget_name)
            ->select('ts_budgets.id')
            ->get()
            ->pluck('id')
            ->toArray();

        $budgetDelete = BudgetTrait::destroy($budget_id);

        //Si el usuario activo check se eliminara el movimiento en los siguientes meses
        if ($deleteMovePostMonth == "true") {
            //Entra al if porque encontro referencias de la categoria user ID
            if(count($searchMovementsForId)>0)
            {
                foreach($searchMovementsForId as $item)
                {
                    $deleteOne = BudgetTrait::destroy($item->id);
                }
            }

            //Entro al if porque encontro referencias por nombre de los siguientes meses
            if(count($searchMovementsForName))
            {
                foreach($searchMovementsForName as $item)
                {
                    $deleteTwo = BudgetTrait::destroy($item);
                }
            }
        }
        //dd($request->all());
        //Recuperamos el movimiento ya eliminado para mandar la collection a la funcion
        $budget = TsBudget::where('id', $budget_id)->withTrashed()->first();

        //dd($budget, 'Movimiento eliminado y luego recuperado');
        $resumenMonth = BudgetMonthFilter::resumenMonth($request);
        $divArrowsCategory = BudgetMonthFilter::divArrowsCategory($request, $budget);

        return response()->json([
            'resumenMonth' => $resumenMonth,
            'divArrowsCategory' => $divArrowsCategory['viewArrows'],
            'viewAmountEstimate' => $divArrowsCategory['viewHeaderCategoryAmountEstimate'],
            'viewAmountReal' => $divArrowsCategory['viewHeaderCategoryAmountReal']
        ]);
    }

    public function createDateForInitMonth($request)
    {
        $date = $request->year . '-' . $request->month . '-01 00:00:00';
        return $date;
    }
}
