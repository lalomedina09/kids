<?php

namespace App\Models;

use App\Models\Traits\Presentable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, hasOne, hasMany};
//use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlayCartItem extends Model
{
    use Presentable, SoftDeletes;

    protected $table = 'play_cart_items';

    protected $fillable = [
        'id', 'cart_id', 'item'
    ];

    protected $dates = [
        'updated_at', 'deleted_at'
    ];

    protected $guarded = [
        'id', 'cart_id'
    ];

    public function cart()
    {
        // 'foreign_key' , 'local_key'
        return $this->hasOne(PlayCart::class, 'id', 'cart_id');
    }

}
