<?php


namespace App\Filters;


use Illuminate\Database\Eloquent\Collection;

interface Filter
{
    /**
     * @param $employees
     * @param $filters
     * @return mixed
     */
    public function filter(Collection $employees, array $filters) : Collection;
}
