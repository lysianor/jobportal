<?php

namespace App\Policies;

use App\Language;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LanguagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any languages.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the language.
     *
     * @param  \App\User  $user
     * @param  \App\Language  $language
     * @return mixed
     */
    public function view(User $user, Language $language)
    {
        return $user->id == $language->user_id;
    }

    /**
     * Determine whether the user can create languages.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the language.
     *
     * @param  \App\User  $user
     * @param  \App\Language  $language
     * @return mixed
     */
    public function update(User $user, Language $language)
    {
        //
    }

    /**
     * Determine whether the user can delete the language.
     *
     * @param  \App\User  $user
     * @param  \App\Language  $language
     * @return mixed
     */
    public function delete(User $user, Language $language)
    {
        //
    }

    /**
     * Determine whether the user can restore the language.
     *
     * @param  \App\User  $user
     * @param  \App\Language  $language
     * @return mixed
     */
    public function restore(User $user, Language $language)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the language.
     *
     * @param  \App\User  $user
     * @param  \App\Language  $language
     * @return mixed
     */
    public function forceDelete(User $user, Language $language)
    {
        //
    }
}
