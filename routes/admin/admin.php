<?php

use Ecommerce\Backend\Controllers\Admin\AdminController;
use Ecommerce\Backend\Controllers\Admin\ProfileController;
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
