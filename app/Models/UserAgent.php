<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

//use Kalnoy\Nestedset\NodeTrait;

class UserAgent extends Model
{

    //use SoftDeletes;
    //use NodeTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_agents';

    //protected $fillable = ['user_id', 'source'];
    protected $fillable = [
        'user_id',
        'user_agent',
        'platform',
        'platform_version',
        'browser',
        'browser_version',
        'is_mobile',
        'is_tablet',
        'is_desktop',
        'is_robot',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
