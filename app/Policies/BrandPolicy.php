<?php

namespace App\Policies;

use App\Brand;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class BrandPolicy
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
        return $user->haveAccess('index-brand')
                                ? Response::allow()
                                : Response::deny('You can\'t see any brand');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Brand  $brand
     * @return mixed
     */
    public function view(User $user, Brand $brand)
    {
        return ($user->haveAccess('show-brand')) ||
                ($user->haveAccess('show-brand') && $brand->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t see this brand');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->haveAccess('create-brand')
                                ? Response::allow()
                                : Response::deny('You can\'t create a brand');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Brand  $brand
     * @return mixed
     */
    public function update(User $user, Brand $brand)
    {
        return ($user->haveAccess('update-brand')) ||
               ($user->haveAccess('update-own-brand') && $brand->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t update this brand');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Brand  $brand
     * @return mixed
     */
    public function delete(User $user, Brand $brand)
    {
        return ($user->haveAccess('delete-brand')) ||
               ($user->haveAccess('delete-own-brand') && $brand->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this brand');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Brand  $brand
     * @return mixed
     */
    public function restore(User $user, Brand $brand)
    {
        return ($user->haveAccess('restore-brand')) ||
                ($user->haveAccess('restore-own-brand') && $brand->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this brand');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Brand  $brand
     * @return mixed
     */
    public function forceDelete(User $user, Brand $brand)
    {
        return ($user->haveAccess('force-delete-brand'))
                    ? Response::allow()
                    : Response::deny('You can\'t force delete this brand');
    }
}
