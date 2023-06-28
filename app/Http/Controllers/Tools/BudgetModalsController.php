<?php

namespace App\Http\Controllers\Tools;

use Mail;
use Auth;
use PDF;
use Carbon\Carbon;

use App\Models\TsBudget;
use App\Models\TsCategory;
use App\Models\TsCategoryUser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//use App\Http\Controllers\Tools\BudgetController;
use App\Http\Controllers\Tools\BudgetYearFilter;
use App\Http\Controllers\Tools\BudgetMonthFilter;
use App\Http\Controllers\Tools\Traits\BudgetTrait;
use App\Http\Controllers\Tools\Traits\CategoryUserTrait;

class BudgetModalsController extends Controller
{

    public function __construct() {}

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

        $category = TsCategory::where('id', $categoryId)->first();
        $categoriesUser = TsCategoryUser::where('user_id', $user->id)
        ->where('ts_category_id', $categoryId)
        ->first();

        $view = view('partials.profiles.components.tools.components.budget.components.modal-content.new_category',compact('categoriesUser', 'categoryId', 'section', 'category', 'divCategory', 'divAmountEstimate', 'divAmountReal', 'created_at', 'year'))
            ->render();

        return response()->json([
            'view' => $view
        ]);
    }

    //Funcion para agregar una nueva categoria
    public function AddCategoryModalSave(Request $request)
    {
        $user = Auth::user();
        $category = TsCategory::where('id', $request->category_id)->first();

        $arrayMonths = Controller::buildArrayMonths($request->year);
        $addMovePostMonth = $request->addMovePostMonth;
        $startDate = $this->createDateForInitMonth($request);

        //Creamos la categoria y su primer movimiento
        $categoryUserParent = CategoryUserTrait::createCategoryAutomatic($category, $user, $request, $startDate, $origin = 'save-cat-user');
        $budgetOne = BudgetTrait::createAutomatic($categoryUserParent, $user, $request, $startDate);

        //Si el usuario activo check se agregara movimientos en los siguientes meses
        if ($addMovePostMonth == "true") {
            foreach ($arrayMonths as $key => $value) {
                if ($key > $request->month) {
                    $request->request->add([
                        'created_at' => $value['start_month'],
                    ]);
                    $categoryUserParentTwo = CategoryUserTrait::createCategoryAutomatic($category, $user, $request, $value['start_month'], $origin = 'save-cat-user');
                    $budgetAfter = BudgetTrait::createChild($categoryUserParentTwo, $user, $request);
                }
            }
        }

        $resumenMonth = BudgetMonthFilter::resumenMonth($request);
        $divArrowsCategory = BudgetMonthFilter::divArrowsCategory($request, $budgetOne);

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

    //Funcion para activar ventana modal eliminar categoria
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

        $category = TsCategory::where('id', $categoryId)->first();
        $categoryUser = TsCategoryUser::where('id', $request->categoryUser_id)->first();

        $budget = TsBudget::where('id', $request->budget_id)->first();
        $view = view(
            'partials.profiles.components.tools.components.budget.components.modal-content._delete_move',
            compact('categoryUser', 'categoryId', 'section', 'category', 'divCategory', 'divAmountEstimate', 'divAmountReal', 'created_at', 'year', 'budget', 'divArrowsCategory')
        )
        ->render();

        return response()->json([
            'view' => $view
        ]);
    }

    public function deleteMoveModalConfirm(Request $request)
    {
        $user = Auth::user();

        $arrayMonths = Controller::buildArrayMonths($request->year);
        $date = Controller::buildDateMonth($request);
        $deleteMovePostMonth = $request->deleteMovePostMonth;
        $budget_id = $request->budget_id;

        //Search 1: ubicamos la categoria a traves del id
        $searchCategoryUser = TsCategoryUser::where('created_at', '>=', $date['start'])
                        ->where('created_at', '<=', $date['end'])
                        ->where('id', $request->categoryUser_id)
                        ->first();

        if($searchCategoryUser){
            foreach ($searchCategoryUser->moves as $move) {
                BudgetTrait::destroy($move->id);
            }

            $searchCategoryUser->delete();
        }

        //Si el usuario activo check se eliminara las categorias en los proximos meses
        if ($deleteMovePostMonth == "true") {
            foreach ($arrayMonths as $key => $value) {
                if ($key > $request->month) {
                    $searchForNameCategoryUser = TsCategoryUser::where('user_id', $user->id)
                        ->where('created_at', '>=', $value['start_month'])
                        ->where('created_at', '<=', $value['end_month'])
                        ->where('name', $request->usercategory_name)
                        ->first();

                    if($searchForNameCategoryUser){
                        foreach ($searchForNameCategoryUser->moves as $move) {
                            BudgetTrait::destroy($move->id);
                        }

                        $searchForNameCategoryUser->delete();
                    }
                }
            }
        }

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
    //Abrir ventana modal para agregar movimiento a la categoria selecionada
    public function addMoveToCategoryModalOpen(Request $request)
    {
        $user = Auth::user();
        $categoryId = $request->categoryId;
        $section = $request->section;
        $divCategory = $request->divArrowsCategory;
        $divAmountEstimate = $request->divAmountEstimate;
        $divAmountReal = $request->divAmountReal;
        $created_at = $request->year . '-' . $request->month . '-' . $day = Carbon::now()->format('d');
        $year = $request->year;
        $budget = TsBudget::where('id', $request->budgetId)->withTrashed()->first();

        $category = TsCategory::where('id', $categoryId)->first();

        $onlyCategoriesUser = TsCategoryUser::where('id', $categoryId)->first();
        $categoriesUser = TsCategoryUser::where('user_id', $user->id)
            ->where('id', $categoryId)
            ->get();

        $view = view(
            'partials.profiles.components.tools.components.budget.components.modal-content._add_move_to_category',
            compact('categoriesUser', 'categoryId', 'section', 'category', 'divCategory', 'onlyCategoriesUser', 'divAmountEstimate', 'divAmountReal', 'created_at', 'year', 'budget')
        )
            ->render();

        return response()->json([
            'view' => $view
        ]);
    }

    //funcion para agregar el movimiento dentro de la categoria
    public function AddMoveToCategoryModalSave(Request $request)
    {
        $user = Auth::user();
        $categoryUser = TsCategoryUser::where('id', $request->parent_id)->first();
        $budgetMove = BudgetTrait::create($categoryUser, $request);

        //Cargamos los elementos para renderizar
        $resumenMonth = BudgetMonthFilter::resumenMonth($request);
        $divArrowsCategory = BudgetMonthFilter::divArrowsCategory($request, $budgetMove);

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

    //Abrir ventana modal para ver movimientos
    public function modalMovesShow(Request $request)
    {
        $user = Auth::user();
        $categoryId = $request->categoryId;
        $categoryUserId = $request->budgetId;
        $section = $request->section;
        $divCategory = $request->divArrowsCategory;
        $divAmountEstimate = $request->divAmountEstimate;
        $divAmountReal = $request->divAmountReal;
        $created_at = $request->year . '-' . $request->month . '-' . $day = Carbon::now()->format('d');
        $year = $request->year;

        $category = TsCategory::where('id', $categoryId)->first();
        $categoriesUser = TsCategoryUser::where('user_id', $user->id)
            ->where('id', $categoryUserId)
            ->first();

        $view = view('partials.profiles.components.tools.components.budget.components.modal-content.show-moves',
                compact('categoriesUser', 'categoryId', 'section', 'category', 'divCategory', 'divAmountEstimate', 'divAmountReal', 'created_at', 'year')
            )
            ->render();

        return response()->json([
            'view' => $view
        ]);
    }

    public function modalMovesUpdate(Request $request)
    {

    }

    public function moveDestroy(Request $request)
    {
        $user = Auth::user();
        $budget_id = $request->moveId;
        $budgetDelete = BudgetTrait::destroy($budget_id);

        //Recuperamos el movimiento ya eliminado para mandar la collection a la funcion
        $budget = TsBudget::where('id', $budget_id)->withTrashed()->first();
        $resumenMonth = BudgetMonthFilter::resumenMonth($request);
        $divArrowsCategory = BudgetMonthFilter::divArrowsCategory($request, $budget);
        //dd($budget, $resumenMonth, $divArrowsCategory);
        return response()->json([
            'resumenMonth' => $resumenMonth,
            'divArrowsCategory' => $divArrowsCategory['viewArrows'],
            'viewAmountEstimate' => $divArrowsCategory['viewHeaderCategoryAmountEstimate'],
            'viewAmountReal' => $divArrowsCategory['viewHeaderCategoryAmountReal']
        ]);
    }
}

