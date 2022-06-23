<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use Illuminate\Http\{ Request, Response };

use App\Http\Requests\Dashboard\Podcasts\{ PublishRequest, StoreRequest, UpdateRequest };
use App\Models\Podcast;
use App\Repositories\PodcastRepository;

class PodcastController extends Controller
{

    private $podcasts;

    /**
     * Create a new controller instance.
     *
     * @param  \App\Repositories\PodcastRepository  $podcasts
     * @return void
     */
    public function __construct(PodcastRepository $podcasts)
    {
        $this->podcasts = $podcasts;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.podcasts.index')->with([
            'podcasts' => $this->query()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.podcasts.create')->with([
            'podcast' => new Podcast,
            'categories' => Podcast::getCategories(),
            'tags' => collect([])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Dashboard\Podcasts\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $params = $request->all();
        $params['author_id'] = (array_has($params, 'author_id')) ? $params['author_id'] : $request->user()->id;
        $podcast = $this->podcasts->save($params);

        return redirect()
            ->route('dashboard.podcasts.edit', $podcast->id)
            ->with('success', 'El podcast se creo correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int|string  $podcast_id
     * @return \Illuminate\Http\Response
     */
    public function edit($podcast_id)
    {
        $podcast = $this->query()->findOrFail($podcast_id);
        return view('dashboard.podcasts.edit')->with([
            'podcast' => $podcast,
            'categories' => Podcast::getCategories(),
            'tags' => $podcast->getTags()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int|string  $podcast_id
     * @param  \App\Http\Requests\Dashboard\Podcasts\UpdateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update($podcast_id, UpdateRequest $request)
    {
        $podcast = $this->query()->findOrFail($podcast_id);

        $redirect = redirect()->route('dashboard.podcasts.edit', $podcast->id);

        if (!$request->user()->can('blog.podcasts.all') && $podcast->is_published) {
            return $redirect->with('warning', 'El contenido ha sido publicado y no es posible modificarlo hasta enviarlo a borrador');
        }

        $params = $request->all();
        $params['author_id'] = (array_has($params, 'author_id')) ? $params['author_id'] : $request->user()->id;
        $this->podcasts->save($params, $podcast);

        return $redirect->with('success', 'Se guardaron los cambios correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int|string  $podcast_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($podcast_id)
    {
        $podcast = $this->query()->withTrashed()->findOrFail($podcast_id);

        if (request()->exists('force')) {
            $podcast->forceDelete();

            return redirect()
                ->route('dashboard.podcasts.index')
                ->with('deleted', [
                    'message' => 'El podcast se eliminó permanentemente.'
                ]);
        }

        $podcast->delete();

        return redirect()
            ->route('dashboard.podcasts.index')
            ->with('deleted', [
                'message' => 'El podcast se envío a la papelera.',
                'undo' => route('dashboard.podcasts.restore', $podcast_id),
            ]);
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  int|string  $podcast_id
     * @return \Illuminate\Http\Response
     */
    public function restore($podcast_id)
    {
        $podcast = $this->query()->onlyTrashed()->findOrFail($podcast_id);
        $podcast->restore();

        return redirect()
            ->route('dashboard.podcasts.trashed')
            ->with('success', 'Se restableció el podcast');
    }

    /**
     * Archive for the trashed elements.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $podcasts = $this->query()->onlyTrashed()->latest('published_at')->get();

        return view('dashboard.podcasts.trashed')->withPodcasts($podcasts);
    }

    /**
     * Publish a podcast
     *
     * @param  int|string  $podcast_id
     * @param  \App\Http\Requests\Dashboard\Podcasts\PublishRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function publish($podcast_id, PublishRequest $request)
    {
        $redirect = redirect()->route('dashboard.podcasts.edit', [$podcast->id]);

        $podcast = $this->query()->findOrFail($podcast_id);
        $podcast->published_at = $request->get('published_at');
        $podcast->save();

        return $redirect->with('success', 'El podcast se publicó exitosamente');
    }

    /**
     * Unpublish a podcast
     *
     * @param  int|string  $podcast_id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function unpublish($podcast_id, Request $request)
    {
        $podcast = $this->query()->findOrFail($podcast_id);
        $podcast->published_at = null;
        $podcast->save();
        return redirect()
            ->route('dashboard.podcasts.edit', [$podcast->id])
            ->with('success', 'El podcast se envió a borrador');
    }

    /*
    |--------------------------------------------------------------------------
    | Private methods
    |--------------------------------------------------------------------------
    */

    private function query()
    {
        $user = request()->user();
        return ($user->can('blog.podcasts.all')) ? Podcast::query() : $user->podcasts();
    }
}
