<?php

namespace App\Models;

use App\Models\Traits\Presentable;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\Relations\MorphTo;

class Company extends Model
{
    use Presentable;

    protected $fillable = [
        'name'
    ];

    protected $dates = [
        'updated_at', 'deleted_at'
    ];

    protected $guarded = [
        'id', 'user_id'
    ];
    //protected $presenter = Presenters\ContactPresenter::class;

}

