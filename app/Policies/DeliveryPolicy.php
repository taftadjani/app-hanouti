<?php

namespace App\Policies;

use App\Delivery;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class DeliveryPolicy
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
        return $user->haveAccess('index-delivery')
                                ? Response::allow()
                                : Response::deny('You can\'t see any delivery');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Delivery  $delivery
     * @return mixed
     */
    public function view(User $user, Delivery $delivery)
    {
        return ($user->haveAccess('show-delivery')) ||
                ($user->haveAccess('show-delivery') && $delivery->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t see this delivery');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->haveAccess('create-delivery')
                                ? Response::allow()
                                : Response::deny('You can\'t create a delivery');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Delivery  $delivery
     * @return mixed
     */
    public function update(User $user, Delivery $delivery)
    {
        return ($user->haveAccess('update-delivery')) ||
               ($user->haveAccess('update-own-delivery') && $delivery->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t update this delivery');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Delivery  $delivery
     * @return mixed
     */
    public function delete(User $user, Delivery $delivery)
    {
        return ($user->haveAccess('delete-delivery')) ||
               ($user->haveAccess('delete-own-delivery') && $delivery->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this delivery');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Delivery  $delivery
     * @return mixed
     */
    public function restore(User $user, Delivery $delivery)
    {
        return ($user->haveAccess('restore-delivery')) ||
                ($user->haveAccess('restore-own-delivery') && $delivery->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this delivery');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Delivery  $delivery
     * @return mixed
     */
    public function forceDelete(User $user, Delivery $delivery)
    {
        return ($user->haveAccess('force-delete-delivery'))
                    ? Response::allow()
                    : Response::deny('You can\'t force delete this delivery');
    }
}
