<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{ Category, Course, Podcast, Search, Video };

class SearchController extends Controller
{

    /**
     * Create new resource instance
     *
     */
    public function __construct() {}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search_query = ($request->input('q', '')) ?: '';
        $search_category = ($request->filled('c')) ? $request->input('c') : null;

        $articles_by_category_closure = function ($query) use ($search_query) {
            $query->recent()
                ->fullTextSearch($search_query);
        };

        $category_closure = function ($category_query) use ($search_category) {
            $category_query->where('slug', $search_category);
        };

        $search_category_closure = function ($query, $search_category) use ($category_closure) {
            $query->whereHas('categories', $category_closure);
        };

        $articles = Category::whereHas('articles', $articles_by_category_closure)
            ->with(['articles' => $articles_by_category_closure])
            ->when($search_category, $category_closure)
            ->get();

        $podcasts = Podcast::when($search_category, $search_category_closure)
            ->recent()
            ->fullTextSearch($search_query)
            ->get();

        $videos = Video::when($search_category, $search_category_closure)
            ->recent()
            ->fullTextSearch($search_query)
            ->get();

        $courses = Course::fullTextSearch($search_query)
            ->get();

        return view('search.index')->with([
            'search' => [
                'q' => $search_query,
                'c' => $search_category
            ],
            'articles' => $articles,
            'videos' => $videos,
            'podcasts' => $podcasts,
            'courses' => $courses
        ]);
    }
}
