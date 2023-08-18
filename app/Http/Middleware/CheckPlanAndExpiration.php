<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CheckPlanAndExpiration
{
    public function handle($request, Closure $next)
    {
        $user = auth()->user();

        if (!auth()->user()->currentMembership && auth()->user()->currentMembership->end_date > now()) {
            return redirect(route('front.homepage'));
        }

        return $next($request);
    }
}
