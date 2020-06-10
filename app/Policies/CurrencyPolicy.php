<?php

namespace App\Policies;

use App\Currency;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class CurrencyPolicy
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
        return $user->haveAccess('index-currency')
                                ? Response::allow()
                                : Response::deny('You can\'t see any currency');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Currency  $currency
     * @return mixed
     */
    public function view(User $user, Currency $currency)
    {
        return ($user->haveAccess('show-currency')) ||
                ($user->haveAccess('show-currency') && $currency->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t see this currency');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->haveAccess('create-currency')
                                ? Response::allow()
                                : Response::deny('You can\'t create a currency');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Currency  $currency
     * @return mixed
     */
    public function update(User $user, Currency $currency)
    {
        return ($user->haveAccess('update-currency')) ||
        ($user->haveAccess('update-own-currency') && $currency->user->id === $user->id)
                         ? Response::allow()
                         : Response::deny('You can\'t update this currency');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Currency  $currency
     * @return mixed
     */
    public function delete(User $user, Currency $currency)
    {
        return ($user->haveAccess('delete-currency')) ||
               ($user->haveAccess('delete-own-currency') && $currency->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this currency');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Currency  $currency
     * @return mixed
     */
    public function restore(User $user, Currency $currency)
    {
        return ($user->haveAccess('restore-currency')) ||
                ($user->haveAccess('restore-own-currency') && $currency->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this currency');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Currency  $currency
     * @return mixed
     */
    public function forceDelete(User $user, Currency $currency)
    {
        return ($user->haveAccess('force-delete-currency'))
                    ? Response::allow()
                    : Response::deny('You can\'t force delete this currency');
    }
}
