<?php

namespace App\Models;

use App\Models\Traits\Presentable;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ModuleAnalysis extends Model
{
    protected $table = 'module_analysis';

    protected $fillable = [
        'module_name',
        'status',
        'execution_time',
        'batch_id',
        'analyzed_at',
    ];
}
