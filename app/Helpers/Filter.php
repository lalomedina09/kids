<?php

namespace App\Helpers;

abstract class Filter {

    protected $filters;
    protected $order_column;

    /**
     * Create a new resource instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->filters = [];
        $this->order_column = 'created_at';
    }

    /**
     * Set the filters
     *
     * @param array $filters
     * @return \FutureED\Framework\Filters\Filter
     */
    public function setFilters($filters)
    {
        $this->filters = $filters;
        return $this;
    }

    /**
     * Execute the query and return the results
     *
     * @return \Illuminate\Support\Collection
     */
    public function get()
    {
        $order = (array_key_exists('order', $this->filters) && $this->filters['order'] == 'asc') ? $this->filters['order'] : 'desc';
        $this->query = $this->query->orderBy($this->order_column, $order);

        $pagination = (array_key_exists('limit', $this->filters) && is_numeric($this->filters['limit'])) ? $this->setPagination($this->filters['limit'], 12) : 12;
        $results = $this->query->paginate($pagination);

        $results->appends(['scope' => $this->scope, 'filters' => $this->filters]);
        return $results;
    }

    /**
     * Execute the query and return one result
     *
     * @param  int|string $element_id
     * @param  boolean $fail
     * @return \Illuminate\Support\Collection
     */
    public function find($element_id, $fail=false)
    {
        $this->query = $this->query->where('id', $element_id);
        return ($fail) ? $this->query->firstOrFail() : $this->query->first();
    }

    /*
    |--------------------------------------------------------------------------
    | Static methods
    |--------------------------------------------------------------------------
    */

    /**
     * Set the pagination lower and upper limits
     *
     * @param  int $offset
     * @param  int $pagination
     * @return int
     */
    public static function setPagination($offset, $pagination=10)
    {
        if (is_numeric($offset)) {
            $pagination = (
                ($offset > 0) ? (
                    ($offset < 100) ? $offset+0 : 100
                ) : $pagination
            );
        }
        return (int)$pagination;
    }
}
