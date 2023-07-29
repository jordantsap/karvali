<?php

namespace App\Providers;

use App\Models\Venue;
use Illuminate\Support\ServiceProvider;
use DB;
use App\Models\Company;
use App\Models\Group;
use App\Models\Event;
use App\Models\Product;
use App\Models\CompanyType;
use App\Models\GroupType;
use App\Models\ProductType;
use App\Models\PostType;
use App\Models\Post;
use App\Models\Advert;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

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
        ->with(['category','likes','comments'])
        ->active()->take(6)->get());

        $view->with('companies', Company::
        withTranslation()->
        with(['category','likes','comments'])
        ->active()->take(6)->get());

        $view->with('events', Event::withTranslation()
        ->with(['likes','comments'])
        ->active()->take(6)->get());

        $view->with('venues', Venue::withTranslation()
        ->with(['likes','comments'])
        ->active()->take(6)->get());

      });

      view()->composer('home.categories', function ($view) {

        if ( ! Cache::has('companytypes')) {
          $companytypes = Cache::rememberForever('companytypes', function(){
            return CompanyType::withTranslation()->get();
          });
        }
        else{
          $companytypes = CompanyType::withTranslation()->get();
        }
        $view->with('companytypes', $companytypes);

        if ( ! Cache::has('venues')) {
            $venues = Cache::rememberForever('venues', function(){
            return Venue::withTranslation()->get();
          });
        }
        else{
            $venues = Venue::withTranslation()->get();
        }
        $view->with('venues', $venues);

        if ( ! Cache::has('producttypes')){
          $producttypes = Cache::rememberForever('producttypes', function(){
            return ProductType::withTranslation()->get();
          });
        }
        else {
          $producttypes = ProductType::withTranslation()->get();
        }
        $view->with('producttypes', $producttypes);

        if ( ! Cache::has('events')){
          $events = Cache::rememberForever('events', function(){
            return Event::withTranslation()->get();
          });
        }
        else {
          $events = Event::withTranslation()->get();
        }
        $view->with('events', $events);

      });

        view()->composer('home.blog', function ($view) {
            $view->with('posts', Post::withTranslation()->take(6)->get());
        });
        // HOME PAGE END --------------------------------

      view()->composer(['companies.category'], function ($view) {

        if ( ! Cache::has('companytypes')) {
          $companytypes = Cache::rememberForever('companytypes', function(){
            return CompanyType::withTranslation()->get();
          });
        }
        else{
          $companytypes = CompanyType::withTranslation()->get();
        }
        $view->with('companytypes', $companytypes);
      });

//      view()->composer(['groups.index','groups.category'], function ($view) {
//
//        if ( ! Cache::has('grouptypes')){
//          $grouptypes = Cache::rememberForever('grouptypes', function(){
//            return GroupType::withTranslation()->get();
//          });
//        }
//        else {
//          $grouptypes = GroupType::withTranslation()->get();
//        }
//        $view->with('grouptypes', $grouptypes);
//      });

      view()->composer(['products.index','products.category'], function ($view) {

        if ( ! Cache::has('producttypes')){
          $producttypes = Cache::rememberForever('producttypes', function(){
            return ProductType::withTranslation()->get();
          });
        }
        else {
          $producttypes = ProductType::withTranslation()->get();
        }
        $view->with('producttypes', $producttypes);
      });

      view()->composer(['posts.index','posts.category'], function ($view) {
        $view->with('posttypes', PostType::withTranslation()->get());
      });


        // view()->composer('auth.sidebar', function($view) {
        //   $user_id = auth()->user()->id;
        //   $user = User::find($user_id);
        //   $view->with('products', Product::where('user_id',$user)->get());
        //   $view->with('companies', Company::where('user_id',$user)->get());
        //   $view->with('groups', Group::where('user_id',$user)->get());
        //   $view->with('events', Event::where('user_id',$user)->get());
        // });


        // view()->composer('home.advert', function($view) {
        //   $view->with('adverts', Advert::where('active',1)->get());
        //   $view->with('posts', DB::table('posts')->where('active',1)
        //   ->orderBy('id','desc')->get());
        // });

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
