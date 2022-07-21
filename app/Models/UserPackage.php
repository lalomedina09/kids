<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#use Illuminate\Database\Eloquent\Relations\{HasMany, BelongsTo, BelongsToMany, MorphMany};
class UserPackage extends Model
{
    //
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_packages';

    /**
     * The attributes that are guarded.
     *
     * @var array
     */
    protected $guarded = [
        'id', 'user_id', 'order_id'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    public static function orderpaid()
    {
        #dd('ueueueueueueu');
        #return $this->hasMany(Order::class);
        #return $this->hasMany(Order::class);
        #return self::hasMany('App\Models\Order', 'order_id', 'id');
        #->where('status', 'order.paid')
        #    ->orderby('id', 'desc');
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    public static function getPriceRating($data_field = 'code', $data_key)
    {
        return self::where('code', 'price-rating')
            ->first();
    }


}
