<?php

namespace App\Policies;

use App\Bill;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class BillPolicy
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
        return $user->haveAccess('index-bill')
                                ? Response::allow()
                                : Response::deny('You can\'t see any bill');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Bill  $bill
     * @return mixed
     */
    public function view(User $user, Bill $bill)
    {
        return ($user->haveAccess('show-bill')) ||
                ($user->haveAccess('show-bill') && $bill->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t see this bill');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->haveAccess('create-bill')
                                ? Response::allow()
                                : Response::deny('You can\'t create a bill');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Bill  $bill
     * @return mixed
     */
    public function update(User $user, Bill $bill)
    {
        return ($user->haveAccess('update-bill')) ||
               ($user->haveAccess('update-own-bill') && $bill->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t update this bill');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Bill  $bill
     * @return mixed
     */
    public function delete(User $user, Bill $bill)
    {
        return ($user->haveAccess('delete-bill')) ||
               ($user->haveAccess('delete-own-bill') && $bill->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this bill');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Bill  $bill
     * @return mixed
     */
    public function restore(User $user, Bill $bill)
    {
        return ($user->haveAccess('restore-bill')) ||
                ($user->haveAccess('restore-own-bill') && $bill->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this bill');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Bill  $bill
     * @return mixed
     */
    public function forceDelete(User $user, Bill $bill)
    {
        return ($user->haveAccess('force-delete-bill'))
                    ? Response::allow()
                    : Response::deny('You can\'t force delete this bill');
    }
}
