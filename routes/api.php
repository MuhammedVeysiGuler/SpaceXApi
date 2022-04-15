<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [\App\Http\Controllers\Auth\PassportAuthController::class,'login'])->name('login');


Route::middleware('auth:api')->group( function () {
    Route::get('capsules',[\App\Http\Controllers\CapsuleController::class,'getAll']);
    Route::get('capsules/{serialApi}',[\App\Http\Controllers\CapsuleController::class,'serialApi']);
});
