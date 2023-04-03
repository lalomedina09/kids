<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\{Request, Response};
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\SaveQuizRequest;
use Illuminate\Support\Str;
use App\Models\Quiz;
use QD\QDPlay\Models\Course;

class QuizController extends Controller
{

    public function index() : View
    {
        $quizzes = Quiz::all();

        return view('dashboard.quizzes.quizzes.index', compact('quizzes'));
    }

    public function show($id)
    {
        $category = Quiz::where('id', $id)->first();

        return view('dashboard.quizzes.show')->with([
            'category' => $category
        ]);
    }

    public function create() : View
    {
        $quiz = new Quiz;
        $courses = Course::pluck('name', 'id')->toArray();

        return view('dashboard.quizzes.quizzes.create', compact('quiz', 'courses'));
    }

    public function store(SaveQuizRequest $request) : RedirectResponse
    {

        $course = Course::where('id', $request->course_id)->first();

        $quiz = new Quiz;
        $quiz->title = $request->title;
        $quiz->comments = $request->comments;
        $quiz->quizzesable_type = get_class($course);
        $quiz->quizzesable_id = $course->id;
        $quiz->save();

        return redirect()
            ->route('dashboard.quizzes.index')
            //->back()
            ->with('success', 'El quiz se creo correctamente');
    }
    /*
    public function edit($id) : View
    {
        $category = Quiz::findOrFail($id);
        $parent_id = $category->parent_id;
        $quizzes = Quiz::where('parent_id',2)->pluck('name', 'id')->toArray();

        return view('dashboard.quizzes.edit', compact('parent_id', 'category', 'quizzes'));
    }

    public function update($id, SaveCategoryRequest $request) : RedirectResponse
    {
        Quiz::find($id)->update($request->all());

        return redirect()
            ->route('dashboard.quizzes.show', $id)
            ->with('success', 'Se guardaron los cambios correctamente');
    }

    public function destroy($id) : RedirectResponse
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

    public function restore($id) : RedirectResponse
    {
        Quiz::withTrashed()->find($id)->restore();

        return redirect()
            ->route('dashboard.quizzes.trashed')
            ->with('success', 'Se restableció la categoría');
    }

    public function trashed() : View
    {
        $quizzes = Quiz::onlyTrashed()->latest('deleted_at')->get();
        #$videoquizzes = VideoCategory::onlyTrashed()->latest('deleted_at')->get();

        return view('dashboard.quizzes.trashed', compact('quizzes'));
    }

    public function searchCategorySlug($name)
    {
        $slug = Str::slug($name);
        $category = Quiz::where('slug', $slug)->first();

        return $data = ($category) ? true : false ;
    }

    public function searchSlug(Request $request)
    {
        $_slug = Str::slug($request->name);

        $searchSlug = Quiz::where('slug', $_slug)->first();
        $exist = ($searchSlug == $_slug) ? $_slug+'-' : $_slug ;

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
            $code = ($searchCode) ? $_code.'1' : $_code ;
        }else{
            $code = $_code;
        }

        return response()->json([
                'code' => Str::slug($code)
            ]);
    }
    */
    /*public function show_modal($id)
    {
        $product = Product::where('id', $id)->first();

        $view = view('templates.support.download-center.ajax.custom-licence.form', compact('product'))->render();
        return response()->json(['view' => $view]);
    }*/
}
