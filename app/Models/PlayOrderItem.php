<?php

namespace App\Models;

use App\Models\Traits\Presentable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, hasOne, hasMany};
//use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlayOrderItem extends Model
{
    use Presentable, SoftDeletes;

    protected $table = 'play_order_items';

    protected $fillable = [
        'id', 'order_id', 'item',
        'item_type','item_id','type', 'price'
    ];

    protected $dates = [
        'updated_at', 'deleted_at'
    ];

    protected $guarded = [
        'id', 'order_id'
    ];

    public function order()
    {
        // 'foreign_key' , 'local_key'
        return $this->hasOne(PlayOrder::class, 'id', 'order_id');
    }
}
