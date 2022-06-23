<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\SaveCategoryRequest;
use App\Models\{ Category, VideoCategory };

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index() : View
    {
        $categories = Category::get();
        $videoCategories = VideoCategory::get();

        return view('dashboard.categories.index', compact('categories', 'videoCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() : View
    {
        $category = new Category;

        return view('dashboard.categories.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\SaveCategoryRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SaveCategoryRequest $request) : RedirectResponse
    {
        $category = Category::create($request->all());

        return redirect()
            ->route('dashboard.categories.index')
            ->with('success', 'La categoría se creo correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id) : View
    {
        $category = Category::find($id);

        return view('dashboard.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param  \App\Http\Requests\SaveCategoryRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, SaveCategoryRequest $request) : RedirectResponse
    {
        Category::find($id)->update($request->all());

        return redirect()
            ->route('dashboard.categories.edit', $id)
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
        $category = Category::find($id);

        $category->delete();

        return redirect()
            ->route('dashboard.categories.index')
            ->with('deleted', [
                'message' => 'La categoría se envío a la papelera.',
                'undo' => route('dashboard.categories.restore', $id),
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
        Category::withTrashed()->find($id)->restore();

        return redirect()
            ->route('dashboard.categories.trashed')
            ->with('success', 'Se restableció la categoría');
    }

    /**
     * Archive for the trashed elements.
     *
     * @return \Illuminate\View\View
     */
    public function trashed() : View
    {
        $categories = Category::onlyTrashed()->latest('deleted_at')->get();
        $videoCategories = VideoCategory::onlyTrashed()->latest('deleted_at')->get();

        return view('dashboard.categories.trashed', compact('categories', 'videoCategories'));
    }
}
