<?php

namespace App\Policies;

use App\Models\User;
use App\Branch;
use Illuminate\Auth\Access\HandlesAuthorization;

class BranchPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the branch.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Branch  $branch
     * @return mixed
     */
    public function view(User $user, Branch $branch)
    {
        //
    }

    /**
     * Determine whether the user can create branches.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the branch.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Branch  $branch
     * @return mixed
     */
    public function update(User $user, Branch $branch)
    {
        //
    }

    /**
     * Determine whether the user can delete the branch.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Branch  $branch
     * @return mixed
     */
    public function delete(User $user, Branch $branch)
    {
        //
    }

    /**
     * Determine whether the user can restore the branch.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Branch  $branch
     * @return mixed
     */
    public function restore(User $user, Branch $branch)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the branch.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Branch  $branch
     * @return mixed
     */
    public function forceDelete(User $user, Branch $branch)
    {
        //
    }
}
