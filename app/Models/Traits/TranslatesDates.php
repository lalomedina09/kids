<?php

namespace App\Models\Traits;

use Jenssegers\Date\Date;

trait TranslatesDates
{
    /**
     * Return a timestamp as a \Jenssegers\Date\Date object.
     *
     * @override \Illuminate\Database\Eloquent\Model
     *
     * @param  mixed  $value
     * @return \Jenssegers\Date\Date
     */
    protected function asDateTime($value)
    {
        return new Date(parent::asDateTime($value));
    }
}
