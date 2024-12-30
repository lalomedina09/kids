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
        'address'
    ];
}
?>
