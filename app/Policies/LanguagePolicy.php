<?php

namespace App\Policies;

use App\Language;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class LanguagePolicy
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
        return $user->haveAccess('index-language')
                                ? Response::allow()
                                : Response::deny('You can\'t see any language');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Language  $language
     * @return mixed
     */
    public function view(User $user, Language $language)
    {
        return ($user->haveAccess('show-language')) ||
                ($user->haveAccess('show-language') && $language->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t see this language');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->haveAccess('create-language')
                                ? Response::allow()
                                : Response::deny('You can\'t create a language');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Language  $language
     * @return mixed
     */
    public function update(User $user, Language $language)
    {
        return ($user->haveAccess('update-language')) ||
               ($user->haveAccess('update-own-language') && $language->user->id === $user->id)
                                ? Response::allow()
                                : Response::deny('You can\'t update this language');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Language  $language
     * @return mixed
     */
    public function delete(User $user, Language $language)
    {
        return ($user->haveAccess('delete-language')) ||
               ($user->haveAccess('delete-own-language') && $language->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this language');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Language  $language
     * @return mixed
     */
    public function restore(User $user, Language $language)
    {
        return ($user->haveAccess('restore-language')) ||
                ($user->haveAccess('restore-own-language') && $language->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this language');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Language  $language
     * @return mixed
     */
    public function forceDelete(User $user, Language $language)
    {
        return ($user->haveAccess('force-delete-language'))
                    ? Response::allow()
                    : Response::deny('You can\'t force delete this language');
    }
}
