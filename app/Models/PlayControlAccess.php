<?php

namespace App\Models;

use App\Models\Traits\Presentable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlayControlAccess extends Model
{
    use Presentable, SoftDeletes;
    protected $table = 'play_control_access';

    protected $casts = [
        'course_ids' => 'array', // Para manejar el JSON como array en PHP
        'full_access' => 'boolean',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    protected $fillable = [
        'user_id',
        'access_type',
        'course_ids',
        'full_access',
        'start_date',
        'end_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Si usas la tabla pivote
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'play_control_access_courses');
    }

    // Método para verificar si el acceso está vigente
    public function isActive()
    {
        $now = now();
        return (!$this->start_date || $this->start_date <= $now) &&
            (!$this->end_date || $this->end_date >= $now);
    }
}
