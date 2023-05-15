<?php

namespace App\Http\Controllers\Tools\Traits;

use Auth;
use Carbon\Carbon;
use App\Models\TsBudget;

trait BudgetTrait
{
    public static function create($categoryUser, $user, $request)
    {
        $budget = new TsBudget;
        $budget->type_move = BudgetTrait::getTypeMove($categoryUser);
        $budget->amount_real = $request->amount_real;
        $budget->amount_estimated = $request->amount_estimated;
        $budget->ts_category_user_id = $categoryUser->id;
        $budget->user_id = $user->id;

        $budget->save();
        return $budget;
    }

    public static function editItem($budget, $request)
    {
        $nowTime = Carbon::now()->format('H:i:s');

        switch ($request->nameInput) {
            case 'estimated':
                $budget->amount_real = $request->value;
                break;
            case 'real':
                $budget->amount_estimated = $request->value;
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

    public static function dataCategory($date, $category, $typeMove)
    {
        $user = Auth::user();
        $moves = TsBudget::join('ts_categories_users', 'ts_budgets.ts_category_user_id', '=', 'ts_categories_users.id')
            ->where('ts_budgets.user_id', $user->id)
            ->where('ts_categories_users.ts_category_id', $category)
            ->where('ts_budgets.type_move', $typeMove)
            ->where('ts_budgets.created_at', '>=', $date['start'])
            ->where('ts_budgets.created_at', '<=', $date['end'])
            ->select('ts_budgets.*')
            ->get();

        return $moves;
    }

    public static function dataAllMoves($moves, $date)
    {
        $data = $moves->where('created_at', '>=', $date['start'])
            ->where('created_at', '<=', $date['end'])
            ->where('amount_real', '>', 0)
            ->get();

        return $data;
    }
}
