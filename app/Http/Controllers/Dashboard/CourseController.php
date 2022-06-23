<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use Illuminate\Http\{ Request, Response };

use App\Http\Requests\Dashboard\Courses\{ PublishRequest, StoreRequest, UpdateRequest };
use App\Models\{ Course, Speaker };
use App\Repositories\CourseRepository;

class CourseController extends Controller
{

    private $courses;

    /**
     * Create a new controller instance.
     *
     * @param  \App\Repositories\CourseRepository  $courses
     * @return void
     */
    public function __construct(CourseRepository $courses)
    {
        $this->courses = $courses;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.courses.index')->with([
            'courses' => Course::latest('published_at')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.courses.create')->with([
            'course' => new Course,
            'categories' => Course::getCategories()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Dashboard\Courses\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $params =$request->all();
        $course = $this->courses->save($params);

        return redirect()
            ->route('dashboard.courses.edit', $course->id)
            ->with('success', 'El curso se creo correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int|string  $course_id
     * @return \Illuminate\Http\Response
     */
    public function edit($course_id)
    {
        $course = Course::findOrFail($course_id);
        return view('dashboard.courses.edit')->with([
            'course' => $course,
            'categories' => Course::getCategories(),
            'contents' => $course->content,
            'extras' => $course->extra,
            'speakers' => Speaker::all(),
            'contacts' => $course->contacts
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int|string  $course_id
     * @param  \App\Http\Requests\Dashboard\Courses\UpdateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update($course_id, UpdateRequest $request)
    {
        $course = Course::findOrFail($course_id);
        $params =$request->all();
        $this->courses->save($params, $course);

        return redirect()
            ->route('dashboard.courses.edit', $course->id)
            ->with('success', 'Se guardaron los cambios correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int|string  $course_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($course_id)
    {
        $course = Course::withTrashed()->findOrFail($course_id);

        if (request()->exists('force')) {
            $course->forceDelete();

            return redirect()->back()->with('deleted', [
                'message' => 'El curso se eliminó permanentemente.'
            ]);
        }

        $course->delete();

        return redirect()->back()->with('deleted', [
            'message' => 'El curso se envío a la papelera.',
            'undo' => route('dashboard.courses.restore', $course_id),
        ]);
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  int|string  $course_id
     * @return \Illuminate\Http\Response
     */
    public function restore($course_id)
    {
        Course::withTrashed()->findOrFail($course_id)->restore();

        return redirect()->back()->with('success', 'Se restableció el curso');
    }

    /**
     * Archive for the trashed elements.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $courses = Course::onlyTrashed()->latest('published_at')->get();

        return view('dashboard.courses.trashed')->withCourses($courses);
    }

    /**
     * Publish a course
     *
     * @param  int|string  $course_id
     * @param  \App\Http\Requests\Dashboard\Courses\PublishRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function publish($course_id, PublishRequest $request)
    {
        $redirect = redirect()->route('dashboard.courses.edit', [$course_id]);

        $course = Course::findOrFail($course_id);
        $course->published_at = $request->get('published_at');
        $course->save();

        return $redirect->with('success', 'El curso se publicó exitosamente');
    }

    /**
     * Unpublish a course
     *
     * @param  int|string  $course_id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function unpublish($course_id, Request $request)
    {
        $course = Course::findOrFail($course_id);
        $course->published_at = null;
        $course->save();
        return redirect()
            ->route('dashboard.courses.edit', [$course->id])
            ->with('success', 'El curso se envió a borrador');
    }
}
