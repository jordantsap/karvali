<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = 'manage/dashboard';

    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {

        $this->configureRateLimiting();

//        $this->routes(function () {
//            Route::middleware('web')
//                ->group(base_path('routes/web.php'));
//        });

        $this->routes(function () {
            $locale = Request::segment(1);

            Route::prefix($locale)
                ->middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));


//                Route::group([
//                    'middleware' => 'web',
//                    'namespace' => $this->namespace,
//                    'prefix' => $locale
//                ], function ($router) {
//                    require base_path('routes/web.php');
//                });

                Route::group([
                    'middleware' => 'web',
                    'namespace' => $this->namespace,
                    'prefix' => $locale
                ], function ($router) {
                    require base_path('routes/manage.php');
                });

                Route::group([
                    'middleware' => 'web',
                    'namespace' => $this->namespace,
                    'prefix' => $locale
                ], function ($router) {
                    require base_path('routes/information.php');
                });

                Route::group([
                    'middleware' => 'web',
                    'namespace' => $this->namespace,
                    'prefix' => $locale
                ], function ($router) {
                    require base_path('routes/social.php');
                });
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
