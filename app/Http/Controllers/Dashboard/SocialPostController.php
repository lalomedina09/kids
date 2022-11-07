<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\SocialPost\{StoreRequest, UpdateRequest};
use App\Models\SocialPost;

class SocialPostController extends Controller
{
    //
    public function index()
    {
        $posts = SocialPost::orderBy('id', 'desc')->get();

        return view('dashboard.social-post.index')->with([
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('dashboard.social-post.create')->with([
            'socialPost' => new SocialPost
        ]);
    }

    public function store(StoreRequest $request)
    {
        $params = $request->all();

        $sp = new SocialPost();
        $sp->red_social = $request->red_social;
        $sp->type = $request->type;
        $sp->code = $request->code;
        $sp->site = $request->site;
        $sp->description = $request->description;
        $sp->save();

        return redirect()
            ->route('dashboard.social-post.index')
            ->with('success', 'El post se creo correctamente');
    }

    public function edit($id)
    {
        $socialPost = SocialPost::findOrFail($id);
        return view('dashboard.social-post.edit')->with([
            'socialPost' => $socialPost,
        ]);
    }

    public function update($id, UpdateRequest $request)
    {
        $sp = SocialPost::findOrFail($id);

        $sp->red_social = $request->red_social;
        $sp->type = $request->type;
        $sp->code = $request->code;
        $sp->site = $request->site;
        $sp->description = $request->description;
        $sp->save();

        return redirect()
        ->route('dashboard.social-post.index')
        ->with('success', 'El post se actualizo correctamente');

    }
}
