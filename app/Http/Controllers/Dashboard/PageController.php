<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use Illuminate\Http\{ Request, Response };

use App\Http\Requests\Dashboard\Pages\{ StoreRequest, UpdateRequest };
use App\Models\Page;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        return view('dashboard.pages.index')->withPages($pages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.create')->with([
            'page' => new Page
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Dashboard\Pages\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $page = new Page;
        $page->title = $request->get('title');
        $page->body = $request->get('body');
        $page->auth = ($request->has('auth') && $request->get('auth'));
        $page->save();

        return redirect()->route('dashboard.pages.index')
            ->with('success', 'Se guardaron los cambios correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int|string  $page_id
     * @return \Illuminate\Http\Response
     */
    public function edit($page_id)
    {
        $page = Page::find($page_id);

        return view('dashboard.pages.edit')->withPage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int|string  $page_id
     * @param  \App\Http\Requests\Dashboard\Pages\UpdateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update($page_id, UpdateRequest $request)
    {
        $page = Page::find($page_id);
        $page->title = $request->get('title');
        $page->body = $request->get('body');
        $page->auth = ($request->has('auth') && $request->get('auth'));
        $page->save();

        return redirect()
            ->route('dashboard.pages.edit', $page->id)
            ->with('success', 'Se guardaron los cambios correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int|string  $page_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($page_id)
    {
        $page = Page::findOrFail($page_id);

        if (request()->exists('force')) {
            $course->forceDelete();

            return redirect()->back()->with('deleted', [
                'message' => 'La página se eliminó permanentemente.'
            ]);
        }

        $page->delete();

        return redirect()->back()->with('deleted', [
            'message' => 'La página se envió a la papelera.',
            'undo' => route('dashboard.pages.restore', $page_id),
        ]);
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  int|string  $page_id
     * @return \Illuminate\Http\Response
     */
    public function restore($page_id)
    {
        Page::withTrashed()
            ->findOrFail($page_id)
            ->restore();

        return redirect()->back()->with('success', 'Se restableció la ṕagina');
    }

    /**
     * Archive for the trashed elements.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $pages = Page::onlyTrashed()->get();

        return view('dashboard.pages.trashed')->with([
            'pages' => $pages
        ]);
    }
}
