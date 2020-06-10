<?php

namespace App\Policies;

use App\Newsletter;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class NewsletterPolicy
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
        return $user->haveAccess('index-newsletter')
                                ? Response::allow()
                                : Response::deny('You can\'t see any newsletter');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Newsletter  $newsletter
     * @return mixed
     */
    public function view(User $user, Newsletter $newsletter)
    {
        return ($user->haveAccess('show-newsletter')) ||
                ($user->haveAccess('show-newsletter') && $newsletter->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t see this newsletter');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->haveAccess('create-newsletter')
                                ? Response::allow()
                                : Response::deny('You can\'t create a newsletter');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Newsletter  $newsletter
     * @return mixed
     */
    public function update(User $user, Newsletter $newsletter)
    {
        return ($user->haveAccess('update-newsletter')) ||
        ($user->haveAccess('update-own-newsletter') && $newsletter->user->id === $user->id)
                         ? Response::allow()
                         : Response::deny('You can\'t update this newsletter');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Newsletter  $newsletter
     * @return mixed
     */
    public function delete(User $user, Newsletter $newsletter)
    {
        return ($user->haveAccess('delete-newsletter')) ||
               ($user->haveAccess('delete-own-newsletter') && $newsletter->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this newsletter');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Newsletter  $newsletter
     * @return mixed
     */
    public function restore(User $user, Newsletter $newsletter)
    {
        return ($user->haveAccess('restore-newsletter')) ||
        ($user->haveAccess('restore-own-newsletter') && $newsletter->user->id === $user->id)
                ? Response::allow()
                : Response::deny('You can\'t delete this newsletter');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Newsletter  $newsletter
     * @return mixed
     */
    public function forceDelete(User $user, Newsletter $newsletter)
    {
        return ($user->haveAccess('force-delete-newsletter'))
                    ? Response::allow()
                    : Response::deny('You can\'t force delete this newsletter');
    }
}
