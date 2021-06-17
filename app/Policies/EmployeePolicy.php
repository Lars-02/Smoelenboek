<?php

namespace App\Policies;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmployeePolicy
{
    use HandlesAuthorization;

    /**
     * Perform pre-authorization checks.
     *
     * @param User $user
     * @return bool|void
     */
    public function before(User $user)
    {
        if ($user->isAdmin())
            return true;
        return;
    }

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
        return false;
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
        return $user->id === $employee->user_id;
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
        return $user->id === $employee->user_id;
    }
}
