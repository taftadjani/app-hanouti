<?php

namespace App\Policies;

use App\User;
use App\Warning;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class WarningPolicy
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
        return $user->haveAccess('index-warning')
                                ? Response::allow()
                                : Response::deny('You can\'t see any warning');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Warning  $warning
     * @return mixed
     */
    public function view(User $user, Warning $warning)
    {
        return ($user->haveAccess('show-warning')) ||
        ($user->haveAccess('show-warning') && $warning->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t see this warning');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->haveAccess('create-warning')
        ? Response::allow()
        : Response::deny('You can\'t create a warning');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Warning  $warning
     * @return mixed
     */
    public function update(User $user, Warning $warning)
    {
        return ($user->haveAccess('update-warning')) ||
               ($user->haveAccess('update-own-warning') && $warning->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t update this warning');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Warning  $warning
     * @return mixed
     */
    public function delete(User $user, Warning $warning)
    {
        return ($user->haveAccess('delete-warning')) ||
        ($user->haveAccess('delete-own-warning') && $warning->user->id === $user->id)
                 ? Response::allow()
                 : Response::deny('You can\'t delete this warning');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Warning  $warning
     * @return mixed
     */
    public function restore(User $user, Warning $warning)
    {
        return ($user->haveAccess('restore-warning')) ||
                ($user->haveAccess('restore-own-warning') && $warning->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this warning');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Warning  $warning
     * @return mixed
     */
    public function forceDelete(User $user, Warning $warning)
    {
        return ($user->haveAccess('force-delete-warning'))
        ? Response::allow()
        : Response::deny('You can\'t force delete this warning');
    }
}
