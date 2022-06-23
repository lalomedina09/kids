<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Contracts\Models\Metadata;

use Exception;

class UserMetadata extends Model
                   implements Metadata
{

   /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_metadata';

    /**
     * The attributes that are guarded.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'scope', 'key', 'value'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer'
    ];

    /**
     * Set if model must update timestamps
     *
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Valid metadata keys for user
     *
     * @var array
     */
    const VALID_METADATA = [
        'blog' => [
            'gender', 'birthdate', 'phone', 'state',
            'username', 'job', 'bio', 'video',
            'facebook', 'twitter', 'instagram', 'youtube', 'skype', 'whatsapp',
            'education', 'profession', 'certifications', 'specialization', 'premium',
            'clabe',
            'tax_name','tax_number','tax_address','tax_address_number','tax_zipcode','tax_settlement'
        ]
    ];

    /**
     * The meta attributes should be casted to native types
     *
     * @var array
     */
    const META_CASTS = [
        'birthdate' => 'date',
        'education' => 'array',
        'profession' => 'array',
        'premium' => 'boolean'
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
