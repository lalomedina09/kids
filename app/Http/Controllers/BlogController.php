<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\{Request, Response};

use App\Models\{Article, Category};
use QD\QDPlay\Models\Course;

class BlogController extends Controller
{

    public function blog(Request $request)
    {
        $this->saveAgent($request);
        $randomCourses = Course::whereNotNull('thumbnail')->inRandomOrder()->limit(2)->get();


        $latestArticle = Article::published()->latest()->where('site', env('SITE_ARTICLES', "queridodinero.com"))->first();
        $previousArticles = Article::published()->where('id', '!=', $latestArticle->id)
            ->latest()
            ->where('site', env('SITE_ARTICLES', "queridodinero.com"))
            ->limit(2)->get();

        $recents = Article::recent()->whereNotNull('published_at')->where('site', env('SITE_ARTICLES', "queridodinero.com"))->take(6)->get();
        $trendings = Article::trending()->whereNotNull('published_at')->where('site', env('SITE_ARTICLES', "queridodinero.com"))->take(6)->get();
        $mostViewedArticles = $this->mostViewedArticles(6);
        $seasonalArticles = $this->seasonalArticles(6);

        // Pasar la información a la vista
        return view('v2.home.blog.index')->with([
            'randomCourses' => $randomCourses,
            'latestArticle' => $latestArticle,
            'previousArticles' => $previousArticles,
            'recents' => $recents,
            'trendings' => $trendings,
            'mostViewedArticles' => $mostViewedArticles,
            'seasonalArticles' => $seasonalArticles,
            'categories' => Article::getCategories(),
            'selectedCategory' => null,
            'words' => null,
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Buscar artículos que coincidan con el término de búsqueda
        $results = Article::where('site', env('SITE_ARTICLES', "queridodinero.com"))
            ->whereNotNull('published_at')
            ->where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('title', 'LIKE', "%{$query}%")
                    ->orWhere('excerpt', 'LIKE', "%{$query}%");
            })
            ->limit(20)
            ->get(['id', 'title', 'slug']);

        return response()->json($results);
    }

    public function getByTag($tag, Request $request)
    {
        $this->saveAgent($request);
        $articleIds = [];
        $category = Category::where('slug', $request->slug)->first();

        if ($category) {
            $categoryId = $category->id;
            $this->getCategorizables($categoryId);
        }

        $articlesQuery = Article::where('site', env('SITE_ARTICLES', "queridodinero.com"))
            ->whereNotNull('published_at')
            ->latest()
            ->limit(100);
        if (!empty($articleIds)) {
            $articlesQuery->whereIn('id', $articleIds);
        }

        $articles = $articlesQuery->get();

        //dd('llego aqui');
        return view('v2.home.blog.results')->with([
            'category' => $category,
            'words' => null,
            'articles' => $articles,
            'categories' => Article::getCategories(),
            'selectedCategory' => $tag, // Agregar la categoría seleccionada
        ]);

    }
    public function getByWord($word, Request $request)
    {
        $this->saveAgent($request);
        $articlesQuery = Article::where('site', env('SITE_ARTICLES', "queridodinero.com"))
            ->whereNotNull('published_at')
            ->latest()
            ->limit(100);
        $words = null;
        switch ($word) {
            case 'recent':
                $words = "Lo más reciente";
                $articlesQuery->recent();
                break;
            case 'trending':
                $words = "Trending";
                $articlesQuery->trending();
                break;
            case 'vieweds':
                $words = "Lo más leído";
                $articlesQuery->orderBy('views_count', 'desc');
                break;
            case 'seasonal':
                $words = "De temporada";
                $articlesQuery->where(function ($query) {
                    $query->whereMonth('published_at', now()->subMonth()->month)
                        ->orWhereMonth('published_at', now()->month)
                        ->orWhereMonth('published_at', now()->addMonth()->month);
                })
                ->whereYear('published_at', '<', now()->year);
                break;
            default:
                // Handle default case if needed
                break;
        }

        return view('v2.home.blog.results')->with([
            'category' => null,
            'words' => $words,
            'articles' => $articlesQuery->get(),
            'categories' => Article::getCategories(),
            'selectedCategory' => null, // Agregar la categoría seleccionada
        ]);
    }

    public function searchFull(Request $request)
    {
        $this->saveAgent($request);
        $articleIds = [];
        $category = Category::where('slug', $request->slug)->first();

        if ($category) {
            $categoryId = $category->id;
            $this->getCategorizables($categoryId);
        }

        $articlesQuery = Article::where('site', env('SITE_ARTICLES', "queridodinero.com"))
            ->whereNotNull('published_at')
            ->where(function ($query) use ($request) {
            $query->where('title', 'LIKE', "%{$request->words}%")
                ->orWhere('excerpt', 'LIKE', "%{$request->words}%");
            })
            ->latest()
            ->limit(100);

        if (!empty($articleIds)) {
            $articlesQuery->whereIn('id', $articleIds);
        }

        $articles = $articlesQuery->get();


        return view('v2.home.blog.results')->with([
            'category' => $category,
            'words' => $request->words,
            'articles' => $articles,
            'categories' => Article::getCategories(),
            'selectedCategory' => $request->slug, // Agregar la categoría seleccionada
        ]);
    }

    public function seasonalArticles($limit)
    {

        $result = Article::published()
            ->where('site', env('SITE_ARTICLES', "queridodinero.com"))
            ->whereNotNull('published_at')
            ->where(function ($query) {
                $query->whereMonth('published_at', now()->subMonth()->month)
                    ->orWhereMonth('published_at', now()->month)
                    ->orWhereMonth('published_at', now()->addMonth()->month);
            })
            ->whereYear('published_at', '<', now()->year)
            ->latest()
            ->limit($limit)
            ->get();

        return $result;
    }

    public function mostViewedArticles($limit){
        $result = Article::published()
            ->where('site', env('SITE_ARTICLES', "queridodinero.com"))
            ->orderBy('views_count', 'desc')
            ->whereNotNull('published_at')
            ->limit($limit)
            ->get();

        return $result;
    }

    public function saveAgent($request)
    {
        $user = $request->user();
        // Save userAgent
        $request = request();
        $user_id = ($user) ? $user->id : null;
        $userAgent = Controller::detectAgent($request, $request->url());
        $saveUserAgent = Controller::saveUserAgent($userAgent, $user_id);
        // End Save UserAgent
    }

    public function getCategorizables($categoryId)
    {
        $articleIds = DB::table('categorizables')
            ->where('category_id', $categoryId)
            ->where('categorizable_type', "App\Models\Article")
            ->orderBy('categorizable_id', 'desc')
            ->limit(100)
            ->pluck('categorizable_id')
            ->toArray();

        return $articleIds;
    }
}
