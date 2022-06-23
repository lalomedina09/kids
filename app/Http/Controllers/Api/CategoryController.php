<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use \Illuminate\Http\{ Request, Response };

use App\Helpers\Helpers;
use App\Models\Category;

use Exception;

class CategoryController extends Controller
{

    /**
     * Returns a JSON with root categories
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $root_category = Category::first();
        $root_children = $root_category->children()->get();
        $categories = (!$root_children->isEmpty()) ? $root_children->toArray() : [];
        return Helpers::makeJsonResponse(Response::HTTP_OK, $data=$categories);
    }

    /**
     * Returns a JSON with the requested category
     *
     * @param int|string $category_id
     * @return \Illuminate\Http\Response
     */
    public function show($category_id) {
        $category = Category::descendantsAndSelf($category_id)->toTree()->first();
        if (!$category instanceof Category) {
            return Helpers::makeJsonResponse(Response::HTTP_NOT_FOUND, $data=[]);
        }
        return Helpers::makeJsonResponse(Response::HTTP_OK, $data=$category);
    }
}
