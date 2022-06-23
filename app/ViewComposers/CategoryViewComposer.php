<?php

namespace App\ViewComposers;

use Illuminate\View\View;

use App\Models\Category;

class CategoryViewComposer
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
        $view->with([
            'categories' => Category::get('main')
        ]);
    }
}
