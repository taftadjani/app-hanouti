<?php

namespace App\Policies;

use App\Category;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class CategoryPolicy
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
        return $user->haveAccess('index-category')
                                ? Response::allow()
                                : Response::deny('You can\'t see any category');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Category  $category
     * @return mixed
     */
    public function view(User $user, Category $category)
    {
        return ($user->haveAccess('show-category')) ||
                ($user->haveAccess('show-category') && $category->user->id === $user->id)
                ? Response::allow()
                : Response::deny('You can\'t see this category');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->haveAccess('create-category')
                ? Response::allow()
                : Response::deny('You can\'t create a category');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Category  $category
     * @return mixed
     */
    public function update(User $user, Category $category)
    {
        return ($user->haveAccess('update-category')) ||
               ($user->haveAccess('update-own-category') && $category->user->id === $user->id)
                    ? Response::allow()
                    : Response::deny('You can\'t update this category');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Category  $category
     * @return mixed
     */
    public function delete(User $user, Category $category)
    {
        return ($user->haveAccess('delete-category')) ||
               ($user->haveAccess('delete-own-category') && $category->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this category');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Category  $category
     * @return mixed
     */
    public function restore(User $user, Category $category)
    {
        return ($user->haveAccess('restore-category')) ||
                ($user->haveAccess('restore-own-category') && $category->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this category');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Category  $category
     * @return mixed
     */
    public function forceDelete(User $user, Category $category)
    {
        return ($user->haveAccess('force-delete-category'))
                    ? Response::allow()
                    : Response::deny('You can\'t force delete this category');
    }
}
