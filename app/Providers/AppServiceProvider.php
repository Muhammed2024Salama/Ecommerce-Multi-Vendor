<?php

namespace App\Providers;


use App\Ecommerce\Base\Auth\Interface\SocialAuthInterface;
use App\Ecommerce\Base\Auth\Repository\SocialAuthRepository;
use Ecommerce\Backend\Controllers\Admin\About\Interface\AboutRepositoryInterface;
use Ecommerce\Backend\Controllers\Admin\About\Repository\AboutRepository;
use Ecommerce\Backend\Controllers\Admin\AdminList\Interface\AdminListRepositoryInterface;
use Ecommerce\Backend\Controllers\Admin\AdminList\Repository\AdminListRepository;
use Ecommerce\Backend\Controllers\Admin\Blog\Interface\BlogRepositoryInterface;
use Ecommerce\Backend\Controllers\Admin\Blog\Repository\BlogRepository;
use Ecommerce\Backend\Controllers\Admin\BlogCategory\Interface\BlogCategoryRepositoryInterface;
use Ecommerce\Backend\Controllers\Admin\BlogCategory\Repository\BlogCategoryRepository;
use Ecommerce\Backend\Controllers\Admin\BlogComment\Interface\BlogCommentRepositoryInterface;
use Ecommerce\Backend\Controllers\Admin\BlogComment\Repository\BlogCommentRepository;
use Ecommerce\Backend\Controllers\Admin\Brand\Interface\BrandRepositoryInterface;
use Ecommerce\Backend\Controllers\Admin\Brand\Repository\BrandRepository;
use Ecommerce\Backend\Controllers\Admin\CashOnDelivery\Interface\CodSettingRepositoryInterface;
use Ecommerce\Backend\Controllers\Admin\CashOnDelivery\Repository\CodSettingRepository;
use Ecommerce\Backend\Controllers\Admin\Category\Interface\CategoryRepositoryInterface;
use Ecommerce\Backend\Controllers\Admin\Category\Repository\CategoryRepository;
use Ecommerce\Backend\Controllers\Admin\ChildCategory\Interface\ChildCategoryRepositoryInterface;
use Ecommerce\Backend\Controllers\Admin\ChildCategory\Repository\ChildCategoryRepository;
use Ecommerce\Backend\Controllers\Admin\Coupon\Interface\CouponRepositoryInterface;
use Ecommerce\Backend\Controllers\Admin\Coupon\Repository\CouponRepository;
use Ecommerce\Backend\Controllers\Admin\CustomerList\Interface\CustomerListRepositoryInterface;
use Ecommerce\Backend\Controllers\Admin\CustomerList\Repository\CustomerListRepository;
use Ecommerce\Backend\Controllers\Admin\EmailConfiguration\Models\EmailConfiguration;
use Ecommerce\Backend\Controllers\Admin\FooterGridThree\Interface\FooterGridThreeRepositoryInterface;
use Ecommerce\Backend\Controllers\Admin\FooterGridThree\Repository\FooterGridThreeRepository;
use Ecommerce\Backend\Controllers\Admin\LogoSetting\Models\LogoSetting;
use Ecommerce\Backend\Controllers\Admin\Pusher\Models\PusherSetting;
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
        $this->app->bind(AdminListRepositoryInterface::class,
            AdminListRepository::class);
        $this->app->bind(CustomerListRepositoryInterface::class,
            CustomerListRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class,
            CategoryRepository::class);
        $this->app->bind(ChildCategoryRepositoryInterface::class,
            ChildCategoryRepository::class);
        $this->app->bind(CodSettingRepositoryInterface::class,
            CodSettingRepository::class);
        $this->app->bind(AboutRepositoryInterface::class,
            AboutRepository::class);
        $this->app->bind(BlogRepositoryInterface::class,
            BlogRepository::class);
        $this->app->bind(BlogCategoryRepositoryInterface::class,
            BlogCategoryRepository::class);
        $this->app->bind(BlogCommentRepositoryInterface::class,
            BlogCommentRepository::class);
        $this->app->bind(BrandRepositoryInterface::class,
            BrandRepository::class);
        $this->app->bind(CouponRepositoryInterface::class,
            CouponRepository::class);
        $this->app->bind(FooterGridThreeRepositoryInterface::class,
            FooterGridThreeRepository::class);
        $this->app->bind(SocialAuthInterface::class,
            SocialAuthRepository::class);
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
       $pusherSetting = PusherSetting::first();

       /** set time zone */
       Config::set('app.timezone', $generalSetting->time_zone);

       /** Set Mail Config */
       Config::set('mail.mailers.smtp.host', $mailSetting->host);
       Config::set('mail.mailers.smtp.port', $mailSetting->port);
       Config::set('mail.mailers.smtp.encryption', $mailSetting->encryption);
       Config::set('mail.mailers.smtp.username', $mailSetting->username);
       Config::set('mail.mailers.smtp.password', $mailSetting->password);

       /** Set Broadcasting Config */
       Config::set('broadcasting.connections.pusher.key', $pusherSetting->pusher_key);
       Config::set('broadcasting.connections.pusher.secret', $pusherSetting->pusher_secret);
       Config::set('broadcasting.connections.pusher.app_id', $pusherSetting->pusher_app_id);
       Config::set('broadcasting.connections.pusher.options.host', "api-".$pusherSetting->pusher_cluster.".pusher.com");

       /** Share variable at all view */
       View::composer('*', function($view) use ($generalSetting, $logoSetting, $pusherSetting){
           $view->with(['settings' => $generalSetting, 'logoSetting' => $logoSetting, 'pusherSetting' => $pusherSetting]);
       });
    }
}
