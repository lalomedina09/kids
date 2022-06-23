<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

use App\Http\Requests\SaveSpeakerRequest;
use App\Models\Speaker;

class SpeakerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index() : View
    {
        $speakers = Speaker::with('courses')->get();

        return view('dashboard.speakers.index')->withSpeakers($speakers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() : View
    {
        $speaker = new Speaker;

        return view('dashboard.speakers.create')->withSpeaker($speaker);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\SaveSpeakerRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SaveSpeakerRequest $request) : RedirectResponse
    {
        $speaker = Speaker::create($request->all());

        if ($request->hasFile('featured_image')) {
            $speaker->saveFeaturedImage($request->file('featured_image'));
        }

        return redirect()
            ->route('dashboard.speakers.index')
            ->with('success', 'El expositor se creo correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id) : View
    {
        $speaker = Speaker::find($id);

        return view('dashboard.speakers.edit')->withSpeaker($speaker);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param  \App\Http\Requests\SaveSpeakerRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, SaveSpeakerRequest $request) : RedirectResponse
    {
        $speaker = Speaker::find($id);

        $speaker->update($request->all());

        if ($request->hasFile('featured_image')) {
            $speaker->saveFeaturedImage($request->file('featured_image'));
        }

        return redirect()
            ->route('dashboard.speakers.edit', $speaker->id)
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
        $speaker = Speaker::withTrashed()->find($id);

        if (request()->exists('force')) {
            $speaker->forceDelete();

            return redirect()
                ->route('dashboard.speakers.trashed')
                ->with('deleted', [
                    'message' => 'El expositor se eliminó permanentemente.'
                ]);
        }

        $speaker->delete();

        return redirect()
            ->route('dashboard.speakers.index')
            ->with('deleted', [
                'message' => 'El expositor se envío a la papelera.',
                'undo' => route('dashboard.speakers.restore', $id),
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
        Speaker::withTrashed()->find($id)->restore();

        return redirect()
            ->route('dashboard.speakers.trashed')
            ->with('success', 'Se restableció el expositor');
    }

    /**
     * Archive for the trashed elements.
     *
     * @return \Illuminate\View\View
     */
    public function trashed() : View
    {
        $speakers = Speaker::onlyTrashed()->with('courses')->latest('deleted_at')->get();

        return view('dashboard.speakers.trashed')->withSpeakers($speakers);
    }
}
