<?php

namespace App\Policies;

use App\User;
use App\WarningType;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class WarningTypePolicy
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
        return $user->haveAccess('index-warning-type')
        ? Response::allow()
        : Response::deny('You can\'t see any warning-type');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\WarningType  $warningType
     * @return mixed
     */
    public function view(User $user, WarningType $warningType)
    {
        return ($user->haveAccess('show-warning-type')) ||
                ($user->haveAccess('show-warning-type') && $warningType->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t see this warning-type');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->haveAccess('create-warning-type')
        ? Response::allow()
        : Response::deny('You can\'t create a warning-type');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\WarningType  $warningType
     * @return mixed
     */
    public function update(User $user, WarningType $warningType)
    {
        return ($user->haveAccess('update-warning-type')) ||
               ($user->haveAccess('update-own-warning-type') && $warningType->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t update this warning-type');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\WarningType  $warningType
     * @return mixed
     */
    public function delete(User $user, WarningType $warningType)
    {
        return ($user->haveAccess('delete-warning-type')) ||
        ($user->haveAccess('delete-own-warning-type') && $warningType->user->id === $user->id)
                 ? Response::allow()
                 : Response::deny('You can\'t delete this warning-type');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\WarningType  $warningType
     * @return mixed
     */
    public function restore(User $user, WarningType $warningType)
    {
        return ($user->haveAccess('restore-warning-type')) ||
                ($user->haveAccess('restore-own-warning-type') && $warningType->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this warning-type');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\WarningType  $warningType
     * @return mixed
     */
    public function forceDelete(User $user, WarningType $warningType)
    {
        return ($user->haveAccess('force-delete-warning-type'))
        ? Response::allow()
        : Response::deny('You can\'t force delete this warning-type');
    }
}
