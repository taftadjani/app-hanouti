<?php

namespace App\Policies;

use App\Star;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class StarPolicy
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
        return $user->haveAccess('index-star')
        ? Response::allow()
        : Response::deny('You can\'t see any star');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Star  $star
     * @return mixed
     */
    public function view(User $user, Star $star)
    {
        return ($user->haveAccess('show-star')) ||
                ($user->haveAccess('show-star') && $star->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t see this star');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->haveAccess('create-star')
        ? Response::allow()
        : Response::deny('You can\'t create a star');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Star  $star
     * @return mixed
     */
    public function update(User $user, Star $star)
    {
        return ($user->haveAccess('update-star')) ||
               ($user->haveAccess('update-own-star') && $star->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t update this star');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Star  $star
     * @return mixed
     */
    public function delete(User $user, Star $star)
    {
        return ($user->haveAccess('delete-star')) ||
        ($user->haveAccess('delete-own-star') && $star->user->id === $user->id)
                 ? Response::allow()
                 : Response::deny('You can\'t delete this star');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Star  $star
     * @return mixed
     */
    public function restore(User $user, Star $star)
    {
        return ($user->haveAccess('restore-star')) ||
                ($user->haveAccess('restore-own-star') && $star->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this star');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Star  $star
     * @return mixed
     */
    public function forceDelete(User $user, Star $star)
    {
        return ($user->haveAccess('force-delete-star'))
        ? Response::allow()
        : Response::deny('You can\'t force delete this star');
    }
}
