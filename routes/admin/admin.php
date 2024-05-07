<?php

use Ecommerce\Backend\Controllers\Admin\AdminController;
use Ecommerce\Backend\Controllers\Admin\Brand\Controllers\BrandController;
use Ecommerce\Backend\Controllers\Admin\Category\Controllers\CategoryController;
use Ecommerce\Backend\Controllers\Admin\ChildCategory\Controllers\ChildCategoryController;
use Ecommerce\Backend\Controllers\Admin\Product\Controllers\ProductController;
use Ecommerce\Backend\Controllers\Admin\Product\Controllers\ProductImageGalleryController;
use Ecommerce\Backend\Controllers\Admin\ProfileController;
use Ecommerce\Backend\Controllers\Admin\Slider\Controllers\SliderController;
use Ecommerce\Backend\Controllers\Admin\SubCategory\Controllers\SubCategoryController;
use Ecommerce\Backend\Controllers\Vendor\AdminVendorProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "admin" middleware group. Make something great!
|
*/



/** Admin Route */
Route::get('dashboard',[
    AdminController::class ,
    'dashboard'
])
    /** Middleware & Prefix added to RouteServiceProvider */
    ->name('dashboard');

    /** Profile Routes */
Route::get('profile',[
    ProfileController::class ,
    'index'
])
    /** Middleware & Prefix added to RouteServiceProvider */
    ->name('profile');

    /** Profile Update Routes */
Route::post('profile/update',[
    ProfileController::class ,
    'updateProfile'
])
    /** Middleware & Prefix added to RouteServiceProvider */
    ->name('profile.update');

/** Profile Update Routes */
Route::post('profile/update/password',[
    ProfileController::class ,
    'updatePassword'
])
    /** Middleware & Prefix added to RouteServiceProvider */
    ->name('password.update');

/** Slider Routes */
Route::resource('slider' , SliderController::class);

/** Category Change Status */

Route::put('change-status',[
    CategoryController::class ,
    'changeStatus'
])
    ->name('category.change-status');

/** Category Routes */

Route::resource('category' , CategoryController::class);

/** Sub Category Change Status */

Route::put('subcategory/change-status',[
    SubCategoryController::class ,
    'changeStatus'
])
    ->name('sub-category.change-status');

/** Sub Category Routes */

Route::resource('sub-category' , SubCategoryController::class);

/** Chile Category Change Status */

Route::put('child-category/change-status', [
    ChildCategoryController::class ,
    'changeStatus'
])
    ->name('child-category.change-status');

/**  */
Route::get('get-subcategories', [
    ChildCategoryController::class ,
    'getSubCategories'
])
    ->name('get-subcategories');

/** Chile Category Routes */

Route::resource('child-category', ChildCategoryController::class);


/** brand Change Status */

Route::put('brand/change-status',[
    BrandController::class ,
    'changeStatus'
])
    ->name('brand.change-status');

/** brand Routes */

Route::resource('brand' , BrandController::class);

/** Vendor Profile Routes */

Route::resource('vendor-profile' , AdminVendorProfileController::class);

/** Products Profile Routes */
Route::get('product/get-subcategories', [
    ProductController::class ,
    'getSubCategories'
])
    ->name('product.get-subcategories');

Route::get('product/get-child-categories', [
    ProductController::class ,
    'getChildCategories'
])
    ->name('product.get-child-categories');

Route::put('product/change-status', [
    ProductController::class ,
    'changeStatus'
])
    ->name('product.change-status');

Route::resource('products' , ProductController::class);

/** Products image gallery route */

Route::resource('products-image-gallery', ProductImageGalleryController::class);
