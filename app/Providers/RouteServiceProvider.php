<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/user/dashboard';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                /** Start Prefix API */
                ->prefix('api')
                /** End Prefix API */
                ->group(base_path('routes/api/api.php'));


            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::middleware('web', 'auth', 'role:admin')/** Middleware Role */
            /** Start Prefix Admin */
            ->prefix('admin')
                ->as('admin.')
                /** End Prefix admin */
                ->group(base_path('routes/admin/admin.php'));
            /** End Middleware Role */

            Route::middleware('web', 'auth', 'role:vendor')
                /** Start Prefix Vendor */
                ->prefix('vendor')
                ->as('vendor.')
                /** End Prefix Vendor */
                ->group(base_path('routes/vendor/vendor.php'));
        });
    }


    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
