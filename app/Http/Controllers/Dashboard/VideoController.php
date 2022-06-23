<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use Illuminate\Http\{ Request, Response };

use App\Http\Requests\Dashboard\Videos\{ PublishRequest, StoreRequest, UpdateRequest };
use App\Models\Video;
use App\Repositories\VideoRepository;

class VideoController extends Controller
{

    private $videos;

    /**
     * Create a new controller instance.
     *
     * @param  \App\Repositories\VideoRepository  $videos
     * @return void
     */
    public function __construct(VideoRepository $videos)
    {
        $this->videos = $videos;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.videos.index')->with([
            'videos' => $this->query()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.videos.create')->with([
            'video' => new Video,
            'categories' => Video::getCategories(),
            'tags' => collect([])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Dashboard\Videos\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $params = $request->all();
        $params['author_id'] = (array_has($params, 'author_id')) ? $params['author_id'] : $request->user()->id;
        $video = $this->videos->save($params);

        return redirect()
            ->route('dashboard.videos.edit', $video->id)
            ->with('success', 'El video se creo correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int|string  $video_id
     * @return \Illuminate\Http\Response
     */
    public function edit($video_id)
    {
        $video = $this->query()->findOrFail($video_id);
        return view('dashboard.videos.edit')->with([
            'video' => $video,
            'categories' => Video::getCategories(),
            'tags' => $video->getTags()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int|string  $video_id
     * @param  \App\Http\Requests\Dashboard\Videos\UpdateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update($video_id, UpdateRequest $request)
    {
        $video = $this->query()->findOrFail($video_id);

        $redirect = redirect()->route('dashboard.videos.edit', $video->id);

        if (!$request->user()->can('blog.videos.all') && $video->is_published) {
            return $redirect->with('warning', 'El contenido ha sido publicado y no es posible modificarlo hasta enviarlo a borrador');
        }

        $params = $request->all();
        $params['author_id'] = (array_has($params, 'author_id')) ? $params['author_id'] : $request->user()->id;
        $this->videos->save($params, $video);

        return $redirect->with('success', 'Se guardaron los cambios correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int|string  $video_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($video_id)
    {
        $video = $this->query()->withTrashed()->findOrFail($video_id);

        if (request()->exists('force')) {
            $video->forceDelete();

            return redirect()
                ->route('dashboard.videos.index')
                ->with('deleted', [
                    'message' => 'El video se eliminó permanentemente.'
                ]);
        }

        $video->delete();

        return redirect()
            ->route('dashboard.videos.index')
            ->with('deleted', [
                'message' => 'El video se envío a la papelera.',
                'undo' => route('dashboard.videos.restore', $video_id),
            ]);
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  int|string  $video_id
     * @return \Illuminate\Http\Response
     */
    public function restore($video_id)
    {
        $video = $this->query()->onlyTrashed()->findOrFail($video_id);
        $video->restore();

        return redirect()
            ->route('dashboard.videos.trashed')
            ->with('success', 'Se restableció el video');
    }

    /**
     * Archive for the trashed elements.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $videos = $this->query()->onlyTrashed()->latest('published_at')->get();

        return view('dashboard.videos.trashed')->withVideos($videos);
    }

    /**
     * Publish a video
     *
     * @param  int|string  $video_id
     * @param  \App\Http\Requests\Dashboard\Videos\PublishRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function publish($video_id, PublishRequest $request)
    {
        $redirect = redirect()->route('dashboard.videos.edit', [$video_id]);

        $video = $this->query()->findOrFail($video_id);
        $video->published_at = $request->get('published_at');
        $video->save();

        return $redirect->with('success', 'El video se publicó exitosamente');
    }

    /**
     * Unpublish a video
     *
     * @param  int|string  $video_id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function unpublish($video_id, Request $request)
    {
        $video = $this->query()->findOrFail($video_id);
        $video->published_at = null;
        $video->save();
        return redirect()
            ->route('dashboard.videos.edit', [$video->id])
            ->with('success', 'El video se envió a borrador');
    }

    /*
    |--------------------------------------------------------------------------
    | Private methods
    |--------------------------------------------------------------------------
    */

    private function query()
    {
        $user = request()->user();
        return ($user->can('blog.videos.all')) ? Video::query() : $user->videos();
    }
}
