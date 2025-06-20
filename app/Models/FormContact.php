<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormContact extends Model
{
    protected $table = 'form_contacts';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'job_position',
        'subject',
        'message',
        'company',
        'address',
        'status',
        'notes',
        'form_url',
        'collaborators_count'
    ];
}
?>
