<?php

namespace App\Policies;

use App\Provider;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ProviderPolicy
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
        return $user->haveAccess('index-provider')
        ? Response::allow()
        : Response::deny('You can\'t see any provider');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Provider  $provider
     * @return mixed
     */
    public function view(User $user, Provider $provider)
    {
        return ($user->haveAccess('show-provider')) ||
                ($user->haveAccess('show-provider') && $provider->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t see this provider');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->haveAccess('create-provider')
        ? Response::allow()
        : Response::deny('You can\'t create a provider');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Provider  $provider
     * @return mixed
     */
    public function update(User $user, Provider $provider)
    {
        return ($user->haveAccess('update-provider')) ||
        ($user->haveAccess('update-own-provider') && $provider->user->id === $user->id)
                         ? Response::allow()
                         : Response::deny('You can\'t update this provider');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Provider  $provider
     * @return mixed
     */
    public function delete(User $user, Provider $provider)
    {
        return ($user->haveAccess('delete-provider')) ||
        ($user->haveAccess('delete-own-provider') && $provider->user->id === $user->id)
                 ? Response::allow()
                 : Response::deny('You can\'t delete this provider');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Provider  $provider
     * @return mixed
     */
    public function restore(User $user, Provider $provider)
    {
        return ($user->haveAccess('restore-provider')) ||
                ($user->haveAccess('restore-own-provider') && $provider->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this provider');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Provider  $provider
     * @return mixed
     */
    public function forceDelete(User $user, Provider $provider)
    {
        return ($user->haveAccess('force-delete-provider'))
        ? Response::allow()
        : Response::deny('You can\'t force delete this provider');
    }
}
