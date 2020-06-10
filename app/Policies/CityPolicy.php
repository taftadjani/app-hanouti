<?php

namespace App\Policies;

use App\City;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class CityPolicy
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
        return $user->haveAccess('index-city')
                                ? Response::allow()
                                : Response::deny('You can\'t see any city');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\City  $city
     * @return mixed
     */
    public function view(User $user, City $city)
    {
        return ($user->haveAccess('show-city')) ||
                ($user->haveAccess('show-city') && $city->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t see this city');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->haveAccess('create-city')
                                ? Response::allow()
                                : Response::deny('You can\'t create a city');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\City  $city
     * @return mixed
     */
    public function update(User $user, City $city)
    {
        return ($user->haveAccess('update-city')) ||
               ($user->haveAccess('update-own-city') && $city->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t update this city');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\City  $city
     * @return mixed
     */
    public function delete(User $user, City $city)
    {
        return ($user->haveAccess('delete-city')) ||
               ($user->haveAccess('delete-own-city') && $city->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this city');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\City  $city
     * @return mixed
     */
    public function restore(User $user, City $city)
    {
        return ($user->haveAccess('restore-city')) ||
        ($user->haveAccess('restore-own-city') && $city->user->id === $user->id)
                ? Response::allow()
                : Response::deny('You can\'t delete this city');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\City  $city
     * @return mixed
     */
    public function forceDelete(User $user, City $city)
    {
        return ($user->haveAccess('force-delete-city'))
        ? Response::allow()
        : Response::deny('You can\'t force delete this city');
    }
}
