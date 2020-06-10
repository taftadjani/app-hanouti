<?php

namespace App\Policies;

use App\Company;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class CompanyPolicy
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
        return $user->haveAccess('index-company')
        ? Response::allow()
        : Response::deny('You can\'t see any company');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Company  $company
     * @return mixed
     */
    public function view(User $user, Company $company)
    {
        return ($user->haveAccess('show-company')) ||
        ($user->haveAccess('show-company') && $company->user->id === $user->id)
        ? Response::allow()
        : Response::deny('You can\'t see this company');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->haveAccess('create-company')
        ? Response::allow()
        : Response::deny('You can\'t create a company');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Company  $company
     * @return mixed
     */
    public function update(User $user, Company $company)
    {
        return ($user->haveAccess('update-company')) ||
               ($user->haveAccess('update-own-company') && $company->user->id === $user->id)
                    ? Response::allow()
                    : Response::deny('You can\'t update this company');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Company  $company
     * @return mixed
     */
    public function delete(User $user, Company $company)
    {
        return ($user->haveAccess('delete-company')) ||
               ($user->haveAccess('delete-own-company') && $company->user->id === $user->id)
                        ? Response::allow()
                        : Response::deny('You can\'t delete this company');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Company  $company
     * @return mixed
     */
    public function restore(User $user, Company $company)
    {
        return ($user->haveAccess('restore-company')) ||
        ($user->haveAccess('restore-own-company') && $company->user->id === $user->id)
                ? Response::allow()
                : Response::deny('You can\'t delete this company');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Company  $company
     * @return mixed
     */
    public function forceDelete(User $user, Company $company)
    {
        return ($user->haveAccess('force-delete-company'))
        ? Response::allow()
        : Response::deny('You can\'t force delete this company');
    }
}
