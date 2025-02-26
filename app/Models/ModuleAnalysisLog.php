<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleAnalysisLog extends Model
{
    //use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'module_analysis_logs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'module_name',
        'status',
        'message',
        'error_code',
        'additional_data',
        'execution_time',
        'analysis_time',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'additional_data' => 'array', // Convierte el campo JSON a un array de PHP
        'analysis_time' => 'datetime', // Convierte el campo a un objeto Carbon
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'analysis_time',
        'created_at',
        'updated_at',
    ];
}