<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('chat', [App\Http\Controllers\HomeController::class, 'chat'])->name('chat');

Route::get('messages', [App\Http\Controllers\HomeController::class, 'messages'])->name('messages');

Route::post('messages', [App\Http\Controllers\HomeController::class, 'messageStore'])->name('messageStore');

Route::get('user-list',[HomeController::class,'user_list'])->name('user-list');

