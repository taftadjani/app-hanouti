<?php

namespace App\Policies;

use App\OrderDetail;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class OrderDetailPolicy
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
        return $user->haveAccess('index-order-detail')
                                ? Response::allow()
                                : Response::deny('You can\'t see any order-detail');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\OrderDetail  $orderDetail
     * @return mixed
     */
    public function view(User $user, OrderDetail $orderDetail)
    {
        return ($user->haveAccess('show-order-detail')) ||
                ($user->haveAccess('show-order-detail') && $orderDetail->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t see this order-detail');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->haveAccess('create-order-detail')
                                ? Response::allow()
                                : Response::deny('You can\'t create a order-detail');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\OrderDetail  $orderDetail
     * @return mixed
     */
    public function update(User $user, OrderDetail $orderDetail)
    {
        return ($user->haveAccess('update-order-detail')) ||
        ($user->haveAccess('update-own-order-detail') && $orderDetail->user->id === $user->id)
                         ? Response::allow()
                         : Response::deny('You can\'t update this order-detail');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\OrderDetail  $orderDetail
     * @return mixed
     */
    public function delete(User $user, OrderDetail $orderDetail)
    {
        return ($user->haveAccess('delete-order-detail')) ||
               ($user->haveAccess('delete-own-order-detail') && $orderDetail->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this order-detail');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\OrderDetail  $orderDetail
     * @return mixed
     */
    public function restore(User $user, OrderDetail $orderDetail)
    {
        return ($user->haveAccess('restore-order-detail')) ||
                ($user->haveAccess('restore-own-order-detail') && $orderDetail->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this order-detail');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\OrderDetail  $orderDetail
     * @return mixed
     */
    public function forceDelete(User $user, OrderDetail $orderDetail)
    {
        return ($user->haveAccess('force-delete-order-detail'))
        ? Response::allow()
        : Response::deny('You can\'t force delete this order-detail');
    }
}
