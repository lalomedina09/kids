<?php

namespace App\Contracts\Models;

interface Likeable
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
