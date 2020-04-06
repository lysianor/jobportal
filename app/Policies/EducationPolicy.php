<?php

namespace App\Policies;

use App\Education;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EducationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any education.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the education.
     *
     * @param  \App\User  $user
     * @param  \App\Education  $education
     * @return mixed
     */
    public function view(User $user, Education $education)
    {
        return $user->id == $education->user_id;
    }

    /**
     * Determine whether the user can create education.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the education.
     *
     * @param  \App\User  $user
     * @param  \App\Education  $education
     * @return mixed
     */
    public function update(User $user, Education $education)
    {
        //
    }

    /**
     * Determine whether the user can delete the education.
     *
     * @param  \App\User  $user
     * @param  \App\Education  $education
     * @return mixed
     */
    public function delete(User $user, Education $education)
    {
        //
    }

    /**
     * Determine whether the user can restore the education.
     *
     * @param  \App\User  $user
     * @param  \App\Education  $education
     * @return mixed
     */
    public function restore(User $user, Education $education)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the education.
     *
     * @param  \App\User  $user
     * @param  \App\Education  $education
     * @return mixed
     */
    public function forceDelete(User $user, Education $education)
    {
        //
    }
}
