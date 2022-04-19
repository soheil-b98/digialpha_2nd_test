<?php

use App\Http\Controllers\web\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(\route('user.index'));
});

Route::get('/send_to_all',[UserController::class,'send_to_all'])->name('send_to_all');
Route::get('/user/change_status/{status}/{card_id}',[UserController::class,'change_status'])->name('change_status');
Route::resource('user',UserController::class)->middleware('auth');

Route::get('/email',function (){
    return view('email.email');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
