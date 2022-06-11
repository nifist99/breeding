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


Route::group(['prefix' => 'admin','middleware' => ['auth']], function () {

    Route::get('/','DashboardController@index');
    
    Route::group(['middleware' => ['admin']], function () {

    });
});

Route::group(['middleware' => ['guest']], function () {
    Route::get('login','FrontController@login');
    Route::get('register','FrontController@register');
    Route::get('forgot-password','FrontController@forgotPassword');

    Route::post('register','RegisterController@store');
    Route::post('login','LoginController@login');
});
