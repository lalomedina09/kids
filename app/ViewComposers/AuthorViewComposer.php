<?php

namespace App\ViewComposers;

use Illuminate\View\View;

use App\Models\User;

class AuthorViewComposer
{

    /**
     * Create a new profile composer.
     *
     * @return void
     */
    public function __construct() {}

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $authors = User::role('author')
            ->get()
            ->pluck('full_name', 'id');

        $view->with([
            'authors' => $authors
        ]);
    }
}
