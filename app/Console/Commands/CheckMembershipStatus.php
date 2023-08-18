<?php

namespace App\Console\Commands;

use App\Models\Membership;
use Illuminate\Console\Command;

class CheckMembershipStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'member:inactive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change the status to inactive when end_date < now';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $expiredMemberships = Membership::where('end_date', '<', now())
            ->where('status', '=', 'active')
            ->get();

        foreach ($expiredMemberships as $membership) {
            $membership->update(['status' => 'inactive']);
        }

        $this->info('Updated expired memberships.');
    }

}
