<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use Illuminate\Http\{ Request, Response };

use App\Http\Requests\Dashboard\Articles\{ PublishRequest, StoreRequest, UpdateRequest };
use App\Models\Article;
use App\Repositories\ArticleRepository;

class ArticleController extends Controller
{

    private $articles;

    /**
     * Create a new controller instance.
     *
     * @param  \App\Repositories\ArticleRepository  $articles
     * @return void
     */
    public function __construct(ArticleRepository $articles)
    {
        $this->articles = $articles;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = $this->query()
            ->select('id', 'title', 'slug', 'author_id', 'published_at')
            ->without(['media'])
            ->get();
        return view('dashboard.articles.index')->with([
            'articles' => $articles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.articles.create')->with([
            'article' => new Article,
            'categories' => Article::getCategories(),
            'tags' => collect([])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Dashboard\Articles\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $params = $request->all();
        $params['author_id'] = (array_has($params, 'author_id')) ? $params['author_id'] : $request->user()->id;
        $article = $this->articles->save($params);

        return redirect()
            ->route('dashboard.articles.edit', [$article->id])
            ->with('success', 'El artículo se creo correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int|string  $article_id
     * @return \Illuminate\Http\Response
     */
    public function edit($article_id)
    {
        $article = $this->query()->findOrFail($article_id);
        return view('dashboard.articles.edit')->with([
            'article' => $article,
            'categories' => Article::getCategories(),
            'tags' => $article->getTags()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int|string  $article_id
     * @param  \App\Http\Requests\Dashboard\Articles\UpdateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update($article_id, UpdateRequest $request)
    {
        $article = $this->query()->findOrFail($article_id);

        $redirect = redirect()->route('dashboard.articles.edit', $article->id);
        if (!$request->user()->can('blog.articles.all') && $article->is_published) {
            return $redirect->with('warning', 'El contenido ha sido publicado y no es posible modificarlo hasta enviarlo a borrador');
        }

        $params = $request->all();
        $params['author_id'] = (array_has($params, 'author_id')) ? $params['author_id'] : $request->user()->id;
        $this->articles->save($params, $article);

        return $redirect->with('success', 'Se guardaron los cambios correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int|string  $article_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($article_id)
    {
        $article = $this->query()->withTrashed()->findOrFail($article_id);

        if (request()->exists('force')) {
            $article->forceDelete();

            return redirect()
                ->route('dashboard.articles.trashed')
                ->with('deleted', [
                    'message' => 'El artículo se eliminó permanentemente.'
                ]);
        }

        $article->delete();

        return redirect()
            ->route('dashboard.articles.index')
            ->with('deleted', [
                'message' => 'El artículo se envío a la papelera.',
                'undo' => route('dashboard.articles.restore', $article_id),
            ]);
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  int|string  $article_id
     * @return \Illuminate\Http\Response
     */
    public function restore($article_id)
    {
        $article = $this->query()->onlyTrashed()->findOrFail($article_id);
        $article->restore();

        return redirect()
            ->route('dashboard.articles.trashed')
            ->with('success', 'Se restableció el artículo');
    }

    /**
     * Archive for the trashed elements.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $articles = $this->query()->onlyTrashed()->latest('deleted_at')->get();

        return view('dashboard.articles.trashed')->withArticles($articles);
    }

    /**
     * Publish an article
     *
     * @param  int|string  $article_id
     * @param  \App\Http\Requests\Dashboard\Articles\PublishRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function publish($article_id, PublishRequest $request)
    {
        $article = $this->query()->findOrFail($article_id);
        $redirect = redirect()->route('dashboard.articles.edit', [$article->id]);

        $article->published_at = $request->get('published_at');
        $article->save();

        return $redirect->with('success', 'El artículo se publicó exitosamente');
    }

    /**
     * Unpublish an article
     *
     * @param  int|string  $article_id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function unpublish($article_id, Request $request)
    {
        $article = $this->query()->findOrFail($article_id);
        $article->published_at = null;
        $article->save();
        return redirect()
            ->route('dashboard.articles.edit', [$article->id])
            ->with('success', 'El artículo se envió a borrador');
    }

    /*
    |--------------------------------------------------------------------------
    | Private methods
    |--------------------------------------------------------------------------
    */

    private function query()
    {
        $user = request()->user();
        return ($user->can('blog.articles.all')) ? Article::query() : $user->articles();
    }
}
