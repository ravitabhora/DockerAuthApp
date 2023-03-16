<?php

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

Route::get('/', 'App\Http\Controllers\OAuthController@login');
Route::get('/login', 'App\Http\Controllers\OAuthController@login')->name('login');

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['is-active']);

// Google OAth routes
Route::get('/login/google', 'App\Http\Controllers\OAuthController@redirectToGoogle')->name('login.google');
Route::get('/login/google/callback', 'App\Http\Controllers\OAuthController@handleGoogleCallback');

// Logout
Route::get('/logout', 'App\Http\Controllers\OAuthController@logout');
