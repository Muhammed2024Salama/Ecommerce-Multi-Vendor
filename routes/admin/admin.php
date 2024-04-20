<?php

use Ecommerce\Backend\Controllers\Admin\AdminController;
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
