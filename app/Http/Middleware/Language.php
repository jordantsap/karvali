<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Symfony\Component\HttpFoundation\Response;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the first segment matches a language code
        if (!array_key_exists($request->segment(1), config('translatable.locales')) ) {

            // Store segments in array
            $segments = $request->segments();

            // Set the default language code as the first segment
            $segments = Arr::prepend($segments, config('app.fallback_locale'));

            // Redirect to the correct url
            return redirect()->to(implode('/', $segments));
        }

        return $next($request);
    }
}
