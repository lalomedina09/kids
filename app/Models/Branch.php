<?php

namespace App\Models;

use App\Models\Traits\Presentable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, hasOne, hasMany};
//use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
class Branch extends Model
{
    use Presentable, SoftDeletes;

    protected $fillable = [
        'name'
    ];

    protected $dates = [
        'updated_at', 'deleted_at'
    ];

    protected $guarded = [
        'id', 'company_id', 'user_id'
    ];
    //protected $presenter = Presenters\ContactPresenter::class;

    public function company()
    {
        // 'foreign_key' , 'local_key'
        return $this->hasOne(Company::class, 'id', 'company_id');
    }

    public function user()
    {
        // 'foreign_key' , 'local_key'
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
