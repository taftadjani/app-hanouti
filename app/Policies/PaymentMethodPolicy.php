<?php

namespace App\Policies;

use App\PaymentMethod;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PaymentMethodPolicy
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
        return $user->haveAccess('index-payment-method')
        ? Response::allow()
        : Response::deny('You can\'t see any payment-method');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\PaymentMethod  $paymentMethod
     * @return mixed
     */
    public function view(User $user, PaymentMethod $paymentMethod)
    {
        return ($user->haveAccess('show-payment-method')) ||
                ($user->haveAccess('show-payment-method') && $paymentMethod->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t see this payment-method');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->haveAccess('create-payment-method')
        ? Response::allow()
        : Response::deny('You can\'t create a payment-method');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\PaymentMethod  $paymentMethod
     * @return mixed
     */
    public function update(User $user, PaymentMethod $paymentMethod)
    {
        return ($user->haveAccess('update-payment-method')) ||
               ($user->haveAccess('update-own-payment-method') && $paymentMethod->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t update this payment-method');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\PaymentMethod  $paymentMethod
     * @return mixed
     */
    public function delete(User $user, PaymentMethod $paymentMethod)
    {
        return ($user->haveAccess('delete-payment-method')) ||
        ($user->haveAccess('delete-own-payment-method') && $paymentMethod->user->id === $user->id)
                 ? Response::allow()
                 : Response::deny('You can\'t delete this payment-method');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\PaymentMethod  $paymentMethod
     * @return mixed
     */
    public function restore(User $user, PaymentMethod $paymentMethod)
    {
        return ($user->haveAccess('restore-payment-method')) ||
                ($user->haveAccess('restore-own-payment-method') && $paymentMethod->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this payment-method');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\PaymentMethod  $paymentMethod
     * @return mixed
     */
    public function forceDelete(User $user, PaymentMethod $paymentMethod)
    {
        return ($user->haveAccess('force-delete-payment-method'))
        ? Response::allow()
        : Response::deny('You can\'t force delete this payment-method');
    }
}
