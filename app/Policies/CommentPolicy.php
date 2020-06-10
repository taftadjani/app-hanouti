<?php

namespace App\Policies;

use App\Comment;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class CommentPolicy
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
        return $user->haveAccess('index-comment')
                                ? Response::allow()
                                : Response::deny('You can\'t see any comment');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Comment  $comment
     * @return mixed
     */
    public function view(User $user, Comment $comment)
    {
        return ($user->haveAccess('show-comment')) ||
        ($user->haveAccess('show-comment') && $comment->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t see this comment');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->haveAccess('create-comment')
                                ? Response::allow()
                                : Response::deny('You can\'t create a comment');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Comment  $comment
     * @return mixed
     */
    public function update(User $user, Comment $comment)
    {
        return ($user->haveAccess('update-comment')) ||
               ($user->haveAccess('update-own-comment') && $comment->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t update this comment');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Comment  $comment
     * @return mixed
     */
    public function delete(User $user, Comment $comment)
    {
        return ($user->haveAccess('delete-comment')) ||
               ($user->haveAccess('delete-own-comment') && $comment->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this comment');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Comment  $comment
     * @return mixed
     */
    public function restore(User $user, Comment $comment)
    {
        return ($user->haveAccess('restore-comment')) ||
        ($user->haveAccess('restore-own-comment') && $comment->user->id === $user->id)
                ? Response::allow()
                : Response::deny('You can\'t delete this comment');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Comment  $comment
     * @return mixed
     */
    public function forceDelete(User $user, Comment $comment)
    {
        return ($user->haveAccess('force-delete-comment'))
                    ? Response::allow()
                    : Response::deny('You can\'t force delete this comment');
    }
}
