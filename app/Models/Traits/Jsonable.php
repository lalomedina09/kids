<?php

namespace App\Models\Traits;

use Exception;

trait Jsonable
{

    /**
     * Set a valid value on json column
     *
     * @param string $field
     * @param string $attr
     * @param mixed $value
     * @param boolean $save
     * @return boolean
     */
    public function setJsonAttribute($field, $attr, $value, $save=false)
    {
        $this->checkJsonColumn($field);

        if (!$this->checkJsonKey($field, $attr)) {
            return false;
        }

        $json = $this->$field;
        array_set($json, $attr, $value);
        $this->$field = $json;
        if ($save) {
            $this->save();
        }
        return true;
    }

    /**
     * Remove a key from json column
     *
     * @param string $field
     * @param string $attr
     * @param boolean $save
     * @return boolean
     */
    public function removeJsonAttribute($field, $attr, $save=false)
    {
        $this->checkJsonColumn($field);

        if (!$this->checkJsonKey($field, $attr)) {
            return false;
        }

        $json = $this->$field;
        array_forget($json, $attr);
        $this->$field = $json;
        if ($save) {
            $this->save();
        }
        return true;
    }

    /**
     * Get a valid value from json column
     *
     * @param string $field
     * @param string $attr
     * @return string
     */
    public function getJsonAttribute($field, $attr)
    {
        $this->checkJsonColumn($field);

        $json = $this->$field;
        return (array_has($json, $attr)) ? array_get($json, $attr) : null;
    }

    /**
     * Get a valid value from json column
     *
     * @param string $field
     * @param string $attr
     * @return string
     */
    public function hasJsonAttribute($field, $attr)
    {
        $this->checkJsonColumn($field);

        if (!$this->checkJsonKey($field, $attr)) {
            return false;
        }

        $json = $this->$field;
        return array_has($json, $attr);
    }

    /*
    |--------------------------------------------------------------------------
    | Private functions
    |--------------------------------------------------------------------------
    */

    /**
     * Check if model has the JSON column
     *
     * @param string $column
     * @return string
     */
    private function checkJsonColumn($column)
    {
        if (!array_has($this->getAttributes(), $column)) {
            throw new Exception("JSON column [{$column}] does not exist");
        }
    }

    /**
     * Check valid keys for json columns
     *
     * @param string $f
     * @return string
     */
    private function checkJsonKey($column, $key)
    {
        if (!array_has(self::VALID_JSON_KEYS, $column)) {
            return false;
        }

        if (!in_array($key, self::VALID_JSON_KEYS[$column])) {
            return false;
        }

        return true;
    }
}
