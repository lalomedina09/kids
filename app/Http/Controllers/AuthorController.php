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
        $authorsDearMoney = [14933, 16419, 15557, 16132, 28044, 20183, 15558, 14903, 15206, 15059, 14971, 15109, 15228, 15564, 15559, 15558];
        $authors = User::role('author')->whereNotIn('users.id', $authorsDearMoney)->get();

        list($staff_authors, $guest_authors) = $authors->partition(function ($author) {
            return $author->hasRole('staff');
        });
        $staff_authors->shift();

        return view('authors.index')->with([
            'staff_authors' => $staff_authors,
            'guest_authors' => $guest_authors
        ]);
    }

    //Exclusivo para los escritores
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
