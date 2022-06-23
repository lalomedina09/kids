<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\{ Category, Podcast };

class PodcastController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \App\Http\Resources\User
     */
    public function index()
    {
        $podcasts = Podcast::recent()
            ->paginate(12);

        return $podcasts->toJson();
    }

    /**
     * @param  \App\Models\Category  $category
     * @return \Illuminate\View\View
     */
    public function category(Category $category)
    {
        $podcasts = $category->podcasts()
            ->recent()
            ->paginate(12);

        return $podcasts->toJson();
    }
}
