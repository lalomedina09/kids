<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, MorphTo};
use Illuminate\Database\Eloquent\SoftDeletes;

//use App\Contracts\Models\Bookmarkable;
//use App\Helpers\InteractableCode;
use App\Models\Traits\Morphable;

use Exception;

class Address extends Model
{

    use Morphable, SoftDeletes;

    protected $table = 'addresses';

    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'name', 'street', 'int_number', 'ext_number', 'zone', 'code',
        'city', 'state', 'country', 'references', 'comments', '',
    ];

    protected $hidden = [
        'deleted_at', 'created_at', 'updated_at'
    ];

    protected $dates = [
        'deleted_at', 'created_at', 'updated_at'
    ];

    protected $casts = [
        'user_id' => 'integer',
        'adressable_id' => 'integer'
    ];

    protected $with = [
        'adressable'
    ];

    const MORPH_FIELD = 'adressable_type';

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * @return Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function addressable()
    {
        return $this->morphTo();
    }

    /**
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
