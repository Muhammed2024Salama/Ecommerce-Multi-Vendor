<?php

use Ecommerce\Backend\Controllers\Vendor\VendorController;
use Ecommerce\Backend\Controllers\Vendor\VendorProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Vendor Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "vendor" middleware group. Make something great!
|
*/

/** Vendor Route */
Route::get('dashboard',[
    VendorController::class ,
    'dashboard'
])
   /** Middleware & Prefix added to RouteServiceProvider */
    ->name('dashboard');

Route::get('profile' , [
    VendorProfileController::class ,
    'index'
])
    ->name('profile');

Route::put('profile' , [
    VendorProfileController::class ,
    'updateProfile'
])
    ->name('profile.update');

Route::post('profile' , [
    VendorProfileController::class ,
    'updatePassword'
])
    ->name('profile.update.password');
