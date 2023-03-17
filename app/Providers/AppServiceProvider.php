<?php

namespace App\Providers;

use Illuminate\Cache\NullStore;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        Schema::defaultStringLength(191);

        app()->setLocale($request->segment(1));

        // \URL::forceScheme('https');

        // disable caching
//        Cache::extend( 'none', function( $app ) {
//            return Cache::repository( new NullStore );
//        } );
    }
}
