<?php

namespace App\Policies;

use App\Models\Item;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItemPolicy
{
    use HandlesAuthorization;
    const MODAL = 'item';


    /**
     * Determine whether the user can view the service.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Item  $item
     * @return mixed
     */
    public function view(User $user, Item $item)
    {
        return $user->isAdminOrAbove ? $user->role->privileges->where('name', self::MODAL)->first()->pivot->{__FUNCTION__} : $user->id === $item->user_id;
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
     * @param  \App\Item  $item
     * @return mixed
     */
    public function update(User $user, Item $item)
    {
        return $user->isAdminOrAbove ? $user->role->privileges->where('name', self::MODAL)->first()->pivot->{__FUNCTION__} : false;
    }

    /**
     * Determine whether the user can delete the service.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Item  $item
     * @return mixed
     */
    public function delete(User $user, Item $item)
    {
        return $user->isAdminOrAbove ? $user->role->privileges->where('name', self::MODAL)->first()->pivot->{__FUNCTION__} : false;
    }

    /**
     * Determine whether the user can restore the service.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Item  $item
     * @return mixed
     */
    public function restore(User $user, Item $item)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the service.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Item  $item
     * @return mixed
     */
    public function forceDelete(User $user, Item $item)
    {
        //
    }
}
