<?php

namespace App\Providers;

use App\Models\AccommodationType;
use App\Models\Company;
use App\Models\CompanyType;
use App\Models\Event;
use App\Models\GroupType;
use App\Models\Post;
use App\Models\PostType;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Room;
use App\Models\Venue;
use Barryvdh\Reflection\DocBlock\Tag;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class ComposerViewsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('home.popular', function ($view) {

            $view->with('products', Product::withTranslation()
                ->with(['category', 'likes', 'comments'])
                ->active()->take(6)->get());

            $view->with('companies', Company::
            withTranslation()->
            with(['category', 'likes', 'comments'])
                ->active()->take(6)->get());

            $view->with('events', Event::withTranslation()
                ->with(['likes', 'comments'])
                ->active()->take(6)->get());

            $view->with('venues', Venue::withTranslation()
                ->with(['likes', 'comments'])
                ->active()->take(6)->get());

        });

//        view()->composer('modals.roomModal', function ($view) {
//
//            $view->with('room', Room::where('accommodation_id', $this->accommodation));
//        });

        view()->composer('home.categories', function ($view) {

            if (!Cache::has('companytypes')) {
                $companytypes = Cache::rememberForever('companytypes', function () {
                    return CompanyType::withTranslation()->get();
                });
            } else {
                $companytypes = CompanyType::withTranslation()->get();
            }
            $view->with('companytypes', $companytypes);

            if (!Cache::has('accommodationTypes')) {
                $accommodationTypes = Cache::rememberForever('accommodationTypes', function () {
                    return AccommodationType::withTranslation()->get();
                });
            } else {
                $accommodationTypes = AccommodationType::withTranslation()->get();
            }
            $view->with('accommodationTypes', $accommodationTypes);

            if (!Cache::has('producttypes')) {
                $producttypes = Cache::rememberForever('producttypes', function () {
                    return ProductType::withTranslation()->get();
                });
            } else {
                $producttypes = ProductType::withTranslation()->get();
            }
            $view->with('producttypes', $producttypes);

            if (!Cache::has('events')) {
                $events = Cache::rememberForever('events', function () {
                    return Event::withTranslation()->get();
                });
            } else {
                $events = Event::withTranslation()->get();
            }
            $view->with('events', $events);

            if (!Cache::has('venues')) {
                $venues = Cache::rememberForever('venues', function () {
                    return Venue::withTranslation()->get();
                });
            } else {
                $venues = Venue::withTranslation()->get();
            }
            $view->with('venues', $venues);

        });

        view()->composer('home.blog', function ($view) {
            $view->with('posts', Post::withTranslation()->take(6)->get());
        });
        // HOME PAGE END --------------------------------

        view()->composer(['companies.category'], function ($view) {

            if (!Cache::has('companytypes')) {
                $companytypes = Cache::rememberForever('companytypes', function () {
                    return CompanyType::withTranslation()->get();
                });
            } else {
                $companytypes = CompanyType::withTranslation()->get();
            }
            $view->with('companytypes', $companytypes);
        });

      view()->composer(['groups.index','groups.category'], function ($view) {

        if ( ! Cache::has('grouptypes')){
          $grouptypes = Cache::rememberForever('venuetypes', function(){
            return GroupType::withTranslation()->get();
          });
        }
        else {
          $grouptypes = GroupType::withTranslation()->get();
        }
        $view->with('grouptypes', $grouptypes);
      });

        view()->composer(['posts.index', 'posts.category'], function ($view) {
            $view->with('posttypes', PostType::withTranslation()->get());
        });

        view()->composer(['accommodation-types.index', 'accommodations.category'], function ($view) {
            $view->with('accommodationTypes', AccommodationType::get());
        });

        view()->composer(['products.index', 'products.category'], function ($view) {

            if (!Cache::has('producttypes')) {
                $producttypes = Cache::rememberForever('producttypes', function () {
                    return ProductType::withTranslation()->get();
                });
            } else {
                $producttypes = ProductType::withTranslation()->get();
            }
            $view->with('producttypes', $producttypes);
        });
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
