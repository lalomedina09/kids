<?php

namespace App\Http\Controllers\Tools\Traits;

use App\Models\TsCategoryUser;

trait CategoryUserTrait
{
    public static function createCategoryAutomatic($category, $user, $request, $created_at, $origin)
    {
        //U1: Funcion utilizada por los filtros de fechas y cuando no existen categorias main por app
        //U2: Función utilizada cuando se crea una subcategoria por ejemplo "nomina", "Afore", "Categoria Y"
        $categoryUser = new TsCategoryUser;
        $categoryUser->name = $request->name;
        $categoryUser->percent = $request->percent;
        $categoryUser->ts_category_id = ($origin == "filter-date") ? $category->parent_id : $category->id ;
        $categoryUser->parent_id = $request->parent_id;
        $categoryUser->user_id = $user->id;
        $categoryUser->created_by_app = ($origin == "filter-date") ? 1 : null;
        $categoryUser->created_at = $created_at;
        $categoryUser->updated_at = $created_at;
        $categoryUser->save();
        return $categoryUser;
    }

    /*public static function createCategoryChild($categoryParent, $user, $request)
    {
        //dd($categoryParent, 'didid');
        $categoryUser = new TsCategoryUser;
        $categoryUser->name = $request->name;
        $categoryUser->percent = $request->percent;
        $categoryUser->ts_category_id = null;
        $categoryUser->parent_id = $categoryParent->id;
        $categoryUser->user_id = $user->id;
        //$categoryUser->created_by_app = 1;

        $categoryUser->save();
        return $categoryUser;
    }*/
/*
    public static function create($category, $user, $request)
    {
        $categoryUser = new TsCategoryUser;
        $categoryUser->name = $request->name;
        $categoryUser->percent = $request->percent;
        $categoryUser->ts_category_id = $category->parent_id;
        $categoryUser->parent_id = $request->parent_id;
        $categoryUser->user_id = $user->id;
        $categoryUser->created_by_app = 1;

        $categoryUser->save();
        return $categoryUser;
        //Ojo -> ver si hago una funcion exlusiva para esto o buscar la forma de solucionar este bug
        //Comment = ($category->parent_id) ? $category->parent_id : $category->id
    }*/
/*
    public static function createForForm($category, $user, $request)
    {
        $categoryUser = new TsCategoryUser;
        $categoryUser->name = $request->name;
        $categoryUser->percent = $request->percent;
        $categoryUser->ts_category_id = $category->id;
        $categoryUser->parent_id = ($request->parent_id) ? $request->parent_id : null;
        $categoryUser->user_id = $user->id;

        $categoryUser->save();
        return $categoryUser;
        //Ojo -> ver si hago una funcion exlusiva para esto o buscar la forma de solucionar este bug
        //Comment = ($category->parent_id) ? $category->parent_id : $category->id
    }*/

    public static function editItem($category, $request)
    {
        switch ($request->nameInput) {
            case 'name':
                $category->name = $request->value;
                break;
            case 'percent':
                $category->percent = $request->nameInput;
                break;
            default:
            break;
        }

        $category->update();
        return $category;
    }

    public static function getPercentCategory($id)
    {
        switch ($id) {
            case 1:
                return 50;
                break;
            case 2:
                return 30;
                break;
            case 3:
                return 20;
                break;
            default:
                return 0;
            break;
        }
    }

    //Función utilizada en la visualización mensual para llenar cada seccion
    public static function listCategory($date, $categoryMain)
    {
        $user = Auth::user();
        $categoriesUser = TsCategoryUser::where('ts_category_id', $categoryMain)
                    ->where('created_at', '>=', $date['start'])
                    ->where('created_at', '<=', $date['end'])
                    ->whereNull('ts_categories_users.parent_id');
                    #->select('*');
            //join('ts_categories_users', 'ts_budgets.ts_category_user_id', '=', 'ts_categories_users.id')
            //->where('ts_budgets.user_id', $user->id)
            //->where('ts_budgets.type_move', $typeMove)
            //->select('ts_budgets.*');

        return $categoriesUser;
    }
}
