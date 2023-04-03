<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\{Request, Response};
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\SaveCategoryRequest;
use Illuminate\Support\Str;
use App\Models\Quiz;
use QD\QDPlay\Models\Course;

class FeedbackController extends Controller
{

    public function index(): View
    {
        #$quizzes = Quiz::where('parent_id', 2)->get();
        //$course = Course::where('id', 6)->first();
        #$course = Course::get();
        #dd($course);
        $quizzes = Quiz::all();
        //$className = get_class($course);
        //$className = get_class($faq->products()->get()->first());
        //dd($className);

        return view('dashboard.quizzes.index', compact('quizzes'));
    }

    public function show($id)
    {
        $category = Quiz::where('id', $id)->first();

        return view('dashboard.quizzes.show')->with([
            'category' => $category
        ]);
    }

    public function create($id): View
    {
        $category = new Quiz;
        $parent_id = $id;
        $quizzes = Quiz::where('parent_id', 2)->pluck('name', 'id')->toArray();
        /*
        $array = [
            'move' => 3,
            'description' => 'Actualizacion de url del articulo',
            'userlogsable_type' => get_class($article),
            'userlogsable_id' => $article->id,
        ];
        */

        return view('dashboard.quizzes.create', compact('parent_id', 'category', 'quizzes'));
    }

    public function store(SaveCategoryRequest $request): RedirectResponse
    {

        $category = new Quiz;
        $category->name = $request->name;
        $category->translate_en = $request->translate_en;
        $category->slug = $request->slug;
        $category->code = $request->code;
        $category->parent_id = $request->parent_id;
        $category->save();

        return redirect()
            ->route('dashboard.quizzes.index')
            ->with('success', 'La categoría se creo correctamente');
    }

    public function edit($id): View
    {
        $category = Quiz::findOrFail($id);
        $parent_id = $category->parent_id;
        $quizzes = Quiz::where('parent_id', 2)->pluck('name', 'id')->toArray();

        return view('dashboard.quizzes.edit', compact('parent_id', 'category', 'quizzes'));
    }

    public function update($id, SaveCategoryRequest $request): RedirectResponse
    {
        Quiz::find($id)->update($request->all());

        return redirect()
            ->route('dashboard.quizzes.show', $id)
            ->with('success', 'Se guardaron los cambios correctamente');
    }

    public function destroy($id): RedirectResponse
    {
        $category = Quiz::find($id);
        $category->delete();

        return redirect()
            ->route('dashboard.quizzes.index')
            ->with('deleted', [
                'message' => 'La categoría se envío a la papelera.',
                'undo' => route('dashboard.quizzes.restore', $id),
            ]);
    }

    public function restore($id): RedirectResponse
    {
        Quiz::withTrashed()->find($id)->restore();

        return redirect()
            ->route('dashboard.quizzes.trashed')
            ->with('success', 'Se restableció la categoría');
    }

    public function trashed(): View
    {
        $quizzes = Quiz::onlyTrashed()->latest('deleted_at')->get();
        #$videoquizzes = VideoCategory::onlyTrashed()->latest('deleted_at')->get();

        return view('dashboard.quizzes.trashed', compact('quizzes'));
    }

    public function searchCategorySlug($name)
    {
        $slug = Str::slug($name);
        $category = Quiz::where('slug', $slug)->first();

        return $data = ($category) ? true : false;
    }

    public function searchSlug(Request $request)
    {
        $_slug = Str::slug($request->name);

        $searchSlug = Quiz::where('slug', $_slug)->first();
        $exist = ($searchSlug == $_slug) ? $_slug + '-' : $_slug;

        return response()->json([
            'slug' => $_slug,
        ]);
    }

    public function searchCode(Request $request)
    {
        $_code = $request->code;
        $_action = $request->action;

        $searchCode = Quiz::where('code', $_code)->first();

        if ($_action != 'update') {
            $code = ($searchCode) ? $_code . '1' : $_code;
        } else {
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
