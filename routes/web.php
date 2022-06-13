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

    //users
    Route::get('users','UsersController@index');
    Route::get('users/create','UsersController@create');
    Route::post('users/save','UsersController@store');
    Route::post('users/update','UsersController@update');
    Route::get('users/edit/{id}','UsersController@edit');
    Route::get('users/show/{id}','UsersController@show');
    Route::get('users/delete/{id}','UsersController@destroy');
    Route::get('users/{status}/{id}/','UsersController@status');

    //privileges
    Route::get('privileges','PrivilegesController@index');
    Route::get('privileges/create','PrivilegesController@create');
    Route::post('privileges/save','PrivilegesController@store');
    Route::post('privileges/update','PrivilegesController@update');
    Route::get('privileges/edit/{id}','PrivilegesController@edit');
    Route::get('privileges/show/{id}','PrivilegesController@show');
    Route::get('privileges/delete/{id}','PrivilegesController@destroy');
    Route::get('privileges/{status}/{id}/','PrivilegesController@status');

    //jenis-ternak
    Route::get('jenis-ternak','AdminJenisTernakController@index');
    Route::get('jenis-ternak/create','AdminJenisTernakController@create');
    Route::post('jenis-ternak/save','AdminJenisTernakController@store');
    Route::post('jenis-ternak/update','AdminJenisTernakController@update');
    Route::get('jenis-ternak/edit/{id}','AdminJenisTernakController@edit');
    Route::get('jenis-ternak/show/{id}','AdminJenisTernakController@show');
    Route::get('jenis-ternak/delete/{id}','AdminJenisTernakController@destroy');
    Route::get('jenis-ternak/{status}/{id}/','AdminJenisTernakController@status');
    
    Route::group(['middleware' => ['admin']], function () {

    });
});

Route::group(['middleware' => ['guest']], function () {
    Route::get('/','FrontController@login')->name('login');
    Route::get('login','FrontController@login')->name('login');
    Route::get('register','FrontController@register')->name('register-view');
    Route::get('forgot-password','FrontController@forgotPassword')->name('forgot-view');

    Route::post('register','RegisterController@store')->name('register');
    Route::post('login','LoginController@login');
});
