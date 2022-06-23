<?php

namespace App\Models\Presenters;

trait DatesPresenter
{
    /**
     * @var string
     */
    protected $timeFormat = 'h:i a';

    /**
     * @var string
     */
    protected $dateFormat = 'F j, Y';

    /**
     * @var string
     */
    protected $readableDateFormat = 'l, j \d\e F \d\e Y';

    /**
     * @var string
     */
    protected $simpledateFormat = 'd/M/Y';

    /**
     * @var string
     */
    protected $shortDateFormat = 'j \d\e F';

    /**
     * @var string
     */
    protected $humanDateFormat = 'l, d \d\e F \d\e Y \a \l\a\s H:i \h\r\s';

    /**
     * @var string
     */
    protected $inputDateFormat = 'Y-m-d H:i';

    /**
     * @var string
     */
    protected $outputDateFormat = 'Y-m-d H:i:s';

    /**
     * @var string
     */
    protected $reportDateFormat = 'd/M/Y h:i:s a';

    /**
     * @param  \Carbon\Carbon|null  $date
     * @return string
     */
    public function date($date) : string
    {
        return is_null($date) ? '-' : ucfirst($date->format($this->dateFormat));
    }

    /**
     * @param  \Carbon\Carbon|null  $readableDate
     * @return string
     */
    public function readableDate($readableDate) : string
    {
        return is_null($readableDate) ? '-' : ucfirst($readableDate->format($this->readableDateFormat));
    }

    /**
     * @param  \Carbon\Carbon|null  $humanDate
     * @return string
     */
    public function humanDate($humanDate) : string
    {
        return is_null($humanDate) ? '-' : ucfirst($humanDate->format($this->humanDateFormat));
    }

    /**
     * @param  \Carbon\Carbon|null  $datetime
     * @return string
     */
    public function simpleDate($datetime) : string
    {
        return is_null($datetime) ? '-' : ucfirst($datetime->format($this->simpledateFormat));
    }

    /**
     * @param  \Carbon\Carbon|null  $datetime
     * @return string
     */
    public function shortDate($date) : string
    {
        return is_null($date) ? '-' : ucfirst($date->format($this->shortDateFormat));
    }

    /**
     * @param  \Carbon\Carbon|null  $datetime
     * @return string
     */
    public function simpleTime($datetime) : string
    {
        return is_null($datetime) ? '-' : ucfirst($datetime->format($this->timeFormat));
    }

    /**
     * @return string
     */
    public function created_at()
    {
        return $this->model->created_at->format($this->humanDateFormat);
    }

    /**
     * @return string
     */
    public function updated_at()
    {
        return $this->model->updated_at->format($this->humanDateFormat);
    }

    /**
     * @return string
     */
    public function deleted_at()
    {
        return optional($this->model->deleted_at)->format($this->humanDateFormat);
    }
}
