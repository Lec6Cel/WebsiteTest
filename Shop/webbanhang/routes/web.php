<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// })->name('home_index');
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('home_index');
})->name('logout');
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/api/upload', [App\Http\Controllers\Api\ApiController::class, 'uploadFile'])->name('api.uploadfile');
// Route::get('/login', 'auth\LoginController@showLoginForm')->name('login');
// Route::post('/login', 'auth\LoginController@login');