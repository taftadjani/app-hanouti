<?php

namespace App\Policies;

use App\ProductStore;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ProductStorePolicy
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
        return $user->haveAccess('index-product-store')
                                ? Response::allow()
                                : Response::deny('You can\'t see any Product Store');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\ProductStore  $productStore
     * @return mixed
     */
    public function view(User $user, ProductStore $productStore)
    {
        return ($user->haveAccess('show-product-store')) ||
                ($user->haveAccess('show-own-product-store') && $productStore->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t see this Product store');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->haveAccess('create-product-store')
                                ? Response::allow()
                                : Response::deny('You can\'t create a Product store');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\ProductStore  $productStore
     * @return mixed
     */
    public function update(User $user, ProductStore $productStore)
    {
        return ($user->haveAccess('update-product-store')) ||
               ($user->haveAccess('update-own-product-store') && $productStore->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t update this Product store');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\ProductStore  $productStore
     * @return mixed
     */
    public function delete(User $user, ProductStore $productStore)
    {
        return ($user->haveAccess('delete-product-store')) ||
        ($user->haveAccess('delete-own-product-store') && $productStore->user->id === $user->id)
                         ? Response::allow()
                         : Response::deny('You can\'t delete this Product store');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\ProductStore  $productStore
     * @return mixed
     */
    public function restore(User $user, ProductStore $productStore)
    {
        return ($user->haveAccess('restore-product-store')) ||
                ($user->haveAccess('restore-own-product-store') && $productStore->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t delete this Product store');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\ProductStore  $productStore
     * @return mixed
     */
    public function forceDelete(User $user, ProductStore $productStore)
    {
        return ($user->haveAccess('force-delete-product-store'))
                                ? Response::allow()
                                : Response::deny('You can\'t force delete this Product store');
    }
}
