<?php

namespace App\Models;

use App\Models\Traits\Presentable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, hasOne, hasMany};
//use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlayOrder extends Model
{
    use Presentable, SoftDeletes;

    protected $table = 'play_orders';

    protected $fillable = [
        'id', 'user_id', 'total', 'status'
    ];

    protected $dates = [
        'updated_at', 'deleted_at'
    ];

    protected $guarded = [
        'id', 'user_id'
    ];

    public function user()
    {
        // 'foreign_key' , 'local_key'
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function items()
    {
        return $this->hasMany(PlayOrderItem::class, 'order_id');
    }

    public function payment()
    {
        return $this->hasOne(PlayPayment::class, 'user_id', 'user_id');
    }
}
