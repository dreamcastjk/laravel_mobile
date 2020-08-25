<?php

namespace App\Providers;

use Auth;
use Blade;
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
    public function boot()
    {
        Blade::directive('routeactive', function ($route_name) {
            return "<?php echo Route::currentRouteNamed($route_name) ? 'class=\"active\"' : '' ?>";
        });

        Blade::if('admin', function () {
           return Auth::check() && Auth::user()->isAdmin();
        });
    }
}
