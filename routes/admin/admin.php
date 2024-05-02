<?php

use Ecommerce\Backend\Controllers\Admin\AdminController;
use Ecommerce\Backend\Controllers\Admin\Category\Controllers\CategoryController;
use Ecommerce\Backend\Controllers\Admin\ProfileController;
use Ecommerce\Backend\Controllers\Admin\Slider\Controllers\SliderController;
use Ecommerce\Backend\Controllers\Admin\SubCategory\Controllers\SubCategoryController;
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

Route::get('change-status',[
    CategoryController::class ,
    'changeStatus'
])
    ->name('category.change-status');

/** Category Routes */

Route::resource('category' , CategoryController::class);

/** Sub Category Change Status */

Route::get('subcategory/change-status',[
    SubCategoryController::class ,
    'changeStatus'
])
    ->name('sub-category.change-status');

/** Sub Category Routes */

Route::resource('sub-category' , SubCategoryController::class);
