<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\{Request, Response};
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Dashboard\Articles\AdvertisingRequest;
use Illuminate\Support\Str;
use App\Models\Article;
use App\Models\ArticleAdvertising;

class ArticleAdvertisingController extends Controller
{

    public function show($id): View
    {
        $advertising = ArticleAdvertising::where('article_id', $id)->first();
        $article = Article::where('id', $id)->first();
        $user = request()->user();

        return view('dashboard.articles.advertising.show')->with([
            'advertising' => $advertising,
            'article' => $article,
            'user' => $user,
        ]);
    }

    public function store(AdvertisingRequest $request): RedirectResponse
    {
        $advertising = ArticleAdvertising::create($request->validated());
        $this->storeImgCover($advertising);

        return redirect()
            ->route('dashboard.articles.advertising.show', $advertising->article_id)
            ->with('success', 'La publicidad se dio de alta correctamente');
    }

    public function update(AdvertisingRequest $request): RedirectResponse
    {
        $advertising = ArticleAdvertising::findOrFail(request('id'));
        $advertising->update($request->validated());
        $this->storeImgCover($advertising);

        return redirect()
            ->route('dashboard.articles.advertising.show', $advertising->article_id)
            ->with('success', 'La publicidad se actualizo correctamente');
    }

    protected function storeImgCover(ArticleAdvertising $advertising)
    {
        if (request()->has('cover_desktop')) {
            $advertising->update([
                'cover_desktop' => request()->cover_desktop->store('qdp_articles_covers_desktop', 'public')
            ]);
        }

        if (request()->has('cover_movil')) {
            $advertising->update([
                'cover_movil' => request()->cover_movil->store('qdp_articles_covers_movil', 'public')
            ]);
        }
    }

}
