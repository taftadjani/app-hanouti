<?php

namespace App\Policies;

use App\Condition;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ConditionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->haveAccess('index-condition')
                                ? Response::allow()
                                : Response::deny('You can\'t see any condition');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Condition  $condition
     * @return mixed
     */
    public function view(User $user, Condition $condition)
    {
        return ($user->haveAccess('show-condition')) ||
        ($user->haveAccess('show-condition') && $condition->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t see this condition');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->haveAccess('create-condition')
        ? Response::allow()
        : Response::deny('You can\'t create a condition');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Condition  $condition
     * @return mixed
     */
    public function update(User $user, Condition $condition)
    {
        return ($user->haveAccess('update-condition')) ||
               ($user->haveAccess('update-own-condition') && $condition->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t update this condition');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Condition  $condition
     * @return mixed
     */
    public function delete(User $user, Condition $condition)
    {
        return ($user->haveAccess('delete-condition')) ||
               ($user->haveAccess('delete-own-condition') && $condition->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this condition');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Condition  $condition
     * @return mixed
     */
    public function restore(User $user, Condition $condition)
    {
        return ($user->haveAccess('restore-condition')) ||
                ($user->haveAccess('restore-own-condition') && $condition->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this condition');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Condition  $condition
     * @return mixed
     */
    public function forceDelete(User $user, Condition $condition)
    {
        return ($user->haveAccess('force-delete-condition'))
        ? Response::allow()
        : Response::deny('You can\'t force delete this condition');
    }
}
