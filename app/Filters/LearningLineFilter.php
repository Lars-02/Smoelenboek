<?php

namespace App\Filters;

use App\Models\Employee;
use App\Models\EmployeeLearningLine;
use App\Models\LearningLine;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Facade;

class LearningLineFilter extends Facade implements Filter
{
    public function filter(Collection $employees, array $filters): Collection
    {
        foreach($employees as $employee)
        {
            $forget = true;

            if($employee->learningLines->whereIn('id', array_keys($filters))->count() != 0) $forget = false;
            if($forget) $employees->forget($employee->id - 1); 
        }
        return $employees;
/*         $learningLinePivot = EmployeeLearningLine::all();
        $employeesNew = new Collection();
        foreach($employees as $employee)
        {
            foreach($learningLinePivot as $learningLine)
            {
                foreach($filters as $key => $value)
                {
                    if($learningLine->learning_line_id == $key && $learningLine->employee_id == $employee->id)
                    {
                        $employeesNew->prepend(Employee::find($employee->id));
                    }
                }
            }
        }
        return $employeesNew; */
    }
}
