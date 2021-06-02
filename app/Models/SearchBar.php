<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Facade;

class SearchBar extends Facade
{
    public function search(Collection $employees, string $search): Collection
    {
        $filters = explode(",", str_replace(", ", ",", $search));

        $expertises = $this->filter(Expertise::all(), $filters);
        $courses = $this->filter(Course::all(), $filters);
        $minors = $this->filter(Minor::all(), $filters);
        $hobbies = $this->filter(Hobby::all(), $filters);
        $lectorates = $this->filter(Lectorate::all(), $filters);
        $workDays = $this->filter(WorkDay::all(), $filters);
        $departments = $this->filter(Department::all(), $filters);
        $roles = $this->filter(Role::all(), $filters);

        return $employees->filter(function (Employee $employee) use ($filters, $expertises, $roles, $courses, $minors, $lectorates, $workDays, $departments, $hobbies) {
            foreach ($filters as $filter) {
                if (stripos($employee->fullName, $filter) !== false)
                    return true;
            }
            if ($this->filterEmployee($employee->expertises, $expertises)) return true;
            if ($this->filterEmployee($employee->courses, $courses)) return true;
            if ($this->filterEmployee($employee->minors, $minors)) return true;
            if ($this->filterEmployee($employee->hobbies, $hobbies)) return true;
            if ($this->filterEmployee($employee->lectorates, $lectorates)) return true;
            if ($this->filterEmployee($employee->workDays, $workDays)) return true;
            if ($this->filterEmployee($employee->departments, $departments)) return true;
            if ($this->filterEmployee($employee->user->roles, $roles)) return true;
            return false;
        });
    }

    protected function filter(Collection $list, array $filters): Collection
    {
        return $list->filter(function ($item) use ($filters) {
            foreach ($filters as $filter) {
                if (stripos($item, $filter) !== false)
                    return true;
            }
            return false;
        });
    }

    protected function filterEmployee(Collection $needles, Collection $haystack): bool
    {
        foreach ($needles as $item) {
            if ($haystack->contains($item))
                return true;
        }
        return false;
    }
}
