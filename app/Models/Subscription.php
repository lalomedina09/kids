<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = ['user_id', 'stripe_id', 'stripe_status', 'stripe_price', 'ends_at'];
}
