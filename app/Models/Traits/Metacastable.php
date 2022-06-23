<?php

namespace App\Models\Traits;

use Illuminate\Support\Collection;

use Date;
use DateTimeInterface;

trait Metacastable
{

    /**
     * Determine whether an attribute should be cast to a native type.
     *
     * @param  string  $key
     * @param  array|string|null  $types
     * @return bool
     */
    public function hasMetaCast($key, $types = null)
    {
        if (array_key_exists($key, $this->getMetaCasts())) {
            return $types ? in_array($this->getMetaCastType($key), (array) $types, true) : true;
        }

        return false;
    }

    /**
     * Get the casts array.
     *
     * @return array
     */
    public function getMetaCasts()
    {
        return $this->meta_class::META_CASTS;
    }

    /**
     * Get the type of cast for a model meta attribute.
     *
     * @param  string  $key
     * @return string
     */
    protected function getMetaCastType($key)
    {
        if ($this->isCustomDateTimeCast($this->getMetaCasts()[$key])) {
            return 'custom_datetime';
        }

        if ($this->isDecimalCast($this->getMetaCasts()[$key])) {
            return 'decimal';
        }

        return trim(strtolower($this->getMetaCasts()[$key]));
    }

    /**
     * Cast an attribute to a native PHP type.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return mixed
     */
    protected function metacast($key, $value)
    {
        if (is_null($value)) {
            return $value;
        }

        switch ($this->getMetaCastType($key)) {
            case 'int':
            case 'integer':
                return (int) $value;
            case 'real':
            case 'float':
            case 'double':
                return $this->fromFloat($value);
            case 'decimal':
                return $this->asDecimal($value, explode(':', $this->getCasts()[$key], 2)[1]);
            case 'string':
                return (string) $value;
            case 'bool':
            case 'boolean':
                return (bool) $value;
            case 'object':
                return $this->fromJson($value, true);
            case 'array':
            case 'json':
                return $this->fromJson($value);
            case 'collection':
                return collect($this->fromJson($value));
            case 'date':
                return $this->asDate($value);
            case 'datetime':
            case 'custom_datetime':
                return $this->asDateTime($value);
            case 'timestamp':
                return $this->asTimestamp($value);
            default:
                return $value;
        }
    }

    /**
     * Cast an attribute from native PHP types.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return mixed
     */
    protected function applyMetaCast($key, $value)
    {
        if (is_null($value)) {
            return $value;
        }

        if (!$this->hasMetaCast($key)) {
            return $value;
        }

        switch ($this->getMetaCastType($key)) {
            case 'object':
            case 'array':
            case 'json':
                return $this->asJson($value);
            case 'collection':
                return $value->toJson();
            default:
                return $value;
        }
    }
}
