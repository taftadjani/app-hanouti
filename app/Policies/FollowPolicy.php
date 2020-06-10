<?php

namespace App\Policies;

use App\Follow;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class FollowPolicy
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
        return $user->haveAccess('index-follow')
                                ? Response::allow()
                                : Response::deny('You can\'t see any follow');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Follow  $follow
     * @return mixed
     */
    public function view(User $user, Follow $follow)
    {
        return ($user->haveAccess('show-follow')) ||
                ($user->haveAccess('show-follow') && $follow->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t see this follow');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->haveAccess('create-follow')
                                ? Response::allow()
                                : Response::deny('You can\'t create a follow');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Follow  $follow
     * @return mixed
     */
    public function update(User $user, Follow $follow)
    {
        return ($user->haveAccess('update-follow')) ||
               ($user->haveAccess('update-own-follow') && $follow->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t update this follow');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Follow  $follow
     * @return mixed
     */
    public function delete(User $user, Follow $follow)
    {
        return ($user->haveAccess('delete-follow')) ||
               ($user->haveAccess('delete-own-follow') && $follow->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this follow');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Follow  $follow
     * @return mixed
     */
    public function restore(User $user, Follow $follow)
    {
        return ($user->haveAccess('restore-follow')) ||
                ($user->haveAccess('restore-own-follow') && $follow->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this follow');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Follow  $follow
     * @return mixed
     */
    public function forceDelete(User $user, Follow $follow)
    {
        return ($user->haveAccess('force-delete-follow'))
                    ? Response::allow()
                    : Response::deny('You can\'t force delete this follow');
    }
}
