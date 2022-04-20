<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\CardController;
use App\Http\Controllers\api\UserController;
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

Route::group(['prefix'=>'auth'],function (){
    Route::post('login',[AuthController::class,'login']);
    Route::post('register',[AuthController::class,'register']);

    Route::get('logout',[AuthController::class,'logout'])->middleware('auth:api');
});

Route::middleware(['auth:api','scopes:user'])->group(function (){
    Route::get('/user',[UserController::class,'getAllUSer'])->name('getAllUser');
    Route::get('/user',[UserController::class,'getUSer'])->name('getUser');
    Route::put('user/changeCardStatus',[UserController::class,'changeCardStatus'])->name('changeCardStatus');
});


Route::middleware(['auth:api','scopes:user'])->group(function (){
    Route::resource('/card',CardController::class)->only(['store','show','update','destroy']);
});
