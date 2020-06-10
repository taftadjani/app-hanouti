<?php

namespace App\Policies;

use App\Modele;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ModelePolicy
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
        return $user->haveAccess('index-modele')
                                ? Response::allow()
                                : Response::deny('You can\'t see any modele');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Modele  $modele
     * @return mixed
     */
    public function view(User $user, Modele $modele)
    {
        return ($user->haveAccess('show-modele')) ||
                ($user->haveAccess('show-modele') && $modele->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t see this modele');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->haveAccess('create-modele')
                                ? Response::allow()
                                : Response::deny('You can\'t create a modele');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Modele  $modele
     * @return mixed
     */
    public function update(User $user, Modele $modele)
    {
        return ($user->haveAccess('update-modele')) ||
               ($user->haveAccess('update-own-modele') && $modele->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t update this modele');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Modele  $modele
     * @return mixed
     */
    public function delete(User $user, Modele $modele)
    {
        return ($user->haveAccess('delete-modele')) ||
               ($user->haveAccess('delete-own-modele') && $modele->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t delete this modele');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Modele  $modele
     * @return mixed
     */
    public function restore(User $user, Modele $modele)
    {
        return ($user->haveAccess('restore-modele')) ||
                ($user->haveAccess('restore-own-modele') && $modele->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t delete this modele');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Modele  $modele
     * @return mixed
     */
    public function forceDelete(User $user, Modele $modele)
    {
        return ($user->haveAccess('force-delete-modele'))
                                ? Response::allow()
                                : Response::deny('You can\'t force delete this modele');
    }
}
