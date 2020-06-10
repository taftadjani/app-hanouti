<?php

namespace App\Policies;

use App\Author;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class AuthorPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //ZsaSGg
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->haveAccess('index-author')
                                ? Response::allow()
                                : Response::deny('You can\'t see any author');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Brand  $brand
     * @return mixed
     */
    public function view(User $user, Author $author)
    {
        return $user->haveAccess('show-author')
                                ? Response::allow()
                                : Response::deny('You can\'t see this author');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->haveAccess('create-author')
                                ? Response::allow()
                                : Response::deny('You can\'t create a author');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Brand  $author
     * @return mixed
     */
    public function update(User $user, Author $author)
    {
        return ($user->haveAccess('update-author')) ||
               ($user->haveAccess('update-own-author') && $author->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t update this author');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Author  $author
     * @return mixed
     */
    public function delete(User $user, Author $author)
    {
        return ($user->haveAccess('delete-author')) ||
               ($user->haveAccess('delete-own-author') && $author->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this author');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Author  $author
     * @return mixed
     */
    public function restore(User $user, Author $author)
    {
        return ($user->haveAccess('restore-author')) ||
                ($user->haveAccess('restore-own-author') && $author->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this author');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Author  $author
     * @return mixed
     */
    public function forceDelete(User $user, Author $author)
    {
        return ($user->haveAccess('force-delete-author'))
                    ? Response::allow()
                    : Response::deny('You can\'t force delete this author');
    }
}
