<?php

namespace App\Policies;

use App\Payment;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PaymentPolicy
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
        return $user->haveAccess('index-payment')
        ? Response::allow()
        : Response::deny('You can\'t see any payment');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Payment  $payment
     * @return mixed
     */
    public function view(User $user, Payment $payment)
    {
        return ($user->haveAccess('show-payment')) ||
                ($user->haveAccess('show-payment') && $payment->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t see this payment');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->haveAccess('create-payment')
        ? Response::allow()
        : Response::deny('You can\'t create a payment');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Payment  $payment
     * @return mixed
     */
    public function update(User $user, Payment $payment)
    {
        return ($user->haveAccess('update-payment')) ||
               ($user->haveAccess('update-own-payment') && $payment->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t update this payment');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Payment  $payment
     * @return mixed
     */
    public function delete(User $user, Payment $payment)
    {
        return ($user->haveAccess('delete-payment')) ||
        ($user->haveAccess('delete-own-payment') && $payment->user->id === $user->id)
                 ? Response::allow()
                 : Response::deny('You can\'t delete this payment');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Payment  $payment
     * @return mixed
     */
    public function restore(User $user, Payment $payment)
    {
        return ($user->haveAccess('restore-payment')) ||
        ($user->haveAccess('restore-own-payment') && $payment->user->id === $user->id)
                ? Response::allow()
                : Response::deny('You can\'t delete this payment');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Payment  $payment
     * @return mixed
     */
    public function forceDelete(User $user, Payment $payment)
    {
        return ($user->haveAccess('force-delete-payment'))
        ? Response::allow()
        : Response::deny('You can\'t force delete this payment');
    }
}
