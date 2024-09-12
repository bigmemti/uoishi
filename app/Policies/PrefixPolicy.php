<?php

namespace App\Policies;

use App\Models\Prefix;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PrefixPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->is_admin) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user, User $owner)
    {
        return $user == $owner;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Prefix  $prefix
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Prefix $prefix)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Prefix  $prefix
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Prefix $prefix)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Prefix  $prefix
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Prefix $prefix)
    {
        return $user->id == $prefix->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Prefix  $prefix
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Prefix $prefix)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Prefix  $prefix
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Prefix $prefix)
    {
        //
    }
}
