<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| SITE Routes
|--------------------------------------------------------------------------
|
| Here is where you can register SITE routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "site" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
