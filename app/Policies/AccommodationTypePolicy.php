<?php

namespace App\Policies;

use App\Models\AccommodationType;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccommodationTypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AccommodationType  $accommodationType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, AccommodationType $accommodationType)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasRole(['Super-Admin', 'Admin']);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AccommodationType  $accommodationType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, AccommodationType $accommodationType)
    {
        return $user->hasRole(['Super-Admin', 'Admin']);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AccommodationType  $accommodationType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, AccommodationType $accommodationType)
    {
        return $user->hasRole(['Super-Admin', 'Admin']);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AccommodationType  $accommodationType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, AccommodationType $accommodationType)
    {
        return $user->hasRole(['Super-Admin', 'Admin']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AccommodationType  $accommodationType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, AccommodationType $accommodationType)
    {
        return $user->hasRole(['Super-Admin', 'Admin']);
    }
}
