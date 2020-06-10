<?php

namespace App\Policies;

use App\Price;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PricePolicy
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
        return $user->haveAccess('index-price')
        ? Response::allow()
        : Response::deny('You can\'t see any price');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Price  $price
     * @return mixed
     */
    public function view(User $user, Price $price)
    {
        return ($user->haveAccess('show-price')) ||
                ($user->haveAccess('show-price') && $price->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t see this price');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->haveAccess('create-price')
                                ? Response::allow()
                                : Response::deny('You can\'t create a price');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Price  $price
     * @return mixed
     */
    public function update(User $user, Price $price)
    {
        return ($user->haveAccess('update-price')) ||
               ($user->haveAccess('update-own-price') && $price->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t update this price');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Price  $price
     * @return mixed
     */
    public function delete(User $user, Price $price)
    {
        return ($user->haveAccess('delete-price')) ||
               ($user->haveAccess('delete-own-price') && $price->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this price');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Price  $price
     * @return mixed
     */
    public function restore(User $user, Price $price)
    {
        return ($user->haveAccess('restore-price')) ||
                ($user->haveAccess('restore-own-price') && $price->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this price');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Price  $price
     * @return mixed
     */
    public function forceDelete(User $user, Price $price)
    {
        return ($user->haveAccess('force-delete-price'))
                    ? Response::allow()
                    : Response::deny('You can\'t force delete this price');
    }
}
