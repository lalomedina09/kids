<?php

namespace App\Contracts\Models;

interface Rateable
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
