<?php

namespace App\Policies;

use App\DeliveryMode;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class DeliveryModePolicy
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
        return $user->haveAccess('index-delivery-mode')
        ? Response::allow()
        : Response::deny('You can\'t see any delivery-mode');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\DeliveryMode  $deliveryMode
     * @return mixed
     */
    public function view(User $user, DeliveryMode $deliveryMode)
    {
        return ($user->haveAccess('show-delivery-mode')) ||
                ($user->haveAccess('show-delivery-mode') && $deliveryMode->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t see this delivery-mode');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->haveAccess('create-delivery-mode')
                                ? Response::allow()
                                : Response::deny('You can\'t create a delivery-mode');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\DeliveryMode  $deliveryMode
     * @return mixed
     */
    public function update(User $user, DeliveryMode $deliveryMode)
    {
        return ($user->haveAccess('update-delivery-mode')) ||
               ($user->haveAccess('update-own-delivery-mode') && $deliveryMode->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t update this delivery-mode');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\DeliveryMode  $deliveryMode
     * @return mixed
     */
    public function delete(User $user, DeliveryMode $deliveryMode)
    {
        return ($user->haveAccess('delete-delivery-mode')) ||
               ($user->haveAccess('delete-own-delivery-mode') && $deliveryMode->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this delivery-mode');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\DeliveryMode  $deliveryMode
     * @return mixed
     */
    public function restore(User $user, DeliveryMode $deliveryMode)
    {
        return ($user->haveAccess('restore-delivery-mode')) ||
                ($user->haveAccess('restore-own-delivery-mode') && $deliveryMode->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this delivery-mode');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\DeliveryMode  $deliveryMode
     * @return mixed
     */
    public function forceDelete(User $user, DeliveryMode $deliveryMode)
    {
        return ($user->haveAccess('force-delete-delivery-mode'))
        ? Response::allow()
        : Response::deny('You can\'t force delete this delivery-mode');
    }
}
