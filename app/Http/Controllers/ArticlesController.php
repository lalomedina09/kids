<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\Article;
use App\Models\Bookmark;
use App\Models\Like;
use App\Models\Category;
use Carbon\Carbon;
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
    public function show($slug, Request $request)
    {
        $article = Article::published()
            ->whereSlug($slug)
            ->where('site', env('SITE_ARTICLES', "queridodinero.com"))
            ->firstOrFail();

        $article->checkViewable();

        $related = Article::recommended(Auth::user())
            ->exclude($article)
            ->where('site', env('SITE_ARTICLES', "queridodinero.com"))
            ->orderBy('id', 'desc')
            ->limit(3)
            ->get();
        //dd($related);
        $request->seoable = $article;
        $advertisingStatus = $this->advertisingStatus($article);

        $topTags = $this->getCategoriesTop();

        $user = $request->user();
        $isBookmarked = $user ? $user->bookmarks()->where('bookmarkable_type', 'article')->where('bookmarkable_id', $article->id)->exists() : false;
        $isLiked = $user ? $user->likes()->where('likeable_type', 'article')->where('likeable_id', $article->id)->exists() : false;

        return view('v2.home.blog.articles.show')->with([
            'article' => $article,
            'related' => $related,
            'advertisingStatus' => $advertisingStatus,
            'topTags' => $topTags,
            'isBookmarked' => $isBookmarked,
            'isLiked' => $isLiked
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

    public function advertisingStatus($article)
    {
        $advertising = $article->advertising;

        // Retorna false si no hay publicidad o si las fechas no están en el rango
        return $advertising && Carbon::now()->between($advertising->published_at, $advertising->published_at_expired);
    }

    public function getCategoriesTop()
    {
        // Obtener 8 IDs de categorías aleatorias con conteo
        $categoryStats = DB::table('categorizables')
            ->select('category_id', DB::raw('COUNT(*) AS repetition_count'))
            ->where('categorizable_type', 'article')
            ->groupBy('category_id')
            ->orderByRaw('RAND()')
            ->limit(8)
            ->get()
            ->pluck('repetition_count', 'category_id') // Array con category_id => repetition_count
            ->toArray();

        $categoryIds = array_keys($categoryStats);

        $topCategories = Category::whereIn('id', $categoryIds)
            ->select('slug', 'name') // Seleccionar solo slug y name
            ->get()
            ->toArray(); // Convertir a array

        return $topCategories;
    }

    public function bookmark(Request $request, Article $article)
    {
        //dd($article);
        $user = $request->user();
        $bookmark = Bookmark::where('user_id', $user->id)
            ->where('bookmarkable_type', "article")
            ->where('bookmarkable_id', $article->id)
            ->first();

        if ($bookmark) {
            $bookmark->delete();
            return response()->json(['message' => 'Artículo eliminado de guardados']);
        } else {
            $bookmark = new Bookmark();
            $bookmark->bookmarkable_id = $article->id;
            $bookmark->bookmarkable_type = "article";
            $bookmark->user_id = $user->id;
            $bookmark->save();
            return response()->json(['message' => 'Artículo guardado']);
        }
    }

    public function like(Request $request, Article $article)
    {
        $user = $request->user();

        // Validate that the user is authenticated
        if (!$user) {
            return response()->json(['message' => 'User not authenticated'], 401);
        }

        // Check if a "like" already exists for this article by this user
        $like = Like::where('user_id', $user->id)
            ->where('likeable_type', "article")
            ->where('likeable_id', $article->id)
            ->first();
        dd($like, $article->id, $user->id);
        try {
            if ($like) {
                $like->delete();
                return response()->json(['message' => 'Me gusta eliminado']);
            } else {
                $like = new Like();
                $like->likeable_id = $article->id;
                $like->likeable_type = 'article';
                $like->user_id = $user->id;
                $like->save();
                return response()->json(['message' => 'Me gusta agregado']);
            }
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['message' => 'Error al procesar la solicitud'], 500);
        }
    }
}
