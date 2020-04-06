<?php

namespace App\Policies;

use App\Experience;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExperiencePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any experiences.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the experience.
     *
     * @param  \App\User  $user
     * @param  \App\Experience  $experience
     * @return mixed
     */
    public function view(User $user, Experience $experience)
    {
        return $user->id == $experience->user_id;
    }

    /**
     * Determine whether the user can create experiences.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the experience.
     *
     * @param  \App\User  $user
     * @param  \App\Experience  $experience
     * @return mixed
     */
    public function update(User $user, Experience $experience)
    {
        //
    }

    /**
     * Determine whether the user can delete the experience.
     *
     * @param  \App\User  $user
     * @param  \App\Experience  $experience
     * @return mixed
     */
    public function delete(User $user, Experience $experience)
    {
        //
    }

    /**
     * Determine whether the user can restore the experience.
     *
     * @param  \App\User  $user
     * @param  \App\Experience  $experience
     * @return mixed
     */
    public function restore(User $user, Experience $experience)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the experience.
     *
     * @param  \App\User  $user
     * @param  \App\Experience  $experience
     * @return mixed
     */
    public function forceDelete(User $user, Experience $experience)
    {
        //
    }
}
