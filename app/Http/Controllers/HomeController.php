<?php

namespace App\Http\Controllers;

use Illuminate\Http\{ Request, Response };

use App\Models\{ Article, Cover, Podcast, Quote, Video };

use QD\Advice\Models\Advice;

class HomeController extends Controller
{

    /**
     * For testing
     */
    public function test(Request $request)
    {
        return redirect()->route('home');
    }

    /**
     * Main page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $advice_categories = Advice::getCategories()
            ->map(function ($category, $key) {
                $category->load('advisors');
                return $category;
            })
            ->filter(function ($category, $key) {
                return !$category->advisors->isEmpty();
            });
        return view('qd:advice::advisors.index')->with([
            'categories' => $advice_categories
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function blog(Request $request)
    {
        $covers = Cover::shown()->get()->take(6);

        foreach(collect(range(1,6))->diff($covers->pluck('position')->toArray())->values()->all() as $newPosition) {
            $covers->push(Cover::make(['position' => $newPosition]));
        }

        $covers = $covers->sort(function ($cover1, $cover2) {
            return $cover1->position < $cover2->position ? -1 : 1;
        });

        return view('home.index')->with([
            'recommended' => Article::recommended($request->user())->where('site', env('SITE_ARTICLES', "queridodinero.com"))->take(15)->get(),
            'trending' => Article::trending()->where('site', env('SITE_ARTICLES', "queridodinero.com"))->take(6)->get(),
            'latest' => Article::recent()->where('site', env('SITE_ARTICLES', "queridodinero.com"))->take(9)->get(),
            'radio' => Podcast::recent()->take(9)->get(),
            'videos' => Video::recent()->take(9)->get(),
            'covers' => $covers,
            'quote' => Quote::latest()->first(),
        ]);
    }

    /**
     * Resolve old wordpress routes
     *
     * @param  string  $slug
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function resolve($slug, Request $request)
    {
        if ($article = Article::where('slug', $slug)->first()) {
            return redirect()->route('articles.show', [$article]);
        }

        if ($podcast = Podcast::where('slug', $slug)->first()) {
            return redirect()->route('podcasts.show', [$slug]);
        }

        if ($video = Video::where('slug', $slug)->first()) {
            return redirect()->route('videos.show', [$slug]);
        }

        abort(Response::HTTP_NOT_FOUND);
    }
}
