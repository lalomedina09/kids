<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;
use App\Models\Category;

class ArticlesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $featured = Article::recent()
            ->select('id', 'title', 'slug', 'excerpt')
            ->take(3)
            ->get();

        $articles = Article::getCategories()
            ->each(function ($category) {
                $category->load(['articles' => function ($query) {
                    return $query->recent()
                        ->select('id', 'title', 'slug', 'author_id', 'published_at')
                        ->limit(12);
                }]);
            });

        return view('articles.index')->with([
            'articles' => $articles,
            'featured' => $featured
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function show($slug, Request $request)
    {
        $article = Article::published()
            ->whereSlug($slug)
            ->firstOrFail();

        $article->checkViewable();

        $related = Article::recommended($request->user())
            ->exclude($article)
            ->limit(3)
            ->get();

        $request->seoable = $article;
        return view('articles.show')->with([
            'article' => $article,
            'related' => $related
        ]);
    }

    /**
     * List articles by category
     *
     * @param  string  $slug
     * @return \Illuminate\View\View
     */
    public function byCategory($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $articles = $category->articles()
            ->select('id', 'title', 'slug', 'author_id', 'published_at')
            ->recent()
            ->get();

        return view('articles.categories')->with([
            'category' => $category,
            'articles' => $articles
        ]);
    }

    /**
     * List articles by tag
     *
     * @param  string  $slug
     * @return \Illuminate\View\View
     */
    public function byTag($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $articles = $category->tagged_articles()
            ->select('id', 'title', 'slug', 'author_id', 'published_at')
            ->recent()
            ->get();

        return view('articles.categories')->with([
            'category' => $category,
            'articles' => $articles
        ]);
    }
}
