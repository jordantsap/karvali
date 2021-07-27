<?php

namespace App\Observers;

use App\Models\Event;

class EventsObserver
{
    /**
     * Handle the event "creating" event.
     *
     * @param  \App\Event  $event
     * @return void
     */
    public function creating(Event $event)
    {
        return $event->active = 1;
    }

    /**
     * Handle the event "updating" event.
     *
     * @param  \App\Event  $event
     * @return void
     */
    public function updating(Event $event)
    {
        //
    }
}
