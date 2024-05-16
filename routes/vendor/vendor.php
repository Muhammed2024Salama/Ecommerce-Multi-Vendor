<?php

use Ecommerce\Backend\Controllers\Vendor\VendorController;
use Ecommerce\Backend\Controllers\Vendor\VendorProductController;
use Ecommerce\Backend\Controllers\Vendor\VendorProfileController;
use Ecommerce\Backend\Controllers\Vendor\VendorShopProfileController;
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

/** Vendor Shop Profile  */

Route::resource('shop-profile',VendorShopProfileController::class);

/** Vendor Product Routes */

Route::get('product/get-subcategories', [
    VendorProductController::class ,
    'getSubCategories'
])
    ->name('product.get-subcategories');

Route::get('product/get-child-categories', [
    VendorProductController::class ,
    'getChildCategories'
])
    ->name('product.get-child-categories');

Route::put('product/change-status', [
    VendorProductController::class ,
    'changeStatus'
])
     ->name('product.change-status');

Route::resource('products',VendorProductController::class);
