<?php

namespace App\Reporters;

use League\Csv\{ Reader, Writer };

use Date;
use SplTempFileObject;

abstract class Reporter
{

    protected $date;

    /**
     * Create a new resource instance.
     *
     * @return void
     */
    public function __construct() {
        Date::setLocale('es');
        $this->date = Date::now();
    }

    /*
    |--------------------------------------------------------------------------
    | Protected methods
    |--------------------------------------------------------------------------
    */

    /**
     * Return CSV writer instance
     *
     * @return League\Csv\Writer
     */
    protected function getCSVWriter() {
        $writer = Writer::createFromFileObject(new SplTempFileObject());
        $writer->setOutputBOM(Reader::BOM_UTF8);
        return $writer;
    }

    /*
    |--------------------------------------------------------------------------
    | Abstract methods
    |--------------------------------------------------------------------------
    */

    /**
     * Generate a file report for download
     *
     * @param array $filters
     * @return League\Csv\Write
     */
    abstract public function generateFileReport($filters=[]);

    /**
     * Generate the report data to show on webpage
     *
     * @param array $filters
     * @return array
     */
    abstract public function generateWebReport($filters=[]);

    /**
     * Return file report filename
     *
     * @return string
     */
    abstract public function getFilename();

    /**
     * Get the report headers
     *
     * @return array
     */
    abstract protected function getReportHeaders();

    /**
     * Get the query of the report elements
     *
     * @return \Illuminate\Database\Query\Builder
     */
    abstract protected function getQuery();

    /**
     * Return the iterator instance
     *
     * @param Closure|callable $writter
     * @return Closure|callable
     */
    abstract protected function getIterator($writter);
}
