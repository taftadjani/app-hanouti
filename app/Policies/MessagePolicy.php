<?php

namespace App\Policies;

use App\Message;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class MessagePolicy
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
        return $user->haveAccess('index-message')
                                ? Response::allow()
                                : Response::deny('You can\'t see any message');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Message  $message
     * @return mixed
     */
    public function view(User $user, Message $message)
    {
        return ($user->haveAccess('show-message')) ||
                ($user->haveAccess('show-message') && $message->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t see this message');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->haveAccess('create-message')
        ? Response::allow()
        : Response::deny('You can\'t create a message');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Message  $message
     * @return mixed
     */
    public function update(User $user, Message $message)
    {
        return ($user->haveAccess('update-message')) ||
               ($user->haveAccess('update-own-message') && $message->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t update this message');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Message  $message
     * @return mixed
     */
    public function delete(User $user, Message $message)
    {
        return ($user->haveAccess('delete-message')) ||
        ($user->haveAccess('delete-own-message') && $message->user->id === $user->id)
                 ? Response::allow()
                 : Response::deny('You can\'t delete this message');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Message  $message
     * @return mixed
     */
    public function restore(User $user, Message $message)
    {
        return ($user->haveAccess('restore-message')) ||
                ($user->haveAccess('restore-own-message') && $message->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this message');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Message  $message
     * @return mixed
     */
    public function forceDelete(User $user, Message $message)
    {
        return ($user->haveAccess('force-delete-message'))
                    ? Response::allow()
                    : Response::deny('You can\'t force delete this message');
    }
}
