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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth/facebook', function () {
    return Socialite::driver('facebook')->redirect();
});

Route::get('auth/facebook/callback', function () {
    $user = Socialite::driver('facebook')->user();
    dd($user);

    return 'callback facebook';
});
