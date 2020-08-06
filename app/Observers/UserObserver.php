<?php

namespace App\Observers;


use App\Models\Setting;
use App\Models\User;

class UserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param \App\User $user
     * @return void
     */
    public function created(User $user)
    {
        activity()
            ->performedOn($user)
            ->causedBy(auth()->user())
            ->log(strtoupper(class_basename($user)) . ' ' . __FUNCTION__);
    }

    /**
     * Handle the user "updated" event.
     *
     * @param \App\User $user
     * @return void
     */
    public function updated(User $user)
    {
        activity()->performedOn($user)
            ->causedBy(auth()->user())
            ->log(strtoupper(class_basename($user)) . ' ' . __FUNCTION__);
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param \App\User $user
     * @return void
     */
    public function deleted(User $user)
    {
        activity()->performedOn($user)
            ->causedBy(auth()->user())
            ->log(class_basename($user) . ' ' . __FUNCTION__);
    }

    /**
     * Handle the user "restored" event.
     *
     * @param \App\User $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param \App\User $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        activity()->performedOn($user)
            ->causedBy(auth()->user())
            ->log(class_basename($user) . ' ' . __FUNCTION__);
    }
}
