<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Ecommerce\Backend\Controllers\Admin\AdminController;
use Ecommerce\Frontend\Controllers\HomeController;
use Ecommerce\Frontend\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

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
});

/** Github Socialite Login */

Route::get('/auth/redirect', function(){
    return Socialite::driver('github')->redirect();
})->name('github.login');

Route::get('/auth/callback' , function () {
   $user = Socialite::driver('github')->user();

    $user = User::firstOrCreate([
        'email' => $user->email
    ],[
        'name' => $user->name,
        'password' => bcrypt(Str::random(24))
    ]);

    Auth::login($user, true);

    toastr()
    return redirect('/user/dashboard');
});
