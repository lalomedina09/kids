<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Presenters\LandingPresenter;
use App\Models\Traits\{ Presentable, TranslatesDates };

class Landing extends Model
{

    use Presentable, TranslatesDates;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'landings';

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
        'page', 'fields'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'fields' => 'array',
        'synced' => 'boolean'
    ];

    /**
     * The model presenter
     *
     * @var string
     */
    protected $presenter = LandingPresenter::class;

    /*
    |--------------------------------------------------------------------------
    | Public methods
    |--------------------------------------------------------------------------
    */

    public function sync()
    {
        if ($this->synced) {
            return true;
        }

        $connector = $this->getConnector();
        if (!$connector) {
            return false;
        }

        $result = $connector->sendLead($this->fields);

        $this->synced = $result;
        $this->save();

        return $result;
    }

    /*
    |--------------------------------------------------------------------------
    | Private methods
    |--------------------------------------------------------------------------
    */

    /**
     * Connector factory
     *
     * @var \App\Connectors\Connector;
     */
    private function getConnector()
    {
        switch ($this->page) {
            case 'registrocuradeuda': return new \App\Connectors\CuradeudaConnector;
            case 'registroresuelvetudeuda': return new \App\Connectors\ResuelveTuDeudaConnector;
            default: return null;
        }
    }
}
