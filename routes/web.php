<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
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


Route::prefix('auth')->name('auth.')->group(function () {

    Route::get('facebook', function () {
        return Socialite::driver('facebook')->redirect();
    })->name('facebook');

    Route::get('facebook/callback', [LoginController::class, 'facebookCallback']);


    Route::get('google', function () {
        return Socialite::driver('google')->redirect();
    })->name('google');

    Route::get('google/callback',[LoginController::class, 'googleCallback']);


    Route::get('github', function () {
        return Socialite::driver('github')->redirect();
    })->name('github');

    Route::get('github/callback', [LoginController::class, 'githubCallback']);
});
