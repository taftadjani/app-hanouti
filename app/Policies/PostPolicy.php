<?php

namespace App\Policies;

use App\Post;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PostPolicy
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
        return $user->haveAccess('index-post')
        ? Response::allow()
        : Response::deny('You can\'t see any post');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function view(User $user, Post $post)
    {
        return ($user->haveAccess('show-post')) ||
                ($user->haveAccess('show-post') && $post->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t see this post');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->haveAccess('create-post')
        ? Response::allow()
        : Response::deny('You can\'t create a post');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function update(User $user, Post $post)
    {
        return ($user->haveAccess('update-post')) ||
               ($user->haveAccess('update-own-post') && $post->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t update this post');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function delete(User $user, Post $post)
    {
        return ($user->haveAccess('delete-post')) ||
        ($user->haveAccess('delete-own-post') && $post->user->id === $user->id)
                 ? Response::allow()
                 : Response::deny('You can\'t delete this post');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function restore(User $user, Post $post)
    {
        return ($user->haveAccess('restore-post')) ||
                ($user->haveAccess('restore-own-post') && $post->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this post');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function forceDelete(User $user, Post $post)
    {
        return ($user->haveAccess('force-delete-post'))
        ? Response::allow()
        : Response::deny('You can\'t force delete this post');
    }
}
