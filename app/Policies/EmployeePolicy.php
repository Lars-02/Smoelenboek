<?php

namespace App\Policies;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmployeePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Employee $employee
     * @return bool
     */
    public function view(User $user, Employee $employee): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return false
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Employee $employee
     * @return bool
     */
    public function update(User $user, Employee $employee): bool
    {
        return $user->id === $employee->user_id || $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Employee $employee
     * @return bool
     */
    public function delete(User $user, Employee $employee): bool
    {
        return $user->id === $employee->user_id || $user->isAdmin();
    }
}
