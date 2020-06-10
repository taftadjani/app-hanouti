<?php

namespace App\Policies;

use App\SubCategory;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class SubCategoryPolicy
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
        return $user->haveAccess('index-sub-category')
                    ? Response::allow()
                    : Response::deny('You can\'t see any sub-category');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\SubCategory  $subCategory
     * @return mixed
     */
    public function view(User $user, SubCategory $subCategory)
    {
        return ($user->haveAccess('show-sub-category')) ||
                ($user->haveAccess('show-sub-category') && $subCategory->user->id === $user->id)
                    ? Response::allow()
                    : Response::deny('You can\'t see this sub-category');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->haveAccess('create- sub-category')
                ? Response::allow()
                : Response::deny('You can\'t create a  sub-category');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\SubCategory  $subCategory
     * @return mixed
     */
    public function update(User $user, SubCategory $subCategory)
    {
        return ($user->haveAccess('update-sub-category')) ||
               ($user->haveAccess('update-own-sub-category') && $subCategory->user->id === $user->id)
                    ? Response::allow()
                    : Response::deny('You can\'t update this sub-category');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\SubCategory  $subCategory
     * @return mixed
     */
    public function delete(User $user, SubCategory $subCategory)
    {
        return ($user->haveAccess('delete-sub-category')) ||
               ($user->haveAccess('delete-own-sub-category') && $subCategory->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this sub-category');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\SubCategory  $subCategory
     * @return mixed
     */
    public function restore(User $user, SubCategory $subCategory)
    {
        return ($user->haveAccess('restore-sub-category')) ||
                ($user->haveAccess('restore-own-sub-category') && $subCategory->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this sub-category');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\SubCategory  $subCategory
     * @return mixed
     */
    public function forceDelete(User $user, SubCategory $subCategory)
    {
        return ($user->haveAccess('force-delete-sub-category'))
                    ? Response::allow()
                    : Response::deny('You can\'t force delete this sub-category');
    }
}
