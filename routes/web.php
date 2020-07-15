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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

//auth routes
Auth::routes();

Route::get('/customer/dashboard', 'DashboardController@index')->name('customer.dashboard');

Route::prefix('admin')->group(function(){
    Route::get('/', 'Admin\DashboardController@index')->name('admin.dashboard');

    Route::get('/login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Admin\Auth\LoginController@login')->name('admin.login.submit');
    Route::post('/logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');

});

Route::prefix('courier')->group(function(){
    Route::get('/', 'Courier\DashboardController@index')->name('courier.dashboard');

    Route::get('/login', 'Courier\Auth\LoginController@showLoginForm')->name('courier.login');
    Route::post('/login', 'Courier\Auth\LoginController@login')->name('courier.login.submit');
    Route::post('/logout', 'Courier\Auth\LoginController@logout')->name('courier.logout');

});




