<?php

namespace App\Policies;

use App\Location;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class LocationPolicy
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
        return $user->haveAccess('index-location')
                                ? Response::allow()
                                : Response::deny('You can\'t see any location');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Location  $location
     * @return mixed
     */
    public function view(User $user, Location $location)
    {
        return ($user->haveAccess('show-location')) ||
                ($user->haveAccess('show-location') && $location->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t see this location');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->haveAccess('create-location')
                                ? Response::allow()
                                : Response::deny('You can\'t create a location');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Location  $location
     * @return mixed
     */
    public function update(User $user, Location $location)
    {
        return ($user->haveAccess('update-location')) ||
               ($user->haveAccess('update-own-location') && $location->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t update this location');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Location  $location
     * @return mixed
     */
    public function delete(User $user, Location $location)
    {
        return ($user->haveAccess('delete-location')) ||
               ($user->haveAccess('delete-own-location') && $location->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this location');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Location  $location
     * @return mixed
     */
    public function restore(User $user, Location $location)
    {
        return ($user->haveAccess('restore-location')) ||
                ($user->haveAccess('restore-own-location') && $location->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this location');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Location  $location
     * @return mixed
     */
    public function forceDelete(User $user, Location $location)
    {
        return ($user->haveAccess('force-delete-location'))
                    ? Response::allow()
                    : Response::deny('You can\'t force delete this location');
    }
}
