<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ObserversServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // \App\Order::observe(\App\Observers\OrdersObserver::class);
        // \App\Advert::observe(\App\Observers\AdvertsObserver::class);
        // \App\Company::observe(\App\Observers\CompaniesObserver::class);
        // \App\Group::observe(\App\Observers\GroupsObserver::class);
        // \App\Product::observe(\App\Observers\ProductsObserver::class);
        // \App\Event::observe(\App\Observers\EventsObserver::class);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
