<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

use App\Http\Requests\SaveCoverRequest;
use App\Models\{ Cover, Category };

class CoversController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index() : View
    {
        $shown = Cover::shown()->orderBy('position')->get();
        $hidden = Cover::hidden()->get();

        return view('dashboard.covers.index')->with(compact('shown', 'hidden'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() : View
    {
        $cover = new Cover;
        $categories = Category::all();

        return view('dashboard.covers.create', compact('cover', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\SaveCoverRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SaveCoverRequest $request) : RedirectResponse
    {
        $cover = new Cover($request->all());
        $cover->save();

        if ($request->hasFile('featured_image')) {
            $cover->saveFeaturedImage($request->file('featured_image'));
        }

        return redirect()
            ->route('dashboard.covers.index')
            ->with('success', 'La cubierta se creo correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id) : View
    {
        $cover = Cover::find($id);
        $categories = Category::all();

        return view('dashboard.covers.edit', compact('cover', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param  \App\Http\Requests\SaveCoverRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, SaveCoverRequest $request) : RedirectResponse
    {
        //optional(Cover::findByPosition($request->position))->removePosition();

        $cover = Cover::find($id);
        $old_cover = Cover::findByPosition($request->position);
        if ($old_cover instanceof Cover && !($old_cover->getKey() === $cover->getKey())) {
            $old_cover->removePosition();
        }

        $cover->title = ($request->title) ?: null;
        $cover->position = ($request->position) ?: $cover->position;
        $cover->url = ($request->link) ?: null;
        $cover->color = ($request->color) ?: $cover->color;
        $cover->save();
        //$cover->update($request->all());

        if ($request->hasFile('featured_image')) {
            $cover->saveFeaturedImage($request->file('featured_image'));
        }

        return redirect()
            ->route('dashboard.covers.edit', $cover->id)
            ->with('success', 'Se guardaron los cambios correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id) : RedirectResponse
    {
        $cover = Cover::withTrashed()->find($id);

        if (request()->exists('force')) {
            $cover->forceDelete();

            return redirect()
                ->route('dashboard.covers.trashed')
                ->with('deleted', [
                    'message' => 'La cubierta se eliminó permanentemente.'
                ]);
        }

        $cover->delete();

        return redirect()
            ->route('dashboard.covers.index')
            ->with('deleted', [
                'message' => 'La cubierta se envío a la papelera.',
                'undo' => route('dashboard.covers.restore', $id),
            ]);
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id) : RedirectResponse
    {
        Cover::withTrashed()->find($id)->restore();

        return redirect()
            ->route('dashboard.covers.trashed')
            ->with('success', 'Se restableció la cubierta');
    }

    /**
     * Archive for the trashed elements.
     *
     * @return \Illuminate\View\View
     */
    public function trashed() : View
    {
        $covers = Cover::onlyTrashed()->latest('deleted_at')->get();

        return view('dashboard.covers.trashed')->withCovers($covers);
    }
}
