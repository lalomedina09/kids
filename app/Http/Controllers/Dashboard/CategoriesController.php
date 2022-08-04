<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\SaveCategoryRequest;
#use App\Models\{ Category, VideoCategory };
use App\Models\Category;

class CategoriesController extends Controller
{

    public function index() : View
    {
        $categories = Category::where('parent_id', 2)->get();

        return view('dashboard.categories.index', compact('categories'));
    }

    public function show($id)
    {
        $category = Category::where('parent_id', $id)->first();

        return view('dashboard.categories.show')->with([
            'category' => $category
        ]);
    }

    public function create() : View
    {
        $category = new Category;

        return view('dashboard.categories.create', compact('category'));
    }

    public function store(SaveCategoryRequest $request) : RedirectResponse
    {
        $category = Category::create($request->all());

        return redirect()
            ->route('dashboard.categories.index')
            ->with('success', 'La categoría se creo correctamente');
    }

    public function edit($id) : View
    {
        $category = Category::find($id);

        return view('dashboard.categories.edit', compact('category'));
    }

    public function update($id, SaveCategoryRequest $request) : RedirectResponse
    {
        Category::find($id)->update($request->all());

        return redirect()
            ->route('dashboard.categories.edit', $id)
            ->with('success', 'Se guardaron los cambios correctamente');
    }

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

    public function restore($id) : RedirectResponse
    {
        Category::withTrashed()->find($id)->restore();

        return redirect()
            ->route('dashboard.categories.trashed')
            ->with('success', 'Se restableció la categoría');
    }

    public function trashed() : View
    {
        $categories = Category::onlyTrashed()->latest('deleted_at')->get();
        $videoCategories = VideoCategory::onlyTrashed()->latest('deleted_at')->get();

        return view('dashboard.categories.trashed', compact('categories', 'videoCategories'));
    }
}
