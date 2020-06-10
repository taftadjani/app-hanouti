<?php

namespace App\Policies;

use App\Discount;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class DiscountPolicy
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
        return $user->haveAccess('index-discount')
        ? Response::allow()
        : Response::deny('You can\'t see any discount');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Discount  $discount
     * @return mixed
     */
    public function view(User $user, Discount $discount)
    {
        return ($user->haveAccess('show-discount')) ||
                ($user->haveAccess('show-discount') && $discount->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t see this discount');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->haveAccess('create-discount')
                                ? Response::allow()
                                : Response::deny('You can\'t create a discount');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Discount  $discount
     * @return mixed
     */
    public function update(User $user, Discount $discount)
    {
        return ($user->haveAccess('update-discount')) ||
               ($user->haveAccess('update-own-discount') && $discount->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t update this discount');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Discount  $discount
     * @return mixed
     */
    public function delete(User $user, Discount $discount)
    {
        return ($user->haveAccess('delete-discount')) ||
               ($user->haveAccess('delete-own-discount') && $discount->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this discount');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Discount  $discount
     * @return mixed
     */
    public function restore(User $user, Discount $discount)
    {
        return ($user->haveAccess('restore-discount')) ||
                ($user->haveAccess('restore-own-discount') && $discount->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this discount');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Discount  $discount
     * @return mixed
     */
    public function forceDelete(User $user, Discount $discount)
    {
        return ($user->haveAccess('force-delete-discount'))
                    ? Response::allow()
                    : Response::deny('You can\'t force delete this discount');
    }
}
