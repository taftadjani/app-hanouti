<?php

namespace App\Policies;

use App\SubComment;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class SubCommentPolicy
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
        return $user->haveAccess('index-sub-comment')
                                ? Response::allow()
                                : Response::deny('You can\'t see any sub-comment');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\SubComment  $subComment
     * @return mixed
     */
    public function view(User $user, SubComment $subComment)
    {
        return ($user->haveAccess('show-sub-comment')) ||
                ($user->haveAccess('show-sub-comment') && $subComment->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t see this sub-comment');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->haveAccess('create-sub-comment')
                                ? Response::allow()
                                : Response::deny('You can\'t create a sub-comment');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\SubComment  $subComment
     * @return mixed
     */
    public function update(User $user, SubComment $subComment)
    {
        return ($user->haveAccess('update-sub-comment')) ||
               ($user->haveAccess('update-own-sub-comment') && $subComment->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t update this sub-comment');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\SubComment  $subComment
     * @return mixed
     */
    public function delete(User $user, SubComment $subComment)
    {
        return ($user->haveAccess('delete-sub-comment')) ||
               ($user->haveAccess('delete-own-sub-comment') && $subComment->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this sub-comment');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\SubComment  $subComment
     * @return mixed
     */
    public function restore(User $user, SubComment $subComment)
    {
        return ($user->haveAccess('restore-sub-comment')) ||
        ($user->haveAccess('restore-own-sub-comment') && $subComment->user->id === $user->id)
                ? Response::allow()
                : Response::deny('You can\'t delete this sub-comment');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\SubComment  $subComment
     * @return mixed
     */
    public function forceDelete(User $user, SubComment $subComment)
    {
        return ($user->haveAccess('force-delete-sub-comment'))
        ? Response::allow()
        : Response::deny('You can\'t force delete this sub-comment');
    }
}
