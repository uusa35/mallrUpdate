<?php

namespace App\Policies;

use App\Models\User;
use App\Term;
use Illuminate\Auth\Access\HandlesAuthorization;

class TermPolicy
{
    use HandlesAuthorization;
    const MODAL = 'term';

    /**
     * Determine whether the user can view the term.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Term  $term
     * @return mixed
     */
    public function view(User $user, Term $term)
    {
        return $user->role->privileges->where('name', self::MODAL)->first() ? $user->role->privileges->where('name', self::MODAL)->first()->pivot->{__FUNCTION__} : false;
    }

    /**
     * Determine whether the user can create terms.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role->privileges->where('name', self::MODAL)->first() ? $user->role->privileges->where('name', self::MODAL)->first()->pivot->{__FUNCTION__} : false;
    }

    /**
     * Determine whether the user can update the term.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Term  $term
     * @return mixed
     */
    public function update(User $user, Term $term)
    {
        return $user->role->privileges->where('name', self::MODAL)->first() ? $user->role->privileges->where('name', self::MODAL)->first()->pivot->{__FUNCTION__} : false;
    }

    /**
     * Determine whether the user can delete the term.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Term  $term
     * @return mixed
     */
    public function delete(User $user, Term $term)
    {
        return $user->role->privileges->where('name', self::MODAL)->first() ? $user->role->privileges->where('name', self::MODAL)->first()->pivot->{__FUNCTION__} : false;
    }

    /**
     * Determine whether the user can restore the term.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Term  $term
     * @return mixed
     */
    public function restore(User $user, Term $term)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the term.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Term  $term
     * @return mixed
     */
    public function forceDelete(User $user, Term $term)
    {
        //
    }
}
