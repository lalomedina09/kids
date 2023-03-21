<?php

namespace App\Models;

use App\Models\Traits\Presentable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\hasOne;
//use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
class CompanyRole extends Model
{
    use Presentable;

    protected $fillable = [
        'name',
        'type'
    ];

    protected $dates = [
        'updated_at', 'deleted_at'
    ];

    protected $guarded = [
        'id', 'company_id', 'branch_id', 'user_id'
    ];
    //protected $presenter = Presenters\ContactPresenter::class;

    public function company()
    {
        // 'foreign_key' , 'local_key'
        return $this->hasOne(Company::class, 'id', 'company_id');
    }

    public function branch()
    {
        // 'foreign_key' , 'local_key'
        return $this->hasOne(Branch::class, 'id', 'branch_id');
    }

    public function user()
    {
        // 'foreign_key' , 'local_key'
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
