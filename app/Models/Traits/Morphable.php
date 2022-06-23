<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Relations\Relation;

use Exception;

trait Morphable
{
    /**
     * Translate morph class
     *
     * @param  string
     * @return string
     * @throws \Exception
     */
    public function translateMorphField($key)
    {
        $field = $this::MORPH_FIELD;
        if (!array_has($this->getAttributes(), $field)) {
            throw new Exception("Attribute [{$field}] does not exist");
        }
        return self::translateKey($this->$field);
    }

    /*
    |--------------------------------------------------------------------------
    | Static methods
    |--------------------------------------------------------------------------
    */

    /**
     * Translate morph key
     *
     * @param  string
     * @return string
     */
    public static function translateMorphKey($key)
    {
        return self::translateKey($key);
    }


    /*
    |--------------------------------------------------------------------------
    | Private methods
    |--------------------------------------------------------------------------
    */

    /**
     * Translate morph key
     *
     * @param  string  $key
     * @return string
     * @throws \Exception
     */
    private static function translateKey($key)
    {
        $map = Relation::morphMap();

        if (!array_has($map, $key)) {
            throw new Exception("[{$key}] does not exist on \Illuminate\Database\Eloquent\Relations\Relation::morphMap");
        }

        return $map[$key];
    }
}
