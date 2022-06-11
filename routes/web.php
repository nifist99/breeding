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

Route::post('logout','LoginController@logout')->name('logout');

Route::group(['prefix' => 'admin','middleware' => ['auth']], function () {

    Route::get('dashboard','DashboardController@index')->name('dashboard');
    
    Route::group(['middleware' => ['admin']], function () {

    });
});

Route::group(['middleware' => ['guest']], function () {
    Route::get('login','FrontController@login')->name('login');
    Route::get('register','FrontController@register')->name('register-view');
    Route::get('forgot-password','FrontController@forgotPassword')->name('forgot-view');

    Route::post('register','RegisterController@store')->name('register');
    Route::post('login','LoginController@login');
});
