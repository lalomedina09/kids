<?php

namespace App\Models\Traits;

use App\Helpers\InteractableCode;
use App\Helpers\Helpers;

trait Interactable
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
    public function getInteractableCodeAttribute() {
        $hashid = $this->hashid;
        $type = self::MORPH_CLASS;
        $timestamp = Helpers::getMicrotime();
        return InteractableCode::encode([$hashid, $type, $timestamp]);
    }
}