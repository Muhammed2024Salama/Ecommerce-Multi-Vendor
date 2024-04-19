<?php

use App\Http\Controllers\ProfileController;
use Ecommerce\Backend\Controllers\AdminController;
use Ecommerce\Backend\Controllers\VendorController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

/** Admin Route */
Route::get('admin/dashboard',[
    AdminController::class ,
    'dashboard'
])
    ->name('admin.dashboard');

/** Vendor Route */
Route::get('vendor/dashboard',[
    VendorController::class ,
    'dashboard'
])
    ->name('vendor.dashboard');
