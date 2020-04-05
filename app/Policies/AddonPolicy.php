<?php

namespace App\Policies;

use App\Models\Addon;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AddonPolicy
{
    use HandlesAuthorization;
    const MODAL = 'addon';


    /**
     * Determine whether the user can view the service.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Addon  $addon
     * @return mixed
     */
    public function view(User $user, Addon $addon)
    {
        return $user->isAdminOrAbove ? $user->role->privileges->where('name', self::MODAL)->first()->pivot->{__FUNCTION__} : $user->id === $addon->user_id;
    }

    /**
     * Determine whether the user can create services.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role->privileges->where('name', self::MODAL)->first() ? $user->role->privileges->where('name', self::MODAL)->first()->pivot->{__FUNCTION__} : false;
    }

    /**
     * Determine whether the user can update the service.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Addon  $addon
     * @return mixed
     */
    public function update(User $user, Addon $addon)
    {
        return $user->isAdminOrAbove ? $user->role->privileges->where('name', self::MODAL)->first()->pivot->{__FUNCTION__} : false;
    }

    /**
     * Determine whether the user can delete the service.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Addon  $addon
     * @return mixed
     */
    public function delete(User $user, Addon $addon)
    {
        return $user->isAdminOrAbove ? $user->role->privileges->where('name', self::MODAL)->first()->pivot->{__FUNCTION__} : false;
    }

    /**
     * Determine whether the user can restore the service.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Addon  $addon
     * @return mixed
     */
    public function restore(User $user, Addon $addon)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the service.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Addon  $addon
     * @return mixed
     */
    public function forceDelete(User $user, Addon $addon)
    {
        //
    }
}
