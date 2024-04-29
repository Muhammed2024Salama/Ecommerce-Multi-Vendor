<?php

use App\Http\Controllers\ProfileController;
use Ecommerce\Backend\Controllers\Admin\AdminController;
use Ecommerce\Base\Auth\Controllers\GoogleAuthController;
use Ecommerce\Base\Auth\Controllers\SocialiteController;
use Ecommerce\Frontend\Controllers\HomeController;
use Ecommerce\Frontend\Controllers\UserDashboardController;
use Ecommerce\Frontend\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/** View Frontend Template  */

Route::get('/', [
    HomeController::class ,
    'index'
])
    ->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

/** Redirect To Admin Login  */

Route::get('admin/login', [
    AdminController::class ,
    'login'
])
    ->name('admin.login');

/** User Dashboard  */

Route::group([
    'middleware' => [
        'auth', 'verified'
    ] ,
    'prefix' => 'user' , 'as' => 'user.']
    , function () {
   Route::get('dashboard' , [
       UserDashboardController::class ,
       'index'
   ])
       ->name('dashboard');

   Route::get('profile',[
       UserProfileController::class ,
       'index'
   ])
       ->name('profile');

   Route::put('profile' , [
       UserProfileController::class ,
       'updateProfile'
   ])
       ->name('profile.update');

        Route::post('profile' , [
            UserProfileController::class ,
            'updatePassword'
        ])
            ->name('profile.update.password');
});

/** Github Socialite Login */

Route::get('/auth/redirect', [
    SocialiteController::class ,
    'redirectToProvider'
])
    ->name('github.login');

Route::get('/auth/callback', [
    SocialiteController::class ,
    'handleProviderCallback'
]);
/** End Of Github Socialite Login */

/** Google Socialite Login */

Route::get('/auth/google',[
    GoogleAuthController::class ,
    'redirect'
])
    ->name('google-auth');

Route::get('/auth/google/callback' , [
    GoogleAuthController::class ,
    'callbackGoogle'
]);

/** End Of Google Socialite Login */
