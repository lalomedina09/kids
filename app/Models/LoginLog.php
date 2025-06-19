<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

//use Kalnoy\Nestedset\NodeTrait;

class LoginLog extends Model
{

    //use SoftDeletes;
    //use NodeTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'login_logs';

    protected $fillable = ['user_id', 'source', 'channel'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
