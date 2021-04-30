<?php

namespace App\Filters;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Facade;

class FunctionFilter extends Facade implements Filter
{
    public function filter(Collection $employees, array $filters): Collection
    {
        $users = DB::table('user')
            ->select('user.id')
            ->join('role_user', 'user.id', '=', "role_user.user_id")
            ->join('role', 'role_user.role_id', '=', 'role.id')
            ->whereIn('role.id', array_keys($filters))
            ->get();

        foreach ($employees as $employee) {

            $forget = true;

            foreach ($users as $user) {
                if ($user->id == $employee->user->id) {
                    $forget = false;
                }
            }

            if ($forget) {
                $employees->forget($employee->id - 1);
            }
        }

        return $employees;
    }
}
