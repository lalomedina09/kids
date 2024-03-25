<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Article;
use App\Models\Category;

class ArticlesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $user = $request->user();
        // Save userAgent
        $request = request();
        $user_id = ($user) ? $user->id : null;
        $userAgent = Controller::detectAgent($request, $request->url());
        $saveUserAgent = Controller::saveUserAgent($userAgent, $user_id);
        // End Save UserAgent

        $featured = Article::recent()
            ->select('id', 'title', 'slug', 'excerpt')
            ->where('site', env('SITE_ARTICLES', "queridodinero.com"))
            ->take(3)
            ->get();

        $articles = Article::getCategories()
            ->each(function ($category) {
                $category->load(['articles' => function ($query) {
                    return $query->recent()
                        ->select('id', 'title', 'slug', 'author_id', 'published_at', 'updated_at')
                        ->where('site', env('SITE_ARTICLES', "queridodinero.com"))
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
    public function show($slug)
    {
        // Verificar si hay un usuario autenticado
        /*if (Auth::check()) {
            $user = Auth::user();
            $user_id = $user->id;
        } else {
            $user_id = null;
        }*/

        // Save userAgent
        $request = request();
        /*
        if ($request) {
            $userAgent = Controller::detectAgent($request, $request->url());
            $saveUserAgent = Controller::saveUserAgent($userAgent, $user_id);
        }*/
        // End Save UserAgent

        $article = Article::published()
            ->whereSlug($slug)
            ->where('site', env('SITE_ARTICLES', "queridodinero.com"))
            ->firstOrFail();

        $article->checkViewable();

        $related = Article::recommended(Auth::user())
            ->exclude($article)
            ->where('site', env('SITE_ARTICLES', "queridodinero.com"))
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
    public function byCategory($slug, Request $request)
    {
        $user = $request->user();
        // Save userAgent
        $request = request();
        $user_id = ($user) ? $user->id : null;
        $userAgent = Controller::detectAgent($request, $request->url());
        $saveUserAgent = Controller::saveUserAgent($userAgent, $user_id);
        // End Save UserAgent
        $category = Category::where('slug', $slug)->firstOrFail();

        $articles = $category->articles()
            ->select('id', 'title', 'slug', 'author_id', 'published_at', 'updated_at')
            ->where('site', env('SITE_ARTICLES', "queridodinero.com"))
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
    public function byTag($slug, Request $request)
    {
        $user = $request->user();
        // Save userAgent
        $request = request();
        $user_id = ($user) ? $user->id : null;
        $userAgent = Controller::detectAgent($request, $request->url());
        $saveUserAgent = Controller::saveUserAgent($userAgent, $user_id);
        // End Save UserAgent

        $category = Category::where('slug', $slug)->firstOrFail();

        $articles = $category->tagged_articles()
            ->select('id', 'title', 'slug', 'author_id', 'published_at', 'updated_at')
            ->where('site', env('SITE_ARTICLES', "queridodinero.com"))
            ->recent()
            ->get();

        return view('articles.categories')->with([
            'category' => $category,
            'articles' => $articles
        ]);
    }
}
