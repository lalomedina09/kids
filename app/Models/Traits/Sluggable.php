<?php

namespace App\Models\Traits;

use RuntimeException;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

trait Sluggable
{
    /**
     * Boot the sluggable trait for a model.
     *
     * @return void
     */
    public static function bootSluggable()
    {
        static::creating(function (Model $model) {
            $model->setSlug();
        });

        static::updating(function (Model $model) {
            if ($model->slugIsMutable()) {
                $model->setSlug();
            }
        });
    }

    /**
     * Add the slug to the model.
     *
     * @return void
     */
    protected function setSlug()
    {
        $this->guardAgainstInvalidSlugOptions();

        $slug = $this->generateUniqueSlug();

        $this->setAttribute($this->saveSlugTo(), $slug);
    }

    /**
     * Generate a non unique slug for this record.
     *
     * @return string
     */
    public function generateSlug() : string
    {
        return Str::slug($this->getAttribute($this->generateSlugFrom()));
    }

    /**
     * Make the given slug unique.
     *
     * @return string
     */
    public function generateUniqueSlug() : string
    {
        $suffix = 1;
        $slug = $this->generateSlug();

        while ($this->otherRecordHasSlug($slug)) {
            $slug = "{$slug}-{$suffix}";
            $suffix++;
        }

        return $slug;
    }

    /**
     * Determine if a record exists with the given slug.
     *
     * @param  string  $slug
     * @return bool
     */
    protected function otherRecordHasSlug(string $slug) : bool
    {
        $query = static::where($this->saveSlugTo(), $slug)
            ->where($this->getKeyName(), '!=', $this->getKey() ?? '0')
            ->withoutGlobalScopes();

        // include trashed models if required
        if ($this->usesSoftDeleting()) {
            $query = $query->withTrashed();
        }

        return (bool) $query->exists();
    }

    /**
     * This function will throw an exception when any of the options is missing or invalid.
     */
    protected function guardAgainstInvalidSlugOptions()
    {
        if (! $this->generateSlugFrom()) {
            throw new RuntimeException('Missing slug option [build_from]');
        }

        if (! $this->saveSlugTo()) {
            throw new RuntimeException('Missing slug option [save_to]');
        }
    }

    /**
     * @return mixed
     */
    public function generateSlugFrom()
    {
        return $this->sluggable['build_from'];
    }

    /**
     * @return mixed
     */
    public function saveSlugTo()
    {
        return $this->sluggable['save_to'];
    }

    /**
     * @return mixed
     */
    public function slugIsMutable()
    {
        return (array_has($this->sluggable, 'mutable') && $this->sluggable['mutable']);
    }

    /**
     * Does this model use softDeleting.
     *
     * @return bool
     */
    protected function usesSoftDeleting()
    {
        return method_exists($this, 'BootSoftDeletes');
    }

    /**
     * Find a user by unique id or username metadata
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function scopeByIdOrSlug($query, $key)
    {
        return $query->where('id', $key)->orWhere('slug', $key);
    }
}
