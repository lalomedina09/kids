<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = [
        'title',
        'content',
        'background_color',
        'has_countdown',
        'start_date',
        'end_date',
    ];

    // Scope para obtener anuncios activos
    public function scopeActive($query)
    {
        $now = Carbon::now();
        return $query->where('start_date', '<=', $now)->where('end_date', '>=', $now);
    }
}
