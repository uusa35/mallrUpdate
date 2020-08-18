<?php

namespace App\Mail;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeNewUser extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $settings;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->settings = Setting::first();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.new_user')->subject(trans('general.welcome') . ' ' . $this->user->name .' - '. $this->settings->company);
    }
}
