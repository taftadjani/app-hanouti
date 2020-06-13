<?php

namespace App\Policies;

use App\CartDetail;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class CartDetailPolicy
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
        return $user->haveAccess('index-cart-detail')
                                ? Response::allow()
                                : Response::deny('You can\'t see any cart-detail');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\CartDetail  $cartDetail
     * @return mixed
     */
    public function view(User $user, CartDetail $cartDetail)
    {
        return ($user->haveAccess('show-cart-detail')) ||
                ($user->haveAccess('show-cart-detail') && $cartDetail->cart->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t see this cart-detail');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->haveAccess('create-cart-detail')
                                ? Response::allow()
                                : Response::deny('You can\'t create a cart-detail');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\CartDetail  $cartDetail
     * @return mixed
     */
    public function update(User $user, CartDetail $cartDetail)
    {
        return ($user->haveAccess('update-cart-detail')) ||
               ($user->haveAccess('update-own-cart-detail') && $cartDetail->cart->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t update this cart-detail');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\CartDetail  $cartDetail
     * @return mixed
     */
    public function delete(User $user, CartDetail $cartDetail)
    {
        return ($user->haveAccess('delete-cart-detail')) ||
               (($user->haveAccess('delete-own-cart-detail') && $cartDetail->cart->user->id === $user->id))
                        ? Response::allow()
                        : Response::deny('You can\'t delete this cart-detail');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\CartDetail  $cartDetail
     * @return mixed
     */
    public function restore(User $user, CartDetail $cartDetail)
    {
        return ($user->haveAccess('restore-cart-detail')) ||
        ($user->haveAccess('restore-own-cart-detail') && $cartDetail->cart->user->id === $user->id)
                ? Response::allow()
                : Response::deny('You can\'t delete this cart-detail');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\CartDetail  $cartDetail
     * @return mixed
     */
    public function forceDelete(User $user, CartDetail $cartDetail)
    {
        return ($user->haveAccess('force-delete-cart-detail'))
                    ? Response::allow()
                    : Response::deny('You can\'t force delete this cart-detail');
    }
}
