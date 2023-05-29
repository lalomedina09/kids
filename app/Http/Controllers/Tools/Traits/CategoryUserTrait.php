<?php

namespace App\Http\Controllers\Tools\Traits;

use App\Models\TsCategoryUser;

trait CategoryUserTrait
{
    public static function create($category, $user, $request)
    {
        $categoryUser = new TsCategoryUser;
        $categoryUser->name = $request->name;
        $categoryUser->percent = $request->percent;
        $categoryUser->ts_category_id = $category->parent_id;
        $categoryUser->user_id = $user->id;

        $categoryUser->save();
        return $categoryUser;
        //Ojo -> ver si hago una funcion exlusiva para esto o buscar la forma de solucionar este bug
        //Comment = ($category->parent_id) ? $category->parent_id : $category->id
    }

    public static function createForForm($category, $user, $request)
    {
        $categoryUser = new TsCategoryUser;
        $categoryUser->name = $request->name;
        $categoryUser->percent = $request->percent;
        $categoryUser->ts_category_id = $category->id;
        $categoryUser->user_id = $user->id;

        $categoryUser->save();
        return $categoryUser;
        //Ojo -> ver si hago una funcion exlusiva para esto o buscar la forma de solucionar este bug
        //Comment = ($category->parent_id) ? $category->parent_id : $category->id
    }

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
}
