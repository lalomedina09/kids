<?php

namespace App\Support\Html;

use Illuminate\Support\Facades\Facade;

class LinkFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'link';
    }
}
