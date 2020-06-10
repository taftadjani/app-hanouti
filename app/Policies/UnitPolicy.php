<?php

namespace App\Policies;

use App\Unit;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class UnitPolicy
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
        return $user->haveAccess('index-unit')
        ? Response::allow()
        : Response::deny('You can\'t see any unit');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Unit  $unit
     * @return mixed
     */
    public function view(User $user, Unit $unit)
    {
        return ($user->haveAccess('show-unit')) ||
                ($user->haveAccess('show-unit') && $unit->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t see this unit');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->haveAccess('create-unit')
                                ? Response::allow()
                                : Response::deny('You can\'t create a unit');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Unit  $unit
     * @return mixed
     */
    public function update(User $user, Unit $unit)
    {
        return ($user->haveAccess('update-unit')) ||
               ($user->haveAccess('update-own-unit') && $unit->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t update this unit');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Unit  $unit
     * @return mixed
     */
    public function delete(User $user, Unit $unit)
    {
        return ($user->haveAccess('delete-unit')) ||
               ($user->haveAccess('delete-own-unit') && $unit->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this unit');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Unit  $unit
     * @return mixed
     */
    public function restore(User $user, Unit $unit)
    {
        return ($user->haveAccess('restore-unit')) ||
                ($user->haveAccess('restore-own-unit') && $unit->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this unit');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Unit  $unit
     * @return mixed
     */
    public function forceDelete(User $user, Unit $unit)
    {
        return ($user->haveAccess('force-delete-unit'))
                    ? Response::allow()
                    : Response::deny('You can\'t force delete this unit');
    }
}
