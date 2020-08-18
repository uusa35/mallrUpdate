<?php

namespace App\Observers;


use App\Mail\WelcomeNewUser;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Mail\Markdown;
use Illuminate\Support\Facades\Mail;

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
//        $markdown = new Markdown(view(), config('mail.markdown'));
//        return $markdown->render('emails.new_user', ['user' => $user, 'settings' => Setting::first()]);
        return Mail::to($user->email)->send(new WelcomeNewUser($user));

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
