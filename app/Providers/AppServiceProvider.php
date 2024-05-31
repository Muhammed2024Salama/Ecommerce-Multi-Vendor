<?php

namespace App\Providers;

use Ecommerce\Backend\Controllers\Admin\Settings\Models\GeneralSetting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /** Using Paginator From Bootstrap  */
        Paginator::useBootstrap();

        $generalSetting = GeneralSetting::first();

        /** set time zone */
        if ($generalSetting) {
            Config::set('app.timezone', $generalSetting->time_zone);
        } else {
            // Handle the case where there's no GeneralSetting record
            // You might want to set a default time zone or log a warning
            Config::set('app.timezone', 'UTC'); // Default timezone
            // Log::warning('No GeneralSetting found, defaulting to UTC timezone');
        }

        /** Share variable at all view */
        View::composer('*', function($view) use ($generalSetting){
            $view->with(['settings' => $generalSetting]);
        });

    }
}
