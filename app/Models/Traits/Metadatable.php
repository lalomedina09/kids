<?php

namespace App\Models\Traits;

use App\Contracts\Models\Metadata;

trait Metadatable
{

    use Formatable, Metacastable;

    /*
    |--------------------------------------------------------------------------
    | Public function
    |--------------------------------------------------------------------------
    */

    /**
     * Set metadata value
     *
     * @param  string  $scope
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $formatable
     * @return boolean
     */
    public function setMeta($scope, $key, $value, $formatable=[])
    {
        if (!array_has($this->meta_class::VALID_METADATA, $scope)) {
            return false;
        }

        $valid_keys = array_flatten($this->meta_class::VALID_METADATA);
        if (!in_array($key, $valid_keys)) {
            return false;
        }

        $value = $this->format($value, $formatable); // Formatable Trait
        $value = $this->applyMetaCast($key, $value);

        $meta = ($this->hasMeta($scope, $key)) ? $this->retrieveMeta($scope, $key) : new $this->meta_class;
        $meta->scope = $scope;
        $meta->key = $key;
        $meta->value = $value;
        $meta->user_id = $this->getKey();
        $meta->save();

        return true;
    }

    /**
     * Get metadata value
     *
     * @param  string  $scope
     * @param  string  $key
     * @param  array  $formatable
     * @return mixed
     */
    public function getMeta($scope, $key, $formatable=[])
    {
        if (!$this->hasMeta($scope, $key)) {
            return null;
        }

        $value = optional($this->retrieveMeta($scope, $key))->value;
        return ($this->hasMetaCast($key)) ? $this->metaCast($key, $value) : $this->format($value, $formatable); // Metacastable, Formatable
    }

    /**
     * Has metadata value
     *
     * @param  string  $scope
     * @param  string  $key
     * @return boolean
     */
    public function hasMeta($scope, $key)
    {
        return $this->evalMeta($scope, $key);//($this->retrieveMeta($scope, $key) instanceof Metadata);
    }

    /**
     * Evaluate metadata value as boolean
     *
     * @param  string  $scope
     * @param  string  $key
     * @return boolean
     */
    public function evalMeta($scope, $key)
    {
        return !!(optional($this->retrieveMeta($scope, $key))->value);
    }

    /*
    |--------------------------------------------------------------------------
    | Private functions
    |--------------------------------------------------------------------------
    */

    /**
     * Retrieve metadata value
     *
     * @param  string  $scope
     * @param  string  $key
     * @return \App\Contracts\Models\Metadata
     */
    private function retrieveMeta($scope, $key)
    {
        return $this->metadata
            ->where('scope', $scope)
            ->where('key', $key)
            ->first();
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function metadata()
    {
        return $this->hasMany($this->meta_class);
    }
}
