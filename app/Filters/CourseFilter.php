<?php

namespace App\Filters;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Facade;

class CourseFilter extends Facade implements Filter
{
    public function filter(Collection $employees, array $filters): Collection
    {
        foreach ($employees as $employee) {

            $forget = true;

            if ($employee->courses->whereIn('id', array_keys($filters))->count() != 0) $forget = false;
            if ($forget) $employees->forget($employee->id - 1);
        }
        return $employees;
    }
}
