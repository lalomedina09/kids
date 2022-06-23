<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Podcast;

class PodcastsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $featured = Podcast::recent()
            ->take(3)
            ->get();

        $podcasts = Podcast::recent()->get();

        $categories = Podcast::getCategories();

        return view('podcasts.index', [
            'featured' => $featured,
            'podcasts'=> $podcasts,
            'categories' => $categories
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
        $podcast = Podcast::published()
            ->whereSlug($slug)
            ->firstOrFail();

        $podcast->checkViewable();

        $popular = Podcast::recommended($request->user())
            ->exclude($podcast)
            ->take(3)
            ->get();

        $request->seoable = $podcast;
        return view('podcasts.show', [
            'podcast' => $podcast,
            'popular' => $popular,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  string  $slug
     * @return \Illuminate\View\View
     */
    public function byCategory($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $categories = Podcast::getCategories();

        $podcasts = $category->podcasts()->recent()->get();

        return view('podcasts.categories', [
            'podcasts'=> $podcasts,
            'categories' => $categories,
            'page' => $category->slug,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  string  $slug
     * @return \Illuminate\View\View
     */
    public function byTag($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $categories = Podcast::getCategories();

        $podcasts = $category->tagged_podcasts()->recent()->get();

        return view('podcasts.categories', [
            'podcasts'=> $podcasts,
            'categories' => $categories,
            'page' => $category->slug,
        ]);
    }
}
