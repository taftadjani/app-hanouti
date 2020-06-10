<?php

namespace App\Policies;

use App\Store;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class StorePolicy
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
        return $user->haveAccess('index-store')
                                ? Response::allow()
                                : Response::deny('You can\'t see any store');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Store  $store
     * @return mixed
     */
    public function view(User $user, Store $store)
    {
        return ($user->haveAccess('show-store')) ||
        ($user->haveAccess('show-store') && $store->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t see this store');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->haveAccess('create-store')
                                ? Response::allow()
                                : Response::deny('You can\'t create a store');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Store  $store
     * @return mixed
     */
    public function update(User $user, Store $store)
    {
        return ($user->haveAccess('update-store')) ||
               ($user->haveAccess('update-own-store') && $store->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t update this store');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Store  $store
     * @return mixed
     */
    public function delete(User $user, Store $store)
    {
        return ($user->haveAccess('delete-store')) ||
               ($user->haveAccess('delete-own-store') && $store->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t delete this store');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Store  $store
     * @return mixed
     */
    public function restore(User $user, Store $store)
    {
        return ($user->haveAccess('restore-store')) ||
                ($user->haveAccess('restore-own-store') && $store->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t delete this store');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Store  $store
     * @return mixed
     */
    public function forceDelete(User $user, Store $store)
    {
        return ($user->haveAccess('force-delete-store'))
                                ? Response::allow()
                                : Response::deny('You can\'t force delete this store');
    }
}
