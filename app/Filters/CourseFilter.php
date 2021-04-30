<?php

namespace App\Filters;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Facade;

class CourseFilter extends Facade implements Filter
{
    public function filter(Collection $employees, array $filters): Collection
    {
        return $employees;
    }
}
