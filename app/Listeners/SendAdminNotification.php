<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendAdminNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        $user = $event->user;

        // Send email/notification to the admin
        Mail::to('jordantsap@hotmail.gr')->send(new \App\Mail\UserRegisteredEmail($user));

        // If using notifications instead of emails, you can use the following:
        // \App\Notifications\UserRegisteredNotification::dispatch($user);
    }
}
