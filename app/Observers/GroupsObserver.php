<?php

namespace App\Observers;

use App\Models\Group;

class GroupsObserver
{
    /**
     * Handle the group "creating" event.
     *
     * @param  \App\Group  $group
     * @return void
     */
    public function creating(Group $group)
    {
        return $group->active = 1;
    }

    /**
     * Handle the group "updating" event.
     *
     * @param Group $group
     * @return void
     */
    public function updating(Group $group)
    {
        //
    }
}
