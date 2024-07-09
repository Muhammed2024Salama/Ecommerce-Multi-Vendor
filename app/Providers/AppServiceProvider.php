<?php

namespace App\Providers;


use Ecommerce\Backend\Controllers\Admin\EmailConfiguration\Models\EmailConfiguration;
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
        $mailSetting = EmailConfiguration::first();
        //dd($mailSetting);

        /** set time zone */
        Config::set('app.timezone', $generalSetting->time_zone);
        //dd(config('mail.mailers.smtp'));
        /** Set Mail Config */
        Config::set('mail.mailers.smtp.host', $mailSetting->host);
        Config::set('mail.mailers.smtp.port', $mailSetting->port);
        Config::set('mail.mailers.smtp.encryption', $mailSetting->encryption);
        Config::set('mail.mailers.smtp.username', $mailSetting->username);
        Config::set('mail.mailers.smtp.password', $mailSetting->password);
        //(config('mail'));


        /** Share variable at all view */
        View::composer('*', function($view) use ($generalSetting, $logoSetting){
            $view->with(['settings' => $generalSetting, 'logoSetting' => $logoSetting]);
        });
    }
}
