<?php

namespace App\Http\Controllers\Tools\Traits;

use Auth;
use Carbon\Carbon;
use App\Models\TsBudget;

trait BudgetTrait
{
    public static function create($categoryUser, $request)
    {
        $user = Auth::user();

        $budget = new TsBudget;
        $budget->type_move = BudgetTrait::getTypeMove($categoryUser);
        $budget->amount_real = ($request->amount_real) ? $request->amount_real : 0;
        $budget->amount_estimated = ($request->amount_estimated) ? $request->amount_estimated : 0;
        $budget->ts_category_user_id = $categoryUser->id;
        $budget->user_id = $user->id;
        $budget->created_at = $request->created_at;
        $budget->name = $request->name;
        $budget->comments = "Pertenece a la categoría " . $categoryUser->name;
        $budget->save();
        return $budget;
    }

    public static function createParent($categoryUser, $user, $request)
    {
        $budget = new TsBudget;
        $budget->type_move = BudgetTrait::getTypeMove($categoryUser);

        $budget->ts_category_user_id = $categoryUser->id;
        $budget->user_id = $user->id;
        $budget->created_at = $request->created_at;
        $budget->comments = $request->comments;
        $budget->save();
        return $budget;
    }

    public static function createChild($categoryUserParent, $user, $request)
    {
        $budget = new TsBudget;
        $budget->type_move = BudgetTrait::getTypeMove($categoryUserParent);
        $budget->amount_real = ($request->amount_real) ? $request->amount_real : 0;
        $budget->amount_estimated = ($request->amount_estimated) ? $request->amount_estimated : 0;
        $budget->ts_category_user_id = $categoryUserParent->id;
        $budget->user_id = $user->id;
        $budget->created_at = $request->created_at;
        $budget->comments = $request->comments;
        $budget->save();
        return $budget;
    }

    public static function destroy($id)
    {
        $budget = TsBudget::withTrashed()->findOrFail($id);
        $budget->delete();
    }

    public static function editItem($budget, $request)
    {
        $nowTime = Carbon::now()->format('H:i:s');

        switch ($request->nameInput) {
            case 'estimated':
                $budget->amount_estimated = $request->value;
                break;
            case 'real':
                $budget->amount_real = $request->value;
                break;
            case 'created_at':
                $date = $request->value . ' ' . $nowTime;

                $budget->created_at = $date;
                break;
            default:

            break;
        }
        $budget->update();
        return $budget;
    }

    public static function getTypeMove($categoryUser)
    {
        $category_id = $categoryUser->ts_category_id;
        return $value = ($category_id == 4 || $category_id == 5) ? 1 : 0 ;
    }

    //Función utilizada desde varios puntos
    public static function dataCategory($date, $category, $typeMove)
    {
        $user = Auth::user();
        $moves = TsBudget::join('ts_categories_users', 'ts_budgets.ts_category_user_id', '=', 'ts_categories_users.id')
            ->where('ts_budgets.user_id', $user->id)
            ->where('ts_categories_users.ts_category_id', $category)
            ->where('ts_budgets.type_move', $typeMove)
            ->where('ts_budgets.created_at', '>=', $date['start'])
            ->where('ts_budgets.created_at', '<=', $date['end'])
            ->whereNull('ts_categories_users.parent_id')
            ->select('ts_budgets.*');

        return $moves;
    }

    //Funcion utilizada en la vista de movimientos desde vista mensual y en vista de tarjeta por mes
    //Regresamos movimientos de entrada y salida
    public static function dataAllMoves($moves, $date)
    {
        $user = Auth::user();
        $getData = TsBudget::where('user_id', $user->id)
            ->where('created_at', '>=', $date['start'])
            ->where('created_at', '<=', $date['end'])
            ->where('ts_budgets.amount_real', '>', 0)
            //->whereNotNull('ts_categories_users.parent_id')
            ->orderBy('created_at')
            ->select('*')
            ->get();
        //Recordar desactivar comentario de linea ->where('ts_budgets.amount_real', '>', 0)
        return $getData;
    }

    public static function dataCalendarMonth($start_month, $end_month, $user, $dataSum, $typeMove, $category)
    {
        $data_sum = 'ts_budgets.' . $dataSum;
        $startMonth = $start_month . ' 00:00:00';
        $endMonth = $end_month . ' 23:59:59';

        $q = TsBudget::join('ts_categories_users', 'ts_budgets.ts_category_user_id', '=', 'ts_categories_users.id')
        ->where('ts_budgets.user_id', $user->id);

        if ($category) {
            $q->where('ts_categories_users.ts_category_id', $category);
        }

        $q->where('ts_budgets.type_move', $typeMove)
        ->where('ts_budgets.created_at', '>=', "$startMonth")
        ->where('ts_budgets.created_at', '<=', "$endMonth")
        ->select('ts_budgets.*')
        ->get();

        return $q->sum("$data_sum");
    }

    //Esta función es utilizada por el filtro de meses o año en visualizacion mensual
    public static function createAutomatic($categoryUser, $user, $request, $created_at)
    {
        $budget = new TsBudget;
        $budget->name = 'Movimiento #1' . $categoryUser->name;
        $budget->type_move = BudgetTrait::getTypeMove($categoryUser);
        $budget->amount_real = $request->amount_real;
        $budget->amount_estimated = $request->amount_estimated;
        $budget->ts_category_user_id = $categoryUser->id;
        $budget->user_id = $user->id;
        $budget->created_at = $created_at;
        $budget->updated_at = $created_at;
        $budget->save();

        return $budget;
    }
}
