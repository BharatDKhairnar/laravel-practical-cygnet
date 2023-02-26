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
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/user/login', [App\Http\Controllers\ApiController::class, 'login'])->name('user.login');
Route::group(['prefix' => 'v1' , 'middleware' => 'auth:api'], function(){  
    Route::get('/users', [App\Http\Controllers\ApiController::class, 'index'])->name('users');
    Route::get('/users/details', [App\Http\Controllers\ApiController::class, 'detail'])->name('users.detail');
});

Route::post('/customer/login', [App\Http\Controllers\CustomerController::class, 'login'])->name('customer.login');
Route::middleware('auth:api-customer')->group(function () {
    Route::get('/customer/details', [App\Http\Controllers\CustomerController::class, 'detail'])->name('customer.detail');
});