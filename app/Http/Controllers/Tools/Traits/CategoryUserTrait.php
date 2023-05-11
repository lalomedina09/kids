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
        //Comment = ($category->parent_id) ? $category->parent_id : $category->id
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
