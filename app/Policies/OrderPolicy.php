<?php

namespace App\Policies;

use App\Order;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class OrderPolicy
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
        return $user->haveAccess('index-order')
        ? Response::allow()
        : Response::deny('You can\'t see any order');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Order  $order
     * @return mixed
     */
    public function view(User $user, Order $order)
    {
        return ($user->haveAccess('show-order')) ||
                ($user->haveAccess('show-order') && $order->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t see this order');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->haveAccess('create-order')
        ? Response::allow()
        : Response::deny('You can\'t create a order');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Order  $order
     * @return mixed
     */
    public function update(User $user, Order $order)
    {
        return ($user->haveAccess('update-order')) ||
               ($user->haveAccess('update-own-order') && $order->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t update this order');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Order  $order
     * @return mixed
     */
    public function delete(User $user, Order $order)
    {
        return ($user->haveAccess('delete-order')) ||
        ($user->haveAccess('delete-own-order') && $order->user->id === $user->id)
                 ? Response::allow()
                 : Response::deny('You can\'t delete this order');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Order  $order
     * @return mixed
     */
    public function restore(User $user, Order $order)
    {
        return ($user->haveAccess('restore-order')) ||
                ($user->haveAccess('restore-own-order') && $order->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this order');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Order  $order
     * @return mixed
     */
    public function forceDelete(User $user, Order $order)
    {
        return ($user->haveAccess('force-delete-order'))
        ? Response::allow()
        : Response::deny('You can\'t force delete this order');
    }
}
