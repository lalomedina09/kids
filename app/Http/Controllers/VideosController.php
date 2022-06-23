<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Video;

class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $featured = Video::recent()
            ->take(3)
            ->get();

        $videos = Video::recent()->get();

        $categories = Video::getCategories();

        return view('videos.index', [
            'featured' => $featured,
            'videos'=> $videos,
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
        $video = Video::published()
            ->whereSlug($slug)
            ->firstOrFail();

        $video->checkViewable();

        $popular = Video::recommended($request->user())
            ->exclude($video)
            ->take(3)
            ->get();

        $request->seoable = $video;
        return view('videos.show', [
            'video' => $video,
            'popular' => $popular,
            'type' => 'videos'
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
        $categories = Video::getCategories();

        $videos = $category->videos()->recent()->get();

        return view('videos.categories', [
            'videos'=> $videos,
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
        $categories = Video::getCategories();

        $videos = $category->tagged_videos()->recent()->get();

        return view('videos.categories', [
            'videos'=> $videos,
            'categories' => $categories,
            'page' => $category->slug,
        ]);
    }
}
