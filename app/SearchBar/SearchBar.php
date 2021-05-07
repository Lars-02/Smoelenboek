<?php

namespace App\SearchBar;


use App\Models\Employee;
use App\Models\Expertise;
use App\Models\Role;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Facade;

class SearchBar extends Facade
{
    public function search(Collection $employees, string $stringToFilter): Collection
    {
        $arrayEmployeeIds = [];
        if (strlen($stringToFilter) > 0)
        {
            $splitStringToFilter = explode(" ", $stringToFilter);
            foreach ($splitStringToFilter as $filter) {
                $employees = Employee::select('id')->where('firstname', 'LIKE', '%' . $filter . '%')
                    ->orWhere('lastname', 'LIKE', '%' . $filter . '%')
                    ->get();
                foreach($employees as $employee) {
                    if(!in_array($employee->id, $arrayEmployeeIds)){
                        array_push($arrayEmployeeIds, $employee->id);
                    }
                }

                $expertises = Expertise::where('name', 'LIKE', '%' . $filter . '%')->get();
                foreach($expertises as $expertise) {
                    $expertiseEmployees = $expertise->employees()->get();
                    $expertiseEmployeeIds = $expertiseEmployees->pluck('id');
                    foreach($expertiseEmployeeIds as $id) {
                        if(!in_array($id, $arrayEmployeeIds)){
                            array_push($arrayEmployeeIds, $id);
                        }
                    }
                }

                $functions = Role::where('name', 'LIKE', '%' . $filter . '%')->get();
                foreach($functions as $function) {
                    $functionEmployees = $function->employee()->get();
                    $functionEmployeeIds = $functionEmployees->pluck('id');
                    foreach($functionEmployeeIds as $id) {
                        if(!in_array($id, $arrayEmployeeIds)){
                            array_push($arrayEmployeeIds, $id);
                        }
                    }
                }

            }

            $employees = Employee::whereIn('id', $arrayEmployeeIds)->get();
        }
        return $employees;
    }
}
