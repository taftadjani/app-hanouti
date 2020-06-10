<?php

namespace App\Policies;

use App\Product;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ProductPolicy
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
        return $user->haveAccess('index-product')
                                ? Response::allow()
                                : Response::deny('You can\'t see any Product');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Product  $product
     * @return mixed
     */
    public function view(User $user, Product $product)
    {
        return ($user->haveAccess('show-product')) ||
                ($user->haveAccess('show-own-product') && $product->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t see this Product');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->haveAccess('create-product')
                                ? Response::allow()
                                : Response::deny('You can\'t create a Product');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Product  $product
     * @return mixed
     */
    public function update(User $user, Product $product)
    {
        return ($user->haveAccess('update-product')) ||
               ($user->haveAccess('update-own-product') && $product->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t update this Product');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Product  $product
     * @return mixed
     */
    public function delete(User $user, Product $product)
    {
        return ($user->haveAccess('delete-product')) ||
               ($user->haveAccess('delete-own-product') && $product->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t delete this Product');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Product  $product
     * @return mixed
     */
    public function restore(User $user, Product $product)
    {
        return ($user->haveAccess('restore-product')) ||
                ($user->haveAccess('restore-own-product') && $product->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t delete this Product');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Product  $product
     * @return mixed
     */
    public function forceDelete(User $user, Product $product)
    {
        return ($user->haveAccess('force-delete-product'))
                                ? Response::allow()
                                : Response::deny('You can\'t force delete this Product');
    }
}
