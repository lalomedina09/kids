<?php

namespace App\Models;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reschedule extends Model
{
    //
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'reschedules';

    /**
     * The attributes that are guarded.
     *
     * @var array
     */
    protected $guarded = [
        'id', 'user_id', 'advice_id'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status', 'type_user', 'description', 'current_date', 'new_date'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    /*public static function getPriceRating($data_field = 'code', $data_key)
    {
        return self::where('code', 'price-rating')
            ->first();
    }*/


    public const STATUS = [
        1 => 'Por Generar',
        2 => 'Solicita Reagendar',
        3 => 'Re-agendada',
        4 => 'Aprobada',
        5 => 'Rechazada',
        //6 => 'Reembolso',
        7 => 'Mentor Bloquea Reagendar',
        8 => 'After Mentoría Mentor Quiere ofrecer Reagendar',
        9 => 'After Mentoría Mentor Envio Propuesta Reagendar',
        10 => 'Asesorado ocupa otras fechas',
        11 => 'Mentor actualizo su calendario',
    ];
    //Status = 7 = Asesorado no se presento y Mentor hizo click en no quiero re agendar
    public const TYPEUSER = [
            1 => 'Asesor',
            2 => 'Cliente',
    ];

    public function notifications()
    {
        return $this->morphOne('App\Models\Notifications', 'notificationsable');
    }

    public function getDateHuman($date)
    {
        return $newDate = Carbon::parse($date)->diffForHumans();
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
