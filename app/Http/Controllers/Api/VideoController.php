<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\{ Category, Video };
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \App\Http\Resources\User
     */
    public function index()
    {
        $videos = Video::recent()
            ->paginate(12);

        return $videos->toJson();
    }

    /**
     * @param  \App\Models\Category  $category
     * @return \Illuminate\View\View
     */
    public function category(Category $category)
    {
        $videos = $category->videos()
            ->recent()
            ->paginate(12);

        return $videos->toJson();
    }
}
