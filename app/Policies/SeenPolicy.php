<?php

namespace App\Policies;

use App\Seen;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class SeenPolicy
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
        return $user->haveAccess('index-seen')
        ? Response::allow()
        : Response::deny('You can\'t see any seen');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Seen  $seen
     * @return mixed
     */
    public function view(User $user, Seen $seen)
    {
        return ($user->haveAccess('show-seen')) ||
                ($user->haveAccess('show-seen') && $seen->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t see this seen');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->haveAccess('create-seen')
        ? Response::allow()
        : Response::deny('You can\'t create a seen');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Seen  $seen
     * @return mixed
     */
    public function update(User $user, Seen $seen)
    {
        return ($user->haveAccess('update-seen')) ||
               ($user->haveAccess('update-own-seen') && $seen->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t update this seen');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Seen  $seen
     * @return mixed
     */
    public function delete(User $user, Seen $seen)
    {
        return ($user->haveAccess('delete-seen')) ||
        ($user->haveAccess('delete-own-seen') && $seen->user->id === $user->id)
                 ? Response::allow()
                 : Response::deny('You can\'t delete this seen');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Seen  $seen
     * @return mixed
     */
    public function restore(User $user, Seen $seen)
    {
        return ($user->haveAccess('restore-seen')) ||
        ($user->haveAccess('restore-own-seen') && $seen->user->id === $user->id)
                ? Response::allow()
                : Response::deny('You can\'t delete this seen');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Seen  $seen
     * @return mixed
     */
    public function forceDelete(User $user, Seen $seen)
    {
        return ($user->haveAccess('force-delete-seen'))
        ? Response::allow()
        : Response::deny('You can\'t force delete this seen');
    }
}
