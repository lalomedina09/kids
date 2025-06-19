<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{ Model, SoftDeletes };

use App\Mail\Newsletter\Mailer;

use Newsletter as RemoteNewsletter;
use Exception;

class Newsletter extends Model
{

    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'newsletter';

    /**
     * The attributes that are guarded.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'fields' => 'array',
        'user_id' => 'integer',
        'subscribed' => 'boolean',
        'synced' => 'boolean'
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'user'
    ];

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */

    /**
     * Fullname accessor
     *
     * @return void
     */
    public function getFullnameAttribute()
    {
        $fullname = "{$this->fields['FNAME']} {$this->fields['LNAME']}";
        return ucwords(strtolower(trim($fullname)));
    }

    /*
    |--------------------------------------------------------------------------
    | Public static methods
    |--------------------------------------------------------------------------
    */

    /**
     * Create a new subscription to newsletter
     *
     * @param  array  $params
     * @return \App\Models\Newsletter
     */
    public static function subscribe($params)
    {
        $email = $params['email'];

        $old_newsletter = self::where('email', $email)->first();
        $user = User::where('email', $email)->first();

        $newsletter = $old_newsletter ?? new self;
        $newsletter->email = ($user) ? $user->email : $email;
        $newsletter->fields = [
            'FNAME' => ($user) ? $user->name : $params['first_name'],
            'LNAME' => ($user) ? $user->last_name : $params['last_name'],
            'STATE' => $params['state']
        ];
        $newsletter->subscribed = true;
        $newsletter->synced = false;
        if ($user) {
            $newsletter->user()->associate($user);
        }
        $newsletter->save();

        return $newsletter;
    }

    public static function subscribeByLanding($params)
    {
        $email = $params['Correo'];

        $old_newsletter = self::where('email', $email)->first();
        $user = User::where('email', $email)->first();

        $newsletter = $old_newsletter ?? new self;
        $newsletter->email = ($user) ? $user->email : $email;
        $newsletter->fields = [
            'FNAME' => ($user) ? $user->name : $params['Nombre'],
            'LNAME' => ($user) ? $user->last_name : $params['Apellido'],
            'STATE' => 1
        ];
        $newsletter->subscribed = true;
        $newsletter->synced = true;
        if ($user) {
            $newsletter->user()->associate($user);
        }
        $newsletter->save();

        return $newsletter;
    }

    /**
     * Remove a subscription to newsletter
     *
     * @param  string  $email
     * @return \App\Models\Newsletter
     */
    public static function unsubscribe($email)
    {
        $newsletter = self::where('email', $email)->first();
        $newsletter->subscribed = false;
        $newsletter->synced = false;
        $newsletter->save();

        return $newsletter;
    }

    /*
    |--------------------------------------------------------------------------
    | Private methods
    |--------------------------------------------------------------------------
    */

    /**
     * Sync newsletter to remote
     *
     * @return void
     */
    public function sync()
    {
        return ($this->subscribed) ? $this->syncSubscription() : $this->syncUnsubscription();
    }

    /*
    |--------------------------------------------------------------------------
    | Private methods
    |--------------------------------------------------------------------------
    */

    /**
     * Sync subscription
     *
     * @return boolean
     */
    private function syncSubscription()
    {
        if ($this->subscribed && $this->synced) {
            return true;
        }

        if (!RemoteNewsletter::hasMember($this->email)) {
            RemoteNewsletter::subscribe($this->email, $this->fields);
        } else {
            RemoteNewsletter::subscribeOrUpdate($this->email, $this->fields);
        };

        $result = RemoteNewsletter::lastActionSucceeded();
        if ($result) {
            $this->synced = true;
            $this->save();

            Mailer::sendSubscriptionMail($this);
        }
        return $result;
    }

    /**
     * Sync unsubscription
     *
     * @return boolean
     */
    private function syncUnsubscription()
    {
        if (!$this->subscribed && $this->synced) {
            return true;
        }

        if (RemoteNewsletter::hasMember($this->email) && RemoteNewsletter::isSubscribed($this->email)) {
            RemoteNewsletter::unsubscribe($this->email);
        };

        $result = RemoteNewsletter::lastActionSucceeded();
        if ($result) {
            $this->synced = true;
            $this->save();

            Mailer::sendUnsubscriptionMail($this);
        }
        return $result;
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
