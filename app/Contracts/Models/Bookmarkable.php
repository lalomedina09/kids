<?php

namespace App\Contracts\Models;

interface Bookmarkable
{

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */

    /**
     * Generate a interactable code
     *
     * @return string
     */
    public function getInteractableCodeAttribute();

}
