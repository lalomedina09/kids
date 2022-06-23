<?php

namespace App\Http\Controllers;

use Illuminate\Http\{ Request, Response };

use App\Models\User;

class AuthorController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $authors = User::role('author')->get();

        list($staff_authors, $guest_authors) = $authors->partition(function ($author) {
            return $author->hasRole('staff');
        });
        $staff_authors->shift();

        return view('authors.index')->with([
            'staff_authors' => $staff_authors,
            'guest_authors' => $guest_authors
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int|string  $key
     * @return \Illuminate\Http\Response
     */
    public function show($key, Request $request)
    {
        $user = User::with(['articles' => function ($query) {
                $query->published()->latest('published_at');
            }])
            ->hasGuestProfile()
            ->byIdOrUsername($key)
            ->firstOrFail();

        return view('authors.show')->with([
            'user' => $user
        ]);
    }
}
