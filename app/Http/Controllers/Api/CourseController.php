<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\Category as Category;

class CourseController extends Controller
{
    /**
     * @param  \App\Models\Category  $category
     * @return \Illuminate\View\View
     */
    public function category(Category $category)
    {
        $courses = $category->courses()
            ->recent()
            ->paginate(4);

        return $courses->toJson();
    }
}
