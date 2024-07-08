<?php

namespace App\Providers;


use Ecommerce\Backend\Controllers\Admin\LogoSetting\Models\LogoSetting;
use Ecommerce\Backend\Controllers\Admin\Settings\Models\GeneralSetting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
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
        $logoSetting = LogoSetting::first();

        /** set time zone */
        Config::set('app.timezone', $generalSetting->time_zone);


        /** Share variable at all view */
        View::composer('*', function($view) use ($generalSetting, $logoSetting){
            $view->with(['settings' => $generalSetting, 'logoSetting' => $logoSetting]);
        });
    }
}
