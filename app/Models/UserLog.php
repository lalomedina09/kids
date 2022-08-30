<?php

namespace App\Models;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserLog extends Model
{
    //
    //
    use SoftDeletes;


    protected $table = 'user_logs';

    protected $guarded = [
        'id', 'user_id'
    ];

    protected $fillable = [
        'move', 'description'
    ];

    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    public const MOVES = [
        1 => 'Crear',
        2 => 'Read',
        3 => 'Update',
        4 => 'Delete',
        5 => 'Reactivate',
    ];

    public function userlogs()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
