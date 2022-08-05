<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\{Request, Response};
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\SaveCategoryRequest;
use Illuminate\Support\Str;
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
        $category = Category::where('id', $id)->first();

        return view('dashboard.categories.show')->with([
            'category' => $category
        ]);
    }

    public function create($id) : View
    {
        $category = new Category;
        $parent_id = $id;
        $categories = Category::where('parent_id',2)->pluck('name', 'id')->toArray();

        return view('dashboard.categories.create', compact('parent_id', 'category', 'categories'));
    }

    public function store(SaveCategoryRequest $request) : RedirectResponse
    {

        $category = new Category;
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->code = $request->code;
        $category->parent_id = $request->parent_id;
        $category->save();

        return redirect()
            ->route('dashboard.categories.index')
            ->with('success', 'La categoría se creo correctamente');
    }

    public function edit($id) : View
    {
        $category = Category::findOrFail($id);
        $parent_id = $category->parent_id;
        $categories = Category::where('parent_id',2)->pluck('name', 'id')->toArray();

        return view('dashboard.categories.edit', compact('parent_id', 'category', 'categories'));
    }

    public function update($id, SaveCategoryRequest $request) : RedirectResponse
    {
        Category::find($id)->update($request->all());

        return redirect()
            ->route('dashboard.categories.show', $id)
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
        #$videoCategories = VideoCategory::onlyTrashed()->latest('deleted_at')->get();

        return view('dashboard.categories.trashed', compact('categories'));
    }

    public function searchCategorySlug($name)
    {
        $slug = Str::slug($name);
        $category = Category::where('slug', $slug)->first();

        return $data = ($category) ? true : false ;
    }

    public function searchSlug(Request $request)
    {
        $_slug = Str::slug($request->name);

        $searchSlug = Category::where('slug', $_slug)->first();
        $exist = ($searchSlug == $_slug) ? $_slug+'-' : $_slug ;

        return response()->json([
                'slug' => $_slug,
            ]);
    }

    public function searchCode(Request $request)
    {
        $_code = $request->code;
        $_action = $request->action;

        $searchCode = Category::where('code', $_code)->first();

        if ($_action != 'update') {
            $code = ($searchCode) ? $_code.'1' : $_code ;
        }else{
            $code = $_code;
        }

        return response()->json([
                'code' => Str::slug($code)
            ]);
    }

    /*public function show_modal($id)
    {
        $product = Product::where('id', $id)->first();

        $view = view('templates.support.download-center.ajax.custom-licence.form', compact('product'))->render();
        return response()->json(['view' => $view]);
    }*/
}
