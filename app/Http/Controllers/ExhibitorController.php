<?php

namespace App\Http\Controllers;

use Illuminate\Http\{Request, Response};
use QD\QDPlay\Models\Course;
use App\Models\User;

class ExhibitorController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $authors = User::role('exhibitor')->get();

        list($staff_authors, $guest_authors) = $authors->partition(function ($author) {
            return $author->hasRole('staff');
        });
        $staff_authors->shift();

        return view('exhibitors.index')->with([
            'staff_authors' => $staff_authors,
            'guest_authors' => $guest_authors
        ]);
    }

    public function show($key, Request $request)
    {
        $user = User::with(['articles' => function ($query) {
            $query->published()->latest('published_at');
        }])
            //->hasGuestProfile()
            ->HasGuestProfileExhibitor()
            ->byIdOrUsername($key)
            ->firstOrFail();
		
		$courses = Course::with('videos')->whereHas('videos', function($q) use ($user) {
			$q->whereHas('speakers', function($q2) use ($user) {
				$q2->where('user_id', $user->id);
			});
		})->get();
		
		foreach ($courses as $course) {
			$course->videos_length = intval($course->videos()->sum('length'));
			$course->students_count = 0;
			foreach ($course->videos as $video)
				$course->students_count += $video->views()->distinct()->count('user_id');
		}

        return view('exhibitors.show')->with([
            'user' => $user,
			'courses' => $courses
        ]);
    }
}
