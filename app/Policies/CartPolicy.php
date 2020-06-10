<?php

namespace App\Policies;

use App\Cart;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class CartPolicy
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
        return $user->haveAccess('index-cart')
                                ? Response::allow()
                                : Response::deny('You can\'t see any cart');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Cart  $cart
     * @return mixed
     */
    public function view(User $user, Cart $cart)
    {
        return ($user->haveAccess('show-cart')) ||
                ($user->haveAccess('show-cart') && $cart->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t see this cart');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->haveAccess('create-cart')
                                ? Response::allow()
                                : Response::deny('You can\'t create a cart');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Cart  $cart
     * @return mixed
     */
    public function update(User $user, Cart $cart)
    {
        return ($user->haveAccess('update-cart')) ||
               ($user->haveAccess('update-own-cart') && $cart->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t update this cart');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Cart  $cart
     * @return mixed
     */
    public function delete(User $user, Cart $cart)
    {
        return ($user->haveAccess('delete-cart')) ||
               ($user->haveAccess('delete-own-cart') && $cart->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this cart');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Cart  $cart
     * @return mixed
     */
    public function restore(User $user, Cart $cart)
    {
        return ($user->haveAccess('restore-cart')) ||
        ($user->haveAccess('restore-own-cart') && $cart->user->id === $user->id)
                ? Response::allow()
                : Response::deny('You can\'t delete this cart');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Cart  $cart
     * @return mixed
     */
    public function forceDelete(User $user, Cart $cart)
    {
        return ($user->haveAccess('force-delete-cart'))
                    ? Response::allow()
                    : Response::deny('You can\'t force delete this cart');
    }

    /**
     * Determine whether the user can clear the cart or not the model.
     *
     * @param  \App\User  $user
     * @param  \App\Cart  $cart
     * @return mixed
     */
    public function clear(User $user, Cart $cart)
    {
        return ($user->haveAccess('clear-cart')) ||
        ($user->haveAccess('clear-own-cart') && $cart->user->id === $user->id)
                ? Response::allow()
                : Response::deny('You can\'t clear this cart');
    }

    /**
     * Determine whether the user can order the cart or not the model.
     *
     * @param  \App\User  $user
     * @param  \App\Cart  $cart
     * @return mixed
     */
    public function order(User $user, Cart $cart)
    {
        return ($user->haveAccess('order-cart')) ||
        ($user->haveAccess('order-own-cart') && $cart->user->id === $user->id)
                ? Response::allow()
                : Response::deny('You can\'t order this cart');
    }
}
