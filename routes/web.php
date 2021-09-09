<?php

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

Route::get('/login', 'AuthController@showLoginForm')->name('loginForm')->middleware('guest');
Route::get('/register', 'AuthController@showRegisterForm')->name('registerForm');
Route::post('/login', 'AuthController@login')->name('login');
Route::post('/register', 'AuthController@register')->name('register');
Route::post('/logout', 'AuthController@logout')->name('logout');

Route::middleware('auth')->group(function() {
    Route::get('/email/verify', 'VerificationController@index')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', 'VerificationController@verificate')->middleware('signed')->name('verification.verify');
    Route::post('/email/verification-notification', 'VerificationController@resend')->middleware('throttle:6,1')->name('verification.send');
});

Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/', 'RequestController@index')->name('home');

    Route::resource('request', 'RequestController')->except('index');
});
